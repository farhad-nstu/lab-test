<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>'required',
            'npassword'=>['required', 'string', 'min:6', 'confirmed'],
            'cpassword'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required'=>'Please Enter Recepient Name',
            'lastname.required'=>'Please Enter Recepient Phone',
            'delivery_date.required'=>'Please Enter Delivery Date',
            'sender_phone.required'=>'Please Enter Sender Phone',
        ];
    }
}
