<?php


namespace App\Http\Controllers\User\Found\Other;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowOthersFoundListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $user = $request->user();
            $lostGoods = LostGood
                ::where('user_id', '!=', $user->id)
                ->where('type', LostGoodTypeEnum::FOUND)
                ->get();

            return view('user.found.list', [
                'lostGoods' => $lostGoods,
                'showCreateFoundButton' => false
            ]);

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
