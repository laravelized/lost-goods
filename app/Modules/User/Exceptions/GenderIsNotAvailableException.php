<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:43
 */

namespace App\Modules\User\Exceptions;

class GenderIsNotAvailableException extends \Exception
{
    const MESSAGE_KEY = 'gender_is_not_available_exception';
}
