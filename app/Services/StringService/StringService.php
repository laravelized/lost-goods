<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 12:12
 */

namespace App\Services\StringService;

use Illuminate\Support\Str;

class StringService implements StringServiceInterface
{
    public function getRandomString(int $length = 16): string
    {
        return Str::random($length);
    }
}
