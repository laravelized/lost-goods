<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:33
 */

namespace App\Modules\User\Services\UserService;

use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getByUsername(string $userName): ?User
    {
        return $this->userRepository->getByUsername($userName);
    }
}
