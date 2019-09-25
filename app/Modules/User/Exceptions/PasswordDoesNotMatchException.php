<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 20:04
 */

namespace App\Modules\User\Exceptions;

class PasswordDoesNotMatchException extends \Exception
{
    const MESSAGE_KEY = 'password_does_not_match_exception';
}
