<?php

namespace App\Modules\LostGoods\Policies;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\Permissions\Permissions;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use App\Modules\User\Models\User;

class LostGoodPolicy
{
    private $permissionService;

    public function __construct(PermissionServiceInterface $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    private function isCreatorSame(User $user, LostGood $lostGood)
    {
        return $lostGood->user_id === $user->id;
    }

    public function create(User $user)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::CREATE_FOUND, $arrayOfPermissions->toArray());
    }

    public function update(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::UPDATE_FOUND, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function delete(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::DELETE_FOUND, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function claim(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::CLAIM_FOUND, $arrayOfPermissions->toArray()) &&
            !$this->isCreatorSame($user, $lostGood);
    }

    public function viewFoundQuestionsList(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::VIEW_FOUND_QUESTIONS_LIST, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function viewFoundClaimsList(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::VIEW_FOUND_CLAIMS_LIST, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function deleteLost(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::DELETE_LOST, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function updateLost(User $user, LostGood $lostGood)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::UPDATE_LOST, $arrayOfPermissions->toArray()) &&
            $this->isCreatorSame($user, $lostGood);
    }

    public function createLost(User $user)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::CREATE_LOST, $arrayOfPermissions->toArray());
    }
}
