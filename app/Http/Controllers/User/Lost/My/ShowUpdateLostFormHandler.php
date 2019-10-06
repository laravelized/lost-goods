<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowUpdateLostFormHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        try {
            $categories = Category::all();
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            return view('user.lost.update', [
                'lostGood' => $lostGood,
                'categories' => $categories
            ]);
        } catch (\Exception $exception) {

        }
    }
}