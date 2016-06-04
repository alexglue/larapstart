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

		return $role->create([
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
		$model = config( 'auth.providers.admin.model' );
		$user  = new $model;

		return $user->create([
			 'name'     => 'Administrator',
			 'email'    => $email,
			 'password' => bcrypt( $password )
		]);
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
				'name' 		   => 'roles-crud',
				'display_name' => 'Управление ролями',
				'description'  => 'Права на создание, редактирование и удаление ролей'
			],
			[
				'name' 		   => 'permissions-crud',
				'display_name' => 'Управление правами доступа',
				'description'  => 'Права на создание, редактирование и удаление прав доступа'
			],

			[
				'name' 		   => 'edit-users',
				'display_name' => 'Редактирование пользователя',
				'description'  => 'Права доступа к редактированию данных пользователя'
			],
			[
				'name' 		   => 'create-users',
				'display_name' => 'Создание пользователя',
				'description'  => 'Права доступа на создание нового пользователя'
			],
			[
				'name' 		   => 'delete-users',
				'display_name' => 'Удаление пользователя',
				'description'  => 'Права доступа на удаление пользователей'
			],
			[
				'name' 		   => 'list-users',
				'display_name' => 'Просмотр списка пользователей',
				'description'  => 'Права доступа на просмотр и управление списком пользователей'
			]
		];

		foreach($permissions as $fields)
		{
			$result[] = (new Permission())->create($fields);
		}

		return $result;
	}
}
