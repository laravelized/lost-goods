<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 26/09/19
 * Time: 20:23
 */

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;
use Illuminate\Http\Request;

class ShowPostFoundFormHandler extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function __invoke(Request $request)
    {
        try {

            $categories = $this->categoryService->getAllCategories();
            return view('user.found.create', [
                'categories' => $categories
            ]);

        } catch (\Exception $exception) {

        }
    }
}
