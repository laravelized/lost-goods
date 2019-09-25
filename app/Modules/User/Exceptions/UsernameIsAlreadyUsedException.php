<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:33
 */

namespace App\Modules\User\Exceptions;

class UsernameIsAlreadyUsedException extends \Exception
{
    const MESSAGE_KEY = 'username_is_already_used_exception';
}
