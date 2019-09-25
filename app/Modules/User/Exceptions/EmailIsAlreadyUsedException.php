<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:33
 */

namespace App\Modules\User\Exceptions;

class EmailIsAlreadyUsedException extends \Exception
{
    const MESSAGE_KEY = 'email_is_already_used_exception';
}
