<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
            'title' => 
            [
                'required',
                Rule::unique('posts', 'title')->ignore($this->post),
            ],
            'content' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'topid' => 'required',
            'img' => 'mimes:png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên danh mục không được để trống',
            'title.unique' => 'Tên danh mục đã tồn tại',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'topid.required' => 'Danh mục SP chưa được chọn',
            'img.mimes' => 'Hình ảnhng đúng định dạng',
            'img.max' => 'Hình ảnh vượt quá kích thước',
        ];
    }
}
