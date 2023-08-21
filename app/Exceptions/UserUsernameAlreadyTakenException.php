<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class UserUsernameAlreadyTakenException extends Exception
{
    public function render(string $email): Application|Response|ResponseFactory
    {
        return response([ 'error' => "The email \"$email\" already in use." ], 400);
    }
}
