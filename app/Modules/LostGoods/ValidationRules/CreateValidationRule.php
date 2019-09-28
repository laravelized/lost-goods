<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:05
 */

namespace App\Modules\LostGoods\ValidationRules;

class CreateValidationRule
{
    const RULE = [
        'name' => [
            'required',
            'max:191'
        ]
    ];
}
