<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:13
 */

namespace App\Modules\LostGoods\Repositories\LostGoodImageRepository;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use Illuminate\Support\Collection;

interface LostGoodImageRepositoryInterface
{
    public function create(array $params): LostGoodImage;

    public function getByLostGood(LostGood $lostGood): Collection;

    public function getByFileName(string $fileName): ?LostGoodImage;
}
