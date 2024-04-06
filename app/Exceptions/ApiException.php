<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $response = [
            'message' => $message
        ];
        if (count($errors) > 0) {
            $response['errors'] = $errors;
        }
        parent::__construct( response()->json($response)->setStatusCode($code) );
    }
}


