<?php

use Illuminate\Database\Seeder;

class SyncPermissionsRolesSeeder extends Seeder
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
    }
}
