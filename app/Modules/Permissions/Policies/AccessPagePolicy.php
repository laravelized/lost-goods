<?php

namespace App\Modules\Permissions\Policies;

use App\Modules\Permissions\Permissions;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use App\Modules\User\Models\User;

class AccessPagePolicy
{
    private $permissionService;

    public function __construct(PermissionServiceInterface $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function accessUserDashboard(User $user)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::ACCESS_USER_DASHBOARD, $permissionNames->toArray());
    }

    public function accessAdminDashboard(User $user)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::ACCESS_ADMIN_DASHBOARD, $permissionNames->toArray());
    }
}
