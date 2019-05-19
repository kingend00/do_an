<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddComboRequest extends FormRequest
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
            'Name_Add' =>'required',
            'Details_Add' => 'required',
            'Type_Add' => 'required',
            'Quantity_Add' => 'required'

        ];
    }
    public function attributes()
    {
        return[
            'Name_Add' => 'Tên', 
            'Details_Add' => 'Chi tiết Combo',
            'Type_Add' => 'Loại',
            'Quantity_Add' => 'Số lượng',
            
        ];

    }
}
