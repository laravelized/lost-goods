<?php

use Illuminate\Database\Seeder;

class DevelopmentEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(AttachingPermissionsToRolesSeeder::class);
        $this->call(AdminAccountSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UserAccountSeeder::class);
    }
}
