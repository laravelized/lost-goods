<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:55
 */

namespace App\Modules\Permissions\Repositories\PermissionRepository;

use App\Modules\Permissions\Models\Permission;
use App\Modules\Permissions\Models\Role;
use Illuminate\Support\Collection;

class PermissionRepository implements PermissionRepositoryInterface
{
    private $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getPermissionsByRole(Role $role): Collection
    {
        return $role->permissions;
    }
}
