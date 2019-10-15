<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAdminProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'max:191',
                'unique:users,username,' . $this->user()->id
            ],
            'full_name' => [
                'required',
                'max:191'
            ],
            'email' => [
                'required',
                'max:191',
                'unique:users,email,' . $this->user()->id
            ],
            'password' => [
                'nullable',
                'confirmed'
            ],
            'password_confirmation' => [
                'nullable'
            ],
            'mobile_number' => [
                'required',
                'unique:users,email,' . $this->user()->id
            ],
            'address' => [
                'required',
                'max:191'
            ],
        ];
    }
}
