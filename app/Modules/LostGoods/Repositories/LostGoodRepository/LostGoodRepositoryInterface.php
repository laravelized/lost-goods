<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:39
 */

namespace App\Modules\LostGoods\Repositories\LostGoodRepository;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

interface LostGoodRepositoryInterface
{
    public function createFound(array $params): LostGood;

    public function createLost(array $params): LostGood;

    public function getFoundsByUser(User $user): Collection;

    public function getLostsByUser(User $user): Collection;
}
