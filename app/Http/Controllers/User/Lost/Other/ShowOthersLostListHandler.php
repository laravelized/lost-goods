<?php

namespace App\Http\Controllers\User\Lost\Other;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ShowOthersLostListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->query('category')) {
            $category = Category::where('name', $request->query('category'))->first();
            $query = $category->lostGoods();
        } else {
            $query = LostGood::query();
        }

        $query = $query->where('is_resolved', false);

        if ($request->query('keyword')) {
            $keyword = $request->query('keyword');
            $query = $query->where('name', 'like', "%{$keyword}%");
        }

        if (Auth::check()) {
            $user = $request->user();
            $query = $query->whereNotIn('user_id', [$user->id]);
        }

        $lostGoods = $query
            ->where('type', LostGoodTypeEnum::LOST)
            ->get();

        return view('user.lost.list', [
            'lostGoods' => $lostGoods,
            'showCreateButton' => false
        ]);
    }
}
