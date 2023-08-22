<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class InvalidNextLinkIdException extends Exception
{
    public function render(int $id): Application|Response|ResponseFactory
    {
        return response([
            'error' => 'Invalid next_link_id',
            'message' => "Cannot find link with id \"$id\""
        ], 400);
    }
}
