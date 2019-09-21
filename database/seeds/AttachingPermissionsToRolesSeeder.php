<?php

use Illuminate\Database\Seeder;

class AttachingPermissionsToRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsToRolesMap = \App\Modules\Permissions\PermissionsToRolesMap::LIST;
        foreach ($permissionsToRolesMap as $roleName => $permissionsList) {
            $role = \App\Modules\Permissions\Models\Role
                ::where('name', $roleName)
                ->first();
            if (!is_null($role)) {
                $permissionsIds = [];
                foreach ($permissionsList as $permissionName) {
                    $permission = \App\Modules\Permissions\Models\Permission
                        ::where('name', $permissionName)
                        ->first();
                    if (!is_null($permission)) {
                        array_push($permissionsIds, $permission->id);
                    }
                }

                $role->permissions()->sync($permissionsIds);
            }
        }
    }
}
