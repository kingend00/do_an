<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComboRequest extends FormRequest
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
            'Details' => 'required',
            'Type' => 'required',
            'Quantity' => 'required'
        ];
    }
    public function attributes()
    {
        return[
            'Name' => 'Tên', 
            'Details' => 'Chi tiết',
            //'Description_Add' => 'Mô tả',
            'Type' => 'Loại',
            'Quantity' => 'Số lượng'
        ];

    }
}
