<?php

use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(config('auth.providers.user.table'))->delete();
        /** @var App\Models\User $userModel */
        $roleModel       = config( 'entrust.role' );
        $userModel       = config('auth.providers.user.model');

        $adminRole = $roleModel::whereName( 'admin' )->first();
        $userModel::create(
            [
                'name'     => 'Administrator',
                'email'    => config( 'common.app.email.admin' ),
                'password' => bcrypt( 'password' )
            ]
        )->attachRole($adminRole);

        $editorRole = $roleModel::whereName( 'manager' )->first();
        $userModel::create(
            [
                'name'     => 'Manager',
                'email'    => 'manager@localhost.localdomain',
                'password' => bcrypt( 'password' )
            ]
        )->attachRole($editorRole);

        $userModel::create(
            [
                'name'     => 'John Doe',
                'email'    => 'john.doe@localhost.localdomain',
                'password' => bcrypt( 'password' )
            ]
        );
    }
}
