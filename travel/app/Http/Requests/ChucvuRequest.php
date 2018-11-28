<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChucvuRequest extends FormRequest
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
            'tencv' => 'required|max:30'
        ];
    }
    public function messages()
    {
        return [
            'tencv.required' => 'Bạn phải nhập vào chức vụ!',
            'tencv.max' => 'Tối đa 30 kí tự'
        ];
    }
}
