<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:51
 */

namespace App\Modules\User\Exceptions;

class MobileNumberExceedsLimitException extends \Exception
{
    const MESSAGE_KEY = 'mobile_number_exceeds_limit_exception';
}
