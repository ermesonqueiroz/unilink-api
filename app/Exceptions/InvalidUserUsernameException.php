<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class InvalidUserUsernameException extends Exception
{
    public function render(string $username): Application|Response|ResponseFactory
    {
        return response([ 'error' => "The username \"$username\" is invalid." ], 400);
    }
}
