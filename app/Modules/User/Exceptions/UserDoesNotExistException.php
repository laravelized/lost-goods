<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 20:02
 */

namespace App\Modules\User\Exceptions;

class UserDoesNotExistException extends \Exception
{
    const MESSAGE_KEY = 'user_does_not_exist_exception';
}
