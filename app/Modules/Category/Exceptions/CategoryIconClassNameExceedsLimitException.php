<?php

namespace App\Modules\Category\Exceptions;

class CategoryIconClassNameExceedsLimitException extends \Exception
{
    const MESSAGE_KEY = 'category_icon_class_name_exceeds_limit';
}
