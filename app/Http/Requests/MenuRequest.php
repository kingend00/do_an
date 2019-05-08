<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'Name_Add' => 'required',
            'Description_Add' =>'max:255',
            'Price_Add' =>'required|numeric',
            'Category_id_Add' =>'required|numeric'

        ];
    }
}
