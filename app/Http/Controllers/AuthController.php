<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest, LoginService $loginService): Application|Response|ResponseFactory
    {
        $data = $loginRequest->validated();
        $token = $loginService->run($data);
        return response($token, 201);
    }
}
