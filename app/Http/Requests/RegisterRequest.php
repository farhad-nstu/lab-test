<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'type'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required'=>'Please Enter Attribute Type',
        ];
    }
}
