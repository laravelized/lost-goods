<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 22/09/19
 * Time: 1:55
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteCategoryRequest;
use App\Modules\Category\Actions\DeleteCategoryAction;

class DeleteCategoryHandler extends Controller
{
    private $deleteCategoryAction;

    public function __construct(DeleteCategoryAction $deleteCategoryAction)
    {
        $this->deleteCategoryAction = $deleteCategoryAction;
    }

    public function __invoke(DeleteCategoryRequest $deleteCategoryRequest, $categoryId)
    {
        try {
            $this->deleteCategoryAction->act([
                'category_id' => $categoryId
            ]);

            return back()
                ->with('success', 'Category has been deleted successfully');

        } catch (\Exception $exception) {

            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
