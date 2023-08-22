<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class IncorrectLoginCredentialsException extends Exception
{
    public function render(): Application|Response|ResponseFactory
    {
        return response([ "error" => "Incorrect credentials"], 401);
    }
}
