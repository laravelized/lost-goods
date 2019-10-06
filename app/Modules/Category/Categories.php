<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 21/09/19
 * Time: 12:23
 */

namespace App\Modules\Category;


class Categories
{
    const VEHICLE = 'vehicle';
    const ELECTRONIC = 'electronic';
    const ACCESORIES = 'accesories';
    const DOCUMENT = 'document';
    const OTHERS = 'others';

    const LIST = [
        self::VEHICLE,
        self::ELECTRONIC,
        self::ACCESORIES,
        self::DOCUMENT,
        self::OTHERS
    ];
}