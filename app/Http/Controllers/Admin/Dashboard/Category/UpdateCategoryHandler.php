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
use App\Services\Session\NotificationKeys;

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

            $this->updateCategoryAction->act([
                'category_id' => $categoryId,
                'category_name' => $name,
                'font_awesome_icon_class_name' => $request->input('category_icon')
            ]);

            return back()
                ->with(NotificationKeys::SUCCESS, 'Category has been updated successfully');

        } catch (\Exception $exception) {
            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
