<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class InvalidUrlException extends Exception
{
    public function render(string $url): Application|Response|ResponseFactory
    {
        return response([ 'error' => "The url \"$url\" is invalid." ], 400);
    }
}
