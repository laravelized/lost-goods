<?php

namespace App\Modules\LostGoods\Policies;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\Question;
use App\Modules\Permissions\Permissions;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use App\Modules\User\Models\User;

class QuestionPolicy
{
    private $permissionService;

    public function __construct(PermissionServiceInterface $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function create(User $user)
    {
        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::CREATE_QUESTION, $arrayOfPermissions->toArray());
    }

    public function update(User $user, Question $question)
    {
        $lostGood = LostGood::where('id', $question->lost_good_id)->first();
        if (is_null($lostGood)) {
            return false;
        }

        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        $doHavePermission = in_array(Permissions::UPDATE_QUESTION, $arrayOfPermissions->toArray());
        return $doHavePermission && $lostGood->user_id === $user->id;
    }

    public function delete(User $user, Question $question)
    {
        $lostGood = LostGood::where('id', $question->lost_good_id)->first();
        if (is_null($lostGood)) {
            return false;
        }

        $arrayOfPermissions = $this->permissionService->getPermissionsNameByUser($user);
        $doHavePermission =  in_array(Permissions::DELETE_QUESTION, $arrayOfPermissions->toArray());
        return $doHavePermission && $lostGood->user_id === $user->id;
    }
}
