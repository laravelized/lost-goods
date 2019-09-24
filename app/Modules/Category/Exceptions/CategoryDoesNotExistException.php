<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 23/09/19
 * Time: 10:15
 */

namespace App\Modules\Category\Exceptions;

class CategoryDoesNotExistException extends \Exception
{
    const MESSAGE_KEY = 'category_does_not_exist_exception';
}
