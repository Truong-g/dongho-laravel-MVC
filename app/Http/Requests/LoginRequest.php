<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::exists('users', 'name')
            ],
            'password' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.exists' => 'Tên đăng nhập không đúng, vui lòng nhập lại',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}
