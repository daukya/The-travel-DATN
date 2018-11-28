<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieudatRequest extends FormRequest
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
            'ghichu' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'ghichu.required' => 'Bạn phải nhập thông tin khách đi cùng'
        ];
    }
}
