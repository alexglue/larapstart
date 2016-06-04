<?php

namespace App\Services\Acl;

use App\Models\Role;

/**
 * Class AclManager
 *
 * @package App\Services\Acl
 */
class AclManager
{
	private $model;


	/**
	 *
     */
	public function __construct()
	{
		$model      = \Config::get('auth.providers.users.model');
		$this->user = new $model;
	}


	/**
	 * @param      $permissions
	 * @param null $user
	 *
	 * @return bool
     */
    public function canSee($permissions, $user = null)
	{
		if(is_null($user))
		{
			$user = \Auth::user();
		}
		if(!empty($permissions))
		{
			return $user->can($permissions);
		}

		return false;
	}


	/**
	 * @return array
     */
	public function getRolesForSelect()
	{
		$roles       = new Role;
		$rolesSelect = [];
		foreach($roles->all() as $role)
		{
			$rolesSelect[$role->id] = $role->display_name;
		}

		return $rolesSelect;
	}


	/**
	 * @param $roleId
	 *
	 * @return array
     */
    public function getPermissionsIdsForRole($roleId)
	{
		$roles = Role::findOrFail($roleId);
		$perms = [];
		$roles->perms->each(
			function ($permission) use (&$perms)
			{
				$perms[] = $permission->id;
			}
		);

		return $perms;
	}


	/**
	 * @param $userId
	 *
	 * @return array
     */
    public function getPermissionsIdsForUser($userId)
	{
		$user  = $this->user->findOrFail($userId);
		$perms = [];
		$user->perms->each(
			function ($permission) use (&$perms)
			{
				$perms[] = $permission->id;
			}
		);

		return $perms;
	}


	/**
	 * @param $roleId
	 * @param $permissions
	 *
	 * @return bool
     */
    public function assignPermissionsToRole($roleId, $permissions)
	{
		$roles = Role::findOrFail($roleId);
		$roles->perms()->attach($permissions);

		return true;
	}


	/**
	 * @param $userId
	 * @param $permissions
	 *
	 * @return bool
     */
    public function assignPermissionsToUser($userId, $permissions)
	{
		$user = $this->user->findOrFail($userId);
		$user->perms()->attach($permissions);

		return true;
	}
}