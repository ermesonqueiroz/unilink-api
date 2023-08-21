<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class InvalidUserEmailException extends Exception
{
    public function render(string $email): Application|Response|ResponseFactory
    {
        return response([ 'error' => "The email \"$email\" is invalid." ], 400);
    }
}
