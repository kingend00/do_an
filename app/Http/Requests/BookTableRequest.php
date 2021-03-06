<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookTableRequest extends FormRequest
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
            
            'Update_Date' =>'required|min:8',
            'Update_Time' => 'required',
            'Update_Status' => 'required',
            
        ];
    }
    public function attributes()
    {
        return[
            
            'Update_Date' => 'Ngày tháng',
            'Update_Time' =>'Thời gian',
            'Update_Status' => 'Trạng thái'
           
            
        ];

    }
}
