<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'tittle' => 'required|min:2|max:100',
            'des' => 'nullable|min:10|max:256',
            'image' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được ít hơn :min chữ số',
            'max' => ':attribute không được nhiều hơn :max chữ số',
        ];
    }
    public function attributes()
    {
        return [
            'tittle' => 'Tiêu đề',
            'image' => 'Hình ảnh',
            'des' => 'Đoạn văn khái quát',
            'content' => 'Nội dung blog',
        ];
    }
}
