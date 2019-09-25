<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 12:57
 */

namespace App\Modules\Permissions\Services\RoleService;

use App\Modules\Permissions\Exceptions\RoleDoesNoExistsException;
use App\Modules\Permissions\Models\Role;
use App\Modules\Permissions\Repositories\RoleRepository\RoleRepositoryInterface;
use App\Modules\User\Models\User;

class RoleService implements RoleServiceInterface
{
    private $roleRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository
    )
    {
        $this->roleRepository = $roleRepository;
    }

    public function attachRoleToUser(Role $role, User $user): void
    {
        $this->roleRepository->attachRoleToUser($role, $user);
    }

    public function attachRoleNameToUser(string $roleName, User $user): void
    {
        $role = $this->roleRepository->getRoleByName($roleName);

        if (is_null($role)) {
            throw new RoleDoesNoExistsException(RoleDoesNoExistsException::MESSAGE_KEY);
        }

        $this->attachRoleToUser($role, $user);
    }
}
