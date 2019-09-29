<?php


namespace App\Modules\Category\Policies;


use App\Modules\Category\Models\Category;
use App\Modules\Permissions\Permissions;
use App\Modules\Permissions\Services\PermissionService\PermissionServiceInterface;
use App\Modules\User\Models\User;

class CategoryPolicy
{
    private $permissionService;

    public function __construct(PermissionServiceInterface $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function create(User $user)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::CREATE_CATEGORY, $permissionNames->toArray());
    }

    public function update(User $user, Category $category)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::UPDATE_CATEGORY, $permissionNames->toArray());
    }

    public function delete(User $user, Category $category)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::DELETE_CATEGORY, $permissionNames->toArray());
    }

    public function viewCategoriesList(User $user)
    {
        $permissionNames = $this->permissionService->getPermissionsNameByUser($user);
        return in_array(Permissions::VIEW_CATEGORIES_LIST, $permissionNames->toArray());
    }
}