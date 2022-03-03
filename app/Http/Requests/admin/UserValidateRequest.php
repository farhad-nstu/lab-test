<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required', 'string', '', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'role'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please Enter First Name',
            'role.required'=>'Please Enter Role',
        ];
    }
}
