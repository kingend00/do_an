<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'Password' =>'required|min:8',
            'Name' => 'required',
            'Email' => 'required|email',
            'Phone' => 'required|numeric',
            'Address' => 'max:255',
            
            
            
        ];
    }
    public function attributes()
    {
        return[
            'Name' => 'Tên', 
            'Phone' => 'Số điện thoại',
            //'Description_Add' => 'Mô tả',
            'Address' => 'Địa chỉ',
            'Password' => 'Mật khẩu',
            'Email' => 'Email'
        ];

    }
}
