<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required', 'string', '', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'role'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required'=>'Please Enter First Name',
            'lastname.required'=>'Please Enter Last Name',
            'role.required'=>'Please Enter Category Name',
        ];
    }
}
