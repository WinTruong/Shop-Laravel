<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255|unique:countries',
        ];
    }

    public function messages() {
        return [
            'required' => 'Tên :attribute không được để trống',
            'string' => 'Tên :attribute phải là chuỗi',
            'max' => 'Tên :attribute không được lớn hơn :max ký tự',
            'unique' => 'Tên :attribute đã có, xin mời nhập tên :attribute khác',
        ];
    }

    public function attributes() {
        return [
            'name_country' => 'quốc gia',
        ];
    }
}
