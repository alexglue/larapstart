<?php

    use Illuminate\Database\Seeder;

    /**
     * Class RoleSeeder
     */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(config( 'entrust.roles_table' ))->delete();

        $model = config( 'entrust.role' );

        /** @var App\Models\Role $role */
        $role  = new $model;

        $role->create([
            'name'         => 'admin',
            'display_name' => 'System Administrator',
            'description'  => 'The General admin user'
        ]);

/*
        $role->create([
            'name'         => 'manager',
            'display_name' => 'Content manager',
            'description'  => 'user with admin area access and managing permissions'
        ]);
*/
    }
}
