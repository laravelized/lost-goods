<?php

namespace App\Http\Controllers\Admin\Dashboard\Lostgood;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowUpdateLostGoodFormHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $lostGood = LostGood::where('id', $lostGoodId)->firstOrFail();
        $categories = Category::all();

        return view('admin.dashboard.lostgood.update', [
            'lostGood' => $lostGood,
            'categories' => $categories
        ]);
    }
}
