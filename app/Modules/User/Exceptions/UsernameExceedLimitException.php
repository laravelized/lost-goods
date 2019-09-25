<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:45
 */

namespace App\Modules\User\Exceptions;

class UsernameExceedLimitException extends \Exception
{
    const MESSAGE_KEY = 'username_exceeds_limit_exception';
}
