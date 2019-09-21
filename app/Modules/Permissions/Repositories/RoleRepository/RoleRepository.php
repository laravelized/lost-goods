<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:55
 */

namespace App\Modules\Permissions\Repositories\RoleRepository;

use App\Modules\Permissions\Models\Permission;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    private $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getRolesByUser(User $user): Collection
    {
        return $user->roles;
    }
}
