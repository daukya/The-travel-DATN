<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuongtrinhtourRequest extends FormRequest
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
            'tour' => 'required',
            'ngaythu' => 'required',
            'mota' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tour.required' => 'Bạn phải chọn tour',
            'ngaythu.required' => 'Bạn phải chọn ngày thứ',
            'mota.required' => 'Bạn phải nhập mô tả'
        ];
    }
}
