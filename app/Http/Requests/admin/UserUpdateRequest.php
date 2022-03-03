<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email' => "required|unique:users,email,{$this->user->id}",
            'phone' => "required|unique:users,phone,{$this->user->id}",
            'role' => ['required', '', '', '']
        ];
    }
}
