<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 21/09/19
 * Time: 10:53
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowCreateCategoryFormRequest;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;

class ShowCreateCategoryFormHandler extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function __invoke(ShowCreateCategoryFormRequest $request)
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.dashboard.category.create', [
            'categories' => $categories
        ]);
    }
}
