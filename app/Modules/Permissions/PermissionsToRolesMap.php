<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 11:20
 */

namespace App\Modules\Permissions;

class PermissionsToRolesMap
{
    const LIST = [
        Roles::ADMIN => [
            Permissions::ACCESS_ADMIN_DASHBOARD,
            Permissions::ACCESS_USER_DASHBOARD,

            Permissions::VIEW_CATEGORIES_LIST,
            Permissions::CREATE_CATEGORY,
            Permissions::UPDATE_CATEGORY,
            Permissions::DELETE_CATEGORY
        ],
        Roles::USER => [
            Permissions::ACCESS_USER_DASHBOARD
        ]
    ];
}
