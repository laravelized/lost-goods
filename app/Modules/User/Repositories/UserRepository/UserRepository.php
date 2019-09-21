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
}
