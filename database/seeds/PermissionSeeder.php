<?php

use Illuminate\Database\Seeder;

/**
 * Class PermissionSeeder
 */
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var App\Models\Permission $permission
         * @var App\Models\Role       $adminRole
         * @var App\Models\Role       $editorRole
         */
        DB::table(config( 'entrust.permissions_table' ))->delete();

        $permissionModel = config( 'entrust.permission' );
        $roleModel       = config( 'entrust.role' );
        $adminRole       = $roleModel::whereName( 'admin' )->first();
        $editorRole      = $roleModel::whereName( 'manager' )->first();
        $permission      = new $permissionModel();


        /** Base Roles and permissions setup **/
        $permissions  	  = [];
        $adminPermissions = [
            [
                'name' 		   => 'admin.access',
                'display_name' => 'Access to admin area',
                'description'  => 'Ability to access to admin area'
            ],
            [
                'name' 		   => 'admin.roles.crud',
                'display_name' => 'Roles management',
                'description'  => 'Ability to roles CRUD'
            ],
            [
                'name' 		   => 'admin.permissions.crud',
                'display_name' => 'Permissions management',
                'description'  => 'Ability to permissions CRUD'
            ],
            [
                'name' 		   => 'admin.users.edit',
                'display_name' => 'Edit users',
                'description'  => 'Ability to edit user data'
            ],
            [
                'name' 		   => 'admin.users.create',
                'display_name' => 'Create users',
                'description'  => 'Ability to create new user'
            ],
            [
                'name' 		   => 'admin.users.delete',
                'display_name' => 'Delete users',
                'description'  => 'Ability to delete existing user'
            ],
            [
                'name' 		   => 'admin.users.list',
                'display_name' => 'List users',
                'description'  => 'Ability to list users'
            ]
        ];


        foreach($adminPermissions as $fields)
        {
            $permissions[] = $permission->create($fields);
        }
        $adminRole->attachPermissions($permissions);

        $editorPermissions = $permissionModel::whereIn('name', ['admin.access', 'admin.users.list'])->get();
        $editorRole->attachPermissions($editorPermissions);
    }
}
