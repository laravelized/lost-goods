<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:34
 */

namespace App\Modules\User\Exceptions;

class MobileNumberIsAlreadyUsedException extends \Exception
{
    const MESSAGE_KEY = 'mobile_number_is_already_used_exception';
}
