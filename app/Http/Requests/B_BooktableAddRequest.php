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
            'Date' =>'required|after:today',
            'Time' => 'required',
            'Number_seat' => 'required',
            'Type_seat' => 'required',
        ];
    }
}
