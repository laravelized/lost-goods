<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:33
 */

namespace App\Http\Controllers\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Modules\Category\Actions\CreateCategoryAction;
use Illuminate\Http\Request;

class CreateCategoryHandler extends Controller
{
    private $createCategoryAction;

    public function __construct(CreateCategoryAction $createCategoryAction)
    {
        $this->createCategoryAction = $createCategoryAction;
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'category_name' => [
                'required',
                'max:191'
            ]
        ]);

        try {

            $this->createCategoryAction->act([
                'name' => $request->input('category_name')
            ]);

            return back()
                ->with('success', trans('messages.category_created'));

        } catch (\Exception $exception) {

            return back()
                ->with('exception', trans('exception' . $exception->getMessage()));
        }
    }
}
