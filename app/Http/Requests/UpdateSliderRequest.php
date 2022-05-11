<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 
use Illuminate\Validation\Rule;

class UpdateSliderRequest extends FormRequest
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
            'name' => 
            [
                'required',
                Rule::unique('sliders', 'name')->ignore($this->slider),
            ],
            'url' => 'required',
            'img' => 'mimes:png,jpg,gif|max:2408',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'url.required' => 'Tên url chưa nhập',
            'img.mimes' => 'Hình ảnh chưa đúng định dạng',
        ];
    }
}
