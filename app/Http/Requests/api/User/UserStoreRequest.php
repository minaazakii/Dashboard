<?php

namespace App\Http\Requests\api\User;

use App\Helpers\ErrorHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        ErrorHelper::JsonFormat($validator);
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
