<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 17:25
 */

namespace App\Modules\Permissions\Exceptions;

class RoleDoesNoExistsException extends \Exception
{
    const MESSAGE_KEY = 'role_does_not_exist_exception';
}
