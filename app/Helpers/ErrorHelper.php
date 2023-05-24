<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ErrorHelper
{
    public static function JsonFormat(Validator $validator)
    {
        $response = response()->json([
            'message'=>'Validation Error',
            'details'=>$validator->errors()
        ],422);
        throw new HttpResponseException($response);
    }
}
