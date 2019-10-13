<?php

namespace App\Http\Requests;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\Permissions\Permissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateLostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $lostGood = LostGood::where('id', $this->route()->parameter('lostGoodId'))->firstOrFail();
        return Gate::allows(Permissions::UPDATE_LOST, $lostGood);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
