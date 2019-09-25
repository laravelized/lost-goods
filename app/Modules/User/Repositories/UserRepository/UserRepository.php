<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 11:23
 */

namespace App\Modules\User\Repositories\UserRepository;

use App\Modules\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getByUsername(string $username): ?User
    {
        return $this->model->where('username', $username)->first();
    }

    public function createUser(array $params): User
    {
        return $this->model->create([
            'username' => $params['username'],
            'password' => $params['password'],
            'full_name' => $params['full_name'],
            'gender' => $params['gender'],
            'address' => $params['address'],
            'mobile_number' => $params['mobile_number']
        ]);
    }

    public function doUserExistByEmail(string $email): bool
    {
        return $this->model->where('email', $email)->exists();
    }

    public function doUserExistByMobileNumber(string $mobileNumber): bool
    {
        return $this->model->where('mobile_number', $mobileNumber)->exists();
    }

    public function doUserExistByUsername(string $username): bool
    {
        return $this->model->where('username', $username)->exists();
    }
}
