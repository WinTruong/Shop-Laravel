<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
            // email và password đều có điều kiện required.
            '*' => 'required'
            // 'email' => 'required',
            // 'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
        ];
    }
}
