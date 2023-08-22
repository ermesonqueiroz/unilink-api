<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class InvalidColorException extends Exception
{
    public function render(string $color): Application|Response|ResponseFactory
    {
        return response([ "error" => "Invalid hexadecimal color code \"$color\""], 400);
    }
}
