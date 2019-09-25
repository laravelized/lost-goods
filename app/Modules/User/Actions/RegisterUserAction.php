<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:14
 */

namespace App\Modules\User\Actions;

use App\Modules\Permissions\Roles;
use App\Modules\Permissions\Services\RoleService\RoleServiceInterface;
use App\Modules\User\Parameters\CreateUserParameter;
use App\Modules\User\Services\UserService\UserServiceInterface;
use Illuminate\Foundation\Application;

class RegisterUserAction
{
    private $userService;
    private $application;
    private $roleService;

    public function __construct(
        Application $application,
        UserServiceInterface $userService,
        RoleServiceInterface $roleService
    )
    {
        $this->application = $application;
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function act(array $params)
    {
        $createUserParameter = $this->application->make(CreateUserParameter::class);
        $createUserParameter->setUsername($params['username']);
        $createUserParameter->setPassword($params['password']);
        $createUserParameter->setMobileNumber($params['mobile_number']);
        $createUserParameter->setGender($params['gender']);
        $createUserParameter->setPassword($params['password']);
        $createUserParameter->setFullname($params['full_name']);
        $createUserParameter->setAddress($params['address']);

        $createUserParameter->validate();

        $user = $this->userService->createUser([
            'username' => $createUserParameter->getUsername(),
            'password' => $createUserParameter->getPassword(),
            'mobile_number' => $createUserParameter->getMobileNumber(),
            'address' => $createUserParameter->getAddress(),
            'full_name' => $createUserParameter->getFullname(),
            'gender' => $createUserParameter->getGender(),
        ]);

        $this->roleService->attachRoleNameToUser(Roles::USER, $user);
    }
}
