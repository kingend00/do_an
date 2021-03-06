<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class B_BooktableAddRequest extends FormRequest
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
            'Name' =>'required',
            'Phone' => 'required|numeric',
            'Date' =>'required',
            'Time' => 'required',
            'Number_seat' => 'required',
            'Type_seat' => 'required',
        ];
    }
    public function attributes()
    {
        return[
            'Name' => 'Tên', 
            'Phone' => 'Số điện thoại',
            'Date' => 'Ngày tháng',
            'Time' => 'Thời gian',
            'Number_seat' => 'Số bàn',
            'Type_seat' =>'Loại bàn'
            
        ];

    }
}
