<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'username' => 'required|min:5|max:255',
            'age' => 'required|integer|max:120',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'integer' => ':attribute chỉ được nhập số',
        ];
    }

    public function attributes() {
        return [
            'username' => 'Tiêu đề',
            'age' => 'Tuổi',
        ];
    }
}
