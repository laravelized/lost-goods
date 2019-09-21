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
    const KENDARAAN = 'kendaraan';
    const MOTOR = 'motor';
    const MOBIL = 'mobil';
    const SEPEDA_MOTOR = 'sepeda_motor';
    const SEPEDA_ANGIN = 'sepeda_angin';
    const KENDARAAN_LAIN_LAIN = 'kendaraan_lain_lain';

    const ELEKTRONIK = 'elekronik';
    const HANDPHONE = 'handphone';
    const LAPTOP = 'laptop';

    const LIST = [
        self::KENDARAAN => [
            self::SEPEDA_MOTOR,
            self::MOBIL,
            self::SEPEDA_ANGIN,
            self::KENDARAAN_LAIN_LAIN
        ],
        self::ELEKTRONIK => [
            self::HANDPHONE,
            self::LAPTOP
        ]
    ];
}