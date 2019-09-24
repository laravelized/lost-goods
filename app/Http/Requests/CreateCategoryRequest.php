<?php

namespace App\Http\Requests;

use App\Modules\Permissions\Permissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows(Permissions::CREATE_CATEGORY);
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
            'parent_category_id' => [
                'nullable',
                'integer'
            ]
        ];
    }
}
