<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 21/09/19
 * Time: 10:53
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowCreateCategoryFormHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard.category.create');
    }
}
