<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:32
 */

namespace App\Modules\User\Services\UserService;


use App\Modules\User\Models\User;

interface UserServiceInterface
{
    public function getByUsername(string $userName): ?User;

    public function createUser(array $params): User;

    public function doUserExistByEmail(string $email): bool;

    public function doUserExistByUsername(string $username): bool;

    public function doUserExistByMobileNumber(string $mobileNumber): bool;
}
