<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|alpha|min:2|max:255',
            'email' => 'required|email|min:3|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là 1 chuỗi',
            'alpha' => ':attribute chỉ gồm chữ cái',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'email' => ':attribute phải đúng theo mẫu a@a.a',
            'unique' => 'Có lỗi xảy ra, xin hãy thử lại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người dùng',
            'email' => 'Địa chỉ e-mail',
            'password' => 'Mật khẩu',
        ];
    }
}
