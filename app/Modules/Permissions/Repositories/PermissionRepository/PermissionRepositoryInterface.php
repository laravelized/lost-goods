<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:52
 */

namespace App\Modules\Permissions\Repositories\PermissionRepository;


use App\Modules\Permissions\Models\Role;
use Illuminate\Support\Collection;

interface PermissionRepositoryInterface
{
    public function getPermissionsByRole(Role $role): Collection;
}