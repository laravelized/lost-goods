<?php


namespace App\ViewComposers;

use App\Modules\Category\Models\Category;
use Illuminate\View\View;

class SidemenuViewComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
