<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 12:11
 */

namespace App\Services\StringService;

interface StringServiceInterface
{
    public function getRandomString(int $length): string;
}
