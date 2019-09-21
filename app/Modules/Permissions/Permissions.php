<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 11:19
 */

namespace App\Modules\Permissions;

class Permissions
{
    const ACCESS_ADMIN_DASHBOARD = 'access-admin-dashboard';
    const ACCESS_USER_DASHBOARD = 'access-user-dashboard';

    const VIEW_CATEGORIES_LIST = 'view-categories-list';
    const CREATE_CATEGORY = 'create-category';
    const UPDATE_CATEGORY = 'update-category';
    const DELETE_CATEGORY = 'delete-category';

    const LIST = [
        self::ACCESS_ADMIN_DASHBOARD => 'access admin dashboard',
        self::ACCESS_USER_DASHBOARD => 'access user dashboard',

        self::VIEW_CATEGORIES_LIST => 'view category list',
        self::CREATE_CATEGORY => 'create category',
        self::UPDATE_CATEGORY => 'update category',
        self::DELETE_CATEGORY => 'delete category'
    ];
}