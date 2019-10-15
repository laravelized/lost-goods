<?php

namespace App\Http\Requests;

use App\Modules\Category\Models\Category;
use App\Modules\Permissions\Permissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $category = Category::where('id', $this->route()->parameter('categoryId'))->firstOrFail();
        return Gate::allows(Permissions::UPDATE_CATEGORY, $category);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => [
                'required',
                'max:191'
            ],
            'category_icon' => [
                'required',
                'max:191'
            ]
        ];
    }
}
