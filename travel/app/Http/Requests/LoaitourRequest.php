<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaitourRequest extends FormRequest
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
            'tenlt' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tenlt.required' => 'Bạn phải nhập loại tour'
        ];
    }
}
