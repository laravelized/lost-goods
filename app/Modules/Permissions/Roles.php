<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 11:19
 */

namespace App\Modules\Permissions;

class Roles
{
    const ADMIN = 'admin';
    const USER = 'user';

    const LIST = [
        self::ADMIN => 'admin account',
        self::USER => 'user account'
    ];
}
