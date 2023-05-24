<?php

namespace App\Http\Requests\api\User;

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
            'name' => 'required',
            'email' => 'required|email|unique:users,id',
            'password' => 'required',
            'phone' => 'required|integer|regex:/^\d{10,11}$/',
            'active' => 'required|boolean',
        ];
    }
}
