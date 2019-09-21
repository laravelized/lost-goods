<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:56
 */

namespace App\Modules\Permissions\Services\PermissionService;

use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

interface PermissionServiceInterface
{
    public function getPermissionsNameByUser(User $user): Collection;
}
