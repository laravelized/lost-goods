<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:34
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Modules\Category\Actions\UpdateCategoryAction;

class UpdateCategoryHandler extends Controller
{
    private $updateCategoryAction;

    public function __construct(UpdateCategoryAction $updateCategoryAction)
    {
        $this->updateCategoryAction = $updateCategoryAction;
    }

    public function __invoke(UpdateCategoryRequest $request, $categoryId)
    {
        try {

            $name = $request->input('category_name');
            $parentCategoryId = $request->input('parent_category_id') ?? null;

            $this->updateCategoryAction->act([
                'category_id' => $categoryId,
                'category_name' => $name,
                'parent_category_id' => $parentCategoryId
            ]);

            return back()
                ->with('success', 'Category has been updated successfully');

        } catch (\Exception $exception) {

            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
