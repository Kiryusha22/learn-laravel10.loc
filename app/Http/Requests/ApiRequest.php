<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    protected function failedAuthorization()
    {
        throw new ApiException(401, 'Unauthorized');
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ApiException(422, 'Unprocessable Entity', $validator->errors());
    }
}
