<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:39
 */

namespace App\Modules\LostGoods\Repositories\LostGoodRepository;

use App\Modules\LostGoods\Models\LostGood;

interface LostGoodRepositoryInterface
{
    public function createFound(array $params): LostGood;

    public function createLost(array $params): LostGood;
}
