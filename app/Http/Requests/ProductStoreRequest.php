<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'catid' => 'required',
            'img' => 'mimes:png,jpg,gif|max:2048',
            'suppid' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'catid.required' => 'Danh mục SP chưa được chọn',
            'suppid.required' => 'Nhà cung cấp chưa được chọn',
            'img.mimes' => 'Hình ảnhng đúng định dạng',
            'img.max' => 'Hình ảnh vượt quá kích thước',
        ];
    }
}
