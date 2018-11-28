<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChitiettourRequest extends FormRequest
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
            'ngaydi' => 'required',
            'ngayve' => 'required',
            //'hinhanh' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tour.required' => 'Bạn phải chọn tour',
            'ngaydi.required' => 'Bạn phải chọn ngày đi',
            'ngayve.required' => 'Bạn phải chọn ngày về',
            //'hinhanh.required' => 'Bạn phải chọn hình ảnh'
        ];
    }
}
