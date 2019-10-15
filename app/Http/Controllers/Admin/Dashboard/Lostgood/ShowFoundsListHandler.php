<?php


namespace App\Http\Controllers\Admin\Dashboard\Lostgood;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowFoundsListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $lostGoods = LostGood::where('type', LostGoodTypeEnum::FOUND)->get();
        return view('admin.dashboard.lostgood.list', [
            'lostGoods' => $lostGoods
        ]);
    }
}