<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:55
 */

namespace App\Modules\Permissions\Repositories\RoleRepository;

use App\Modules\Permissions\Models\Permission;
use App\Modules\Permissions\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    private $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getRolesByUser(User $user): Collection
    {
        return $user->roles;
    }

    public function attachRoleToUser(Role $role, User $user): void
    {
        $user->roles()->attach($role->id);
    }

    public function getRoleByName(string $name): ?Role
    {
        return $this->model->where('name', $name)->first();
    }
}
