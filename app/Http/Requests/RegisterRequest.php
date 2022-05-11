<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class RegisterRequest extends FormRequest
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
                'min:5',
                'required',
                Rule::unique('users', 'name')->ignore($this->user)
            ],
            'email' => [
                'email:rfc,dns',
                'required',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:5|required_with:repassword|same:repassword',
            'repassword' => 'min:5',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.min' => 'Tên đăng nhập phải lớn hơn 5 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Trường này phải là email',
            'email.unique' => 'Email này đã được đăng ký',
            'fullname.required' => 'Họ tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 5 ký tự',
            'password.required' => 'Mật khẩu phải là các ký tự chữ và số',
            'password.required_with' => 'Nhập lại mật khẩu không đúng',
            'password.same' => 'Nhập lại mật khẩu không đúng',
            'repassword' => 'Mật khẩu phải lớn hơn 5 ký tự',
        ];
    }
}
