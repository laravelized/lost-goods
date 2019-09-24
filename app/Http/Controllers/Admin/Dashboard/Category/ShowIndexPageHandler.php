<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:33
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowCategoriesListRequest;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepositoryInterface;

class ShowIndexPageHandler extends Controller
{
    private $categoryService;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryService = $categoryRepository;
    }

    public function __invoke(ShowCategoriesListRequest $request)
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return view('admin.dashboard.category.index', [
                'categories' => $categories
            ]);
        } catch (\Exception $exception) {
            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
