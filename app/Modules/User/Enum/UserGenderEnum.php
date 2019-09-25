<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 20/09/19
 * Time: 10:57
 */

namespace App\Modules\User\Enum;

class UserGenderEnum
{
    const MALE = [
        'value' => 0,
        'key' => 'male'
    ];

    const FEMALE = [
        'value' => 1,
        'key' => 'female'
    ];

    const OPTIONS = [
        self::MALE,
        self::FEMALE
    ];

    const AVAILABLE_VALUES = [
        self::MALE['value'],
        self::FEMALE['value']
    ];
}
