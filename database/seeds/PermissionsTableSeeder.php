<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Modules\Permissions\Permissions::LIST;
        foreach ($roles as $permissionName => $description) {
            if (!\App\Modules\Permissions\Models\Permission::where('name', $permissionName)->exists()) {
                \App\Modules\Permissions\Models\Permission::create([
                    'name' => $permissionName,
                    'description' => $description
                ]);
            }
        }
    }
}
