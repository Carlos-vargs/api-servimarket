<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Exception;

class IncorrectPasswordException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        return false;
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response([
            "message" => "The password field is invalid.",
            'errors' => [
                'password' => ['The password field is invalid.'],
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }
}
