<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 11:23
 */

namespace App\Modules\User\Repositories\UserRepository;

use App\Modules\User\Models\User;

interface UserRepositoryInterface
{
    public function getByUsername(string $username): ?User;
}
