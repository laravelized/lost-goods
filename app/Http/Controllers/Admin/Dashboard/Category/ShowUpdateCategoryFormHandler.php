<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 22/09/19
 * Time: 1:55
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowUpdateCategoryFormRequest;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;

class ShowUpdateCategoryFormHandler extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function __invoke(ShowUpdateCategoryFormRequest $request, $categoryId)
    {
        try {
            $category = $this->categoryService->getCategoryById($categoryId);

            return view('admin.dashboard.category.update', [
                'category' => $category,
            ]);

        } catch (\Exception $exception) {

            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
