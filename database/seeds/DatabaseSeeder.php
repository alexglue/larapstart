<?php

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Seeder;

    /**
     * Class DatabaseSeeder
     */
    class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);

        Model::reguard();
    }
}
