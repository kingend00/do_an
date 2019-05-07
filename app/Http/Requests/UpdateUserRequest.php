<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'Update_Name'=> 'required',
            'Update_Phone'=> 'required|numeric',
            'Update_Address' => 'required:max:255',
            'Update_Password' => 'required|min:5',
            'Update_Email' => 'required|email',
        ];
    }
}
