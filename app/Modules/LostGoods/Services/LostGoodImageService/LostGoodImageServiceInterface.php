<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:14
 */

namespace App\Modules\LostGoods\Services\LostGoodImageService;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use Illuminate\Support\Collection;

interface LostGoodImageServiceInterface
{
    public function create(array $params): LostGoodImage;

    public function getByLostGood(LostGood $lostGood): ?Collection;

    public function getByFileName(string $fileName): ?LostGoodImage;
}
