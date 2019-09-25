<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:46
 */

namespace App\Modules\User\Exceptions;

class FullnameExceedsLimitException extends \Exception
{
    const MESSAGE_KEY = 'fullname_exceeds_limit_exception';
}
