<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'roles' => [
                    \App\Modules\Permissions\Roles::ADMIN
                ],
                'fields' => [
                    'username' => 'admin',
                    'full_name' => 'admin ganteng',
                    'email' => 'admin@admin.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('password'),
                    'mobile_number' => '0812345678',
                    'gender' => \App\Modules\User\Enum\UserGenderEnum::MALE,
                    'address' => 'Jl. Pocong no 19, Malang, Jawa Timur'
                ]
            ]
        ];

        foreach ($userData as $userDatum) {
            if (!\App\Modules\User\Models\User::where('email', $userDatum['fields']['email'])->exists()) {
                $user = \App\Modules\User\Models\User::create($userDatum['fields']);

                $rolesIds = [];
                foreach ($userDatum['roles'] as $roleName) {
                    $role = \App\Modules\Permissions\Models\Role::where('name', $roleName)->first();
                    if (!is_null($role)) {
                        array_push($rolesIds, $role->id);
                    }
                }

                $user->roles()->sync($rolesIds);
            }
        }
    }
}
