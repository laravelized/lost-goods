<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 24/09/19
 * Time: 19:59
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;

class ShowIndexPageHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        return view('user.index', [
            'categories' => $categories
        ]);
    }
}
