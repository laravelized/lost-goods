<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:57
 */

namespace App\Modules\Permissions\Services\RoleService;

use App\Modules\Permissions\Models\Role;
use App\Modules\User\Models\User;

interface RoleServiceInterface
{
    public function attachRoleToUser(Role $role, User $user): void;

    public function attachRoleNameToUser(string $roleName, User $user): void;
}
