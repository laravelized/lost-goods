<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:46
 */

namespace App\Modules\Permissions;

use App\Modules\Permissions\Repositories\PermissionRepository\PermissionRepository;
use App\Modules\Permissions\Repositories\PermissionRepository\PermissionRepositoryInterface;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepository;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepositoryInterface;
use App\Modules\Permissions\Services\PermissionService\PermissionService;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    public function boot(PermissionServiceInterface $permissionService)
    {
        Gate::define(Permissions::ACCESS_USER_DASHBOARD, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::ACCESS_USER_DASHBOARD, $permissionNames->toArray());

        });

        Gate::define(Permissions::ACCESS_ADMIN_DASHBOARD, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::ACCESS_ADMIN_DASHBOARD, $permissionNames->toArray());
        });
    }

    public function register()
    {
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );

        $this->app->bind(
            PermissionServiceInterface::class,
            PermissionService::class
        );
    }
}
