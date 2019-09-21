<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:33
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class ShowIndexPageHandler extends Controller
{
    private $categoryService;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryService = $categoryRepository;
    }

    public function __invoke(Request $request)
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return view('admin.dashboard.category.index', [
                'categories' => $categories
            ]);
        } catch (\Exception $exception) {
            return back()
                ->with('exceptions', $exception->getMessage());
        }
    }
}
