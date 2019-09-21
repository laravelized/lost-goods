<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:57
 */

namespace App\Modules\Permissions\Services\PermissionService;

use App\Modules\Permissions\Repositories\PermissionRepository\PermissionRepositoryInterface;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

class PermissionService implements PermissionServiceInterface
{
    private $permissionRepository;
    private $roleRepository;

    public function __construct(
        PermissionRepositoryInterface $permissionRepository,
        RoleRepositoryInterface $roleRepository
    )
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getPermissionsNameByUser(User $user): Collection
    {
        $roles = $this->roleRepository->getRolesByUser($user);
        $permissions = $roles->reduce(function ($arrayResult, $role) {
            $permissions = $this->permissionRepository->getPermissionsByRole($role);
            return array_merge($arrayResult, $permissions->pluck('name')->all());
        }, []);

        return new Collection($permissions);
    }
}
