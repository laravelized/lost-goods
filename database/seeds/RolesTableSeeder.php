<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Modules\Permissions\Roles::LIST;
        foreach ($roles as $roleName => $description) {
            if (!\App\Modules\Permissions\Models\Role::where('name', $roleName)->exists()) {
                \App\Modules\Permissions\Models\Role::create([
                    'name' => $roleName,
                    'description' => $description
                ]);
            }
        }
    }
}
