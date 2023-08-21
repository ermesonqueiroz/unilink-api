<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\CreateUserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function create(
        CreateUserRequest $createUserRequest,
        CreateUserService $createUserService
    ): Application|ResponseFactory|Response
    {
        $data = $createUserRequest->validated();
        $token = $createUserService->run($data);
        return response($token, 201);
    }
}
