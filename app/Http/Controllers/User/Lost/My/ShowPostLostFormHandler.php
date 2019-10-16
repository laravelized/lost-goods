<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLostRequest;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;

class ShowPostLostFormHandler extends Controller
{
    public function __invoke(CreateLostRequest $request)
    {
        $categories = Category::all();
        return view('user.lost.create', [
            'categories' => $categories
        ]);
    }
}
