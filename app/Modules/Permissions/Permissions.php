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

    const VIEW_USERS_LIST = 'view-user';
    const UPDATE_USER = 'update-user';
    const DELETE_USER = 'delete-user';
    const VIEW_USER_DETAIL = 'view-user-detail';

    const VIEW_CATEGORIES_LIST = 'view-categories-list';
    const CREATE_CATEGORY = 'create-category';
    const UPDATE_CATEGORY = 'update-category';
    const DELETE_CATEGORY = 'delete-category';

    const CREATE_FOUND = 'create_founds';
    const UPDATE_FOUND = 'update_founds';
    const DELETE_FOUND = 'delete_found';

    const VIEW_FOUND_QUESTIONS_LIST = 'view_found_questions_list';

    const CLAIM_FOUND = 'claim_found';
    const VIEW_FOUND_CLAIMS_LIST = 'view_found_claims_list';

    const CREATE_QUESTION = 'create_question';
    const UPDATE_QUESTION = 'update_question';
    const DELETE_QUESTION = 'delete_question';

    const LIST = [
        self::ACCESS_ADMIN_DASHBOARD => 'access admin dashboard',
        self::ACCESS_USER_DASHBOARD => 'access user dashboard',

        self::VIEW_CATEGORIES_LIST => 'view category list',
        self::CREATE_CATEGORY => 'create category',
        self::UPDATE_CATEGORY => 'update category',
        self::DELETE_CATEGORY => 'delete category',

        self::CREATE_FOUND => 'create found',
        self::UPDATE_FOUND => 'update found',
        self::DELETE_FOUND => 'delete found',

        self::VIEW_FOUND_QUESTIONS_LIST => 'view found questions list',

        self::CLAIM_FOUND => 'claim found',
        self::VIEW_FOUND_CLAIMS_LIST => 'view found claims list',

        self::CREATE_QUESTION => 'create question',
        self::UPDATE_QUESTION => 'update question',
        self::DELETE_QUESTION => 'delete question'
    ];
}