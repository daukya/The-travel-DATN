<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'pt' => 'required',
            'sltd' => 'required|integer',
            'tentour'   => 'required',
            'lichtrinh'   => 'required',
            'songay'   => 'required|integer',
            'sodem'   => 'required|integer',
            'bando'   => 'required',
            'gialon'   => 'required|integer',
            'giaem'   => 'required|integer',
            'gianho'   => 'required|integer',
            'ghichu'   => 'required',
            'tinh'   => 'required',
            'diadiem'   => 'required',
            'loaitour'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pt.required' => 'Bạn phải nhập vào phương tiện!',
            'sltd.required' => 'Bạn phải nhập vào số lượng tối đa',
            'sltd.integer' => 'Phải là số',
            'tentour.required' => 'Bạn phải nhập vào tên tour',
            'lichtrinh.required'   => 'Bạn phải nhập vào lịch trình',
            'songay.required'   => 'Nhập vào số ngày',
            'songay.integer'   => 'phải là định dạng số',
            'sodem.required'   => 'Bạn phải nhập vào số đêm',
            'sodem.integer'   => 'phải là định dạng số',
            'bando.required'   => 'Bạn phải nhập vào bản đồ',
            'gialon.required'   => 'nhập vào giá người lớn',
            'gialon.integer'   => 'giá người lớn là kiểu số',
            'giaem.required'   => 'nhập vào giá người trẻ em',
            'giaem.integer'   => 'giá trẻ em là kiểu số',
            'gianho.required'   => 'nhập vào giá người trẻ nhỏ',
            'gianho.integer'   => 'giá trẻ nhỏ là kiểu số',            
            'ghichu.required'   => 'Nhập vào mô tả',            
            'tinh.required'   => 'Nhập vào tỉnh',            
            'diadiem.required'   => 'chọn địa điểm khởi hành',            
            'loaitour.required'   => 'nhập vào loại tour'         
        ];
    }
}
