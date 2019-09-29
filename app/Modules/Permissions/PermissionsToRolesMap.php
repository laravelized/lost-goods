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
            Permissions::DELETE_CATEGORY,

            Permissions::VIEW_USERS_LIST,
            Permissions::UPDATE_USER,
            Permissions::DELETE_USER,
            Permissions::VIEW_USER_DETAIL
        ],
        Roles::USER => [
            Permissions::ACCESS_USER_DASHBOARD,

            Permissions::CREATE_FOUND,
            Permissions::UPDATE_FOUND,
            Permissions::DELETE_FOUND,
            Permissions::VIEW_FOUND_QUESTIONS_LIST,
            Permissions::CLAIM_FOUND,

            Permissions::CREATE_QUESTION,
            Permissions::UPDATE_QUESTION,
            Permissions::DELETE_QUESTION
        ]
    ];
}
