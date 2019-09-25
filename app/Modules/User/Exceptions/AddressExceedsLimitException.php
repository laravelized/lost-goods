<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 16:59
 */

namespace App\Modules\User\Exceptions;

class AddressExceedsLimitException extends \Exception
{
    const MESSAGE_KEY = 'address_exceeds_limit_exception';
}
