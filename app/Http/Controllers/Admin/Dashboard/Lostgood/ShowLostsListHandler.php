<?php


namespace App\Http\Controllers\Admin\Dashboard\Lostgood;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowLostsListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $lostGoods = LostGood::where('type', LostGoodTypeEnum::LOST)->get();
        return view('admin.dashboard.lostgood.list', [
            'lostGoods' => $lostGoods
        ]);
    }
}
