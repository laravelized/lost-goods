<?php


namespace App\Http\Controllers\User\Found\Other;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowOthersFoundListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        try {

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
                $query = $query->where('user_id', '!=', $user->id);
            }

            $lostGoods = $query
                ->where('type', LostGoodTypeEnum::FOUND)
                ->get();

            return view('user.found.list', [
                'lostGoods' => $lostGoods,
                'showCreateFoundButton' => false
            ]);

        } catch (\Exception $e) {
            abort(500);
        }
    }
}
