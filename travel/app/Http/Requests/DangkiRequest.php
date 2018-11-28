<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangkiRequest extends FormRequest
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
            'ten' => 'required|max:30',
            'cmnd' => 'required|integer',
            'diachi'   => 'required',
            'sdt'   => 'required|max:11',
            'email'   => 'required|email',
            'username'   => 'required|max:10',
            'pass'   => 'required',
            'repass'   => 'required_with:pass|same:pass'
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'Bạn phải nhập vào họ tên!',
            'ten.max' => 'Tối đa 30 kí tự',
            'cmnd.required' => 'Bạn phải nhập vào chứng minh',
            'cmnd.integer' => 'Nhập vào đúng số chứng minh',
            'diachi.required'   => 'Bạn phải nhập vào địa chỉ',
            'sdt.required'   => 'Nhập vào số điện thoại',
            'sdt.max'   => 'Bạn phải nhập đúng số điện thoại',
            'email.required'   => 'Bạn phải nhập vào địa chỉ mail',
            'email.email'   => 'Nhập đúng định dạng eamil',
            'username.required'   => 'Bạn phải nhập vào tên đăng nhập',
            'username.max'   => 'Tối đa 10 kí tự',
            'pass.required'   => 'Bạn phải nhập vào mật khẩu',
            'repass.required_with'   => 'Bạn phải nhập lại đúng mật khẩu',
            'repass.same'   => 'Bạn phải nhập vào mật khẩu giống mật khẩu trên'
        ];
    }
}
