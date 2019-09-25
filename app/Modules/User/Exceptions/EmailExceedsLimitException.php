<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:39
 */

namespace App\Modules\User\Exceptions;

class EmailExceedsLimitException extends \Exception
{
    const MESSAGE_KEY = 'email_exceeds_limit_exception';
}
