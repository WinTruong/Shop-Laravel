<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|min:1|max:255',
            'email' => 'required|min:5|max:255',
            'password' => 'nullable|min:6|max:255',
            'phone' => 'required|min:10',
            'address' => 'required|min:5',
            'country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            // 'numberic' => ':attribute phải có số',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người dùng',
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'country' => 'Quốc gia',
        ];
    }
}
