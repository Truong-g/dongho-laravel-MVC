<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 
use Illuminate\Validation\Rule;

class PageUpdateRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'img' => 'mimes:png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên danh mục không được để trống',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'img.mimes' => 'Hình ảnhng đúng định dạng',
            'img.max' => 'Hình ảnh vượt quá kích thước',
        ];
    }
}
