<?php

namespace App\Services\Acl;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Installer
 *
 * @package App\Services\Acl
 */
class Installer
{

	/**
	 * @param $email
	 * @param $password
     */
	public function install($email, $password)
	{
		/** @var $user User */
		$role  = $this->createAdminRole();
		$perms = $this->createPermissions();
		$user  = $this->createAdminUser( $email, $password );

		$role->attachPermissions($perms);
		$user->attachRole($role);
	}


	/**
	 * @return Role
     */
	private function createAdminRole()
	{
		/** @var Role $role */
		$model = config( 'entrust.role' );
		$role  = new $model;

		return $role->firstOrCreate([
			'name'         => 'admin',
			'display_name' => 'System Administrator',
			'description'  => 'The General admin user'
		]);
	}


	/**
	 * @param $email
	 * @param $password
	 *
	 * @return static
     */
    private function createAdminUser($email, $password)
	{
		/** @var $user User */
		$model = config( 'auth.providers.user.model' );
		$user  = new $model;

		$user = $user->firstOrNew(['email' => $email]);

		$user->fill([
			 'name'     => 'Administrator',
			 'email'    => $email,
			 'password' => bcrypt( $password )
		])->save();

		return $user;
	}


	/**
	 * @return array
     */
	private function createPermissions()
	{
		/** Base Roles and permissions setup **/
		$result 	 = [];
		$permissions = [
			[
				'name' 		   => 'admin.access',
				'display_name' => 'Access to admin area',
				'description'  => 'Ability to access to admin area'
			],
			[
				'name' 		   => 'admin.roles.crud',
				'display_name' => 'Roles management',
				'description'  => 'Права на создание, редактирование и удаление ролей'
			],
			[
				'name' 		   => 'admin.permissions.crud',
				'display_name' => 'Permissions management',
				'description'  => 'Права на создание, редактирование и удаление прав доступа'
			],
			[
				'name' 		   => 'admin.users.edit',
				'display_name' => 'Edit users',
				'description'  => 'Права доступа к редактированию данных пользователя'
			],
			[
				'name' 		   => 'admin.users.create',
				'display_name' => 'Create users',
				'description'  => 'Права доступа на создание нового пользователя'
			],
			[
				'name' 		   => 'admin.users.delete',
				'display_name' => 'Delete users',
				'description'  => 'Права доступа на удаление пользователей'
			],
			[
				'name' 		   => 'admin.users.list',
				'display_name' => 'List users',
				'description'  => 'Права доступа на просмотр и управление списком пользователей'
			]
		];

		foreach($permissions as $fields)
		{
			$result[] = (new Permission())->firstOrCreate($fields);
		}

		return $result;
	}
}
