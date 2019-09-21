<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:55
 */

namespace App\Modules\Permissions\Repositories\RoleRepository;

use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    public function getRolesByUser(User $user): Collection;
}
