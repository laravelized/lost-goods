<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowLostsListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $user = $request->user();

            $lostGoods = LostGood
                ::where('type', LostGoodTypeEnum::LOST)
                ->where('user_id', $user->id)
                ->get();

            return view('user.lost.list', [
                'lostGoods' => $lostGoods,
                'showCreateButton' => true
            ]);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
