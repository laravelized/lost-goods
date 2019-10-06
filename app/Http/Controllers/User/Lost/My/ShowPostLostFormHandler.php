<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;

class ShowPostLostFormHandler extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $categories = Category::all();
            return view('user.lost.create', [
                'categories' => $categories
            ]);
        } catch (\Exception $exception) {

        }
    }
}
