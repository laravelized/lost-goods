<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:46
 */

namespace App\Modules\Permissions;

use App\Modules\Permissions\Policies\AccessPagePolicy;
use App\Modules\Permissions\Repositories\PermissionRepository\PermissionRepository;
use App\Modules\Permissions\Repositories\PermissionRepository\PermissionRepositoryInterface;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepository;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepositoryInterface;
use App\Modules\Permissions\Services\PermissionService\PermissionService;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use App\Modules\Permissions\Services\RoleService\RoleService;
use App\Modules\Permissions\Services\RoleService\RoleServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    public function boot(PermissionServiceInterface $permissionService)
    {
        Gate::define(
            Permissions::ACCESS_USER_DASHBOARD,
            AccessPagePolicy::class . '@accessUserDashboard'
        );

        Gate::define(
            Permissions::ACCESS_ADMIN_DASHBOARD,
            AccessPagePolicy::class . '@accessAdminDashboard'
        );
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

        $this->app->bind(RoleServiceInterface::class, RoleService::class);

        $this->app->singleton(PermissionService::class, function (Application $application) {
            return new Services\PermissionService\PermissionService(
                $application->make(PermissionRepositoryInterface::class),
                $application->make(RoleRepositoryInterface::class)
            );
        });
    }
}
