<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinhRequest extends FormRequest
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
            'tentinh' => 'required|max:30'
        ];
    }
    public function messages()
    {
        return [
            'tentinh.required' => 'Bạn phải nhập vào tỉnh!',
            'tentinh.max' => 'Tối đa 30 kí tự'
        ];
    }
}
