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
use Illuminate\Foundation\Application;
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

        Gate::define(Permissions::CREATE_CATEGORY, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::CREATE_CATEGORY, $permissionNames->toArray());
        });

        Gate::define(Permissions::VIEW_CATEGORIES_LIST, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::VIEW_CATEGORIES_LIST, $permissionNames->toArray());
        });

        Gate::define(Permissions::UPDATE_CATEGORY, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::UPDATE_CATEGORY, $permissionNames->toArray());
        });

        Gate::define(Permissions::DELETE_CATEGORY, function ($user) use ($permissionService) {
            $permissionNames = $permissionService->getPermissionsNameByUser($user);
            return in_array(Permissions::DELETE_CATEGORY, $permissionNames->toArray());
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

        $this->app->singleton(PermissionService::class, function (Application $application) {
            return new Services\PermissionService\PermissionService(
                $application->make(PermissionRepositoryInterface::class),
                $application->make(RoleRepositoryInterface::class),
            );
        });
    }
}
