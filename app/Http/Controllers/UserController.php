<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Services\CreateUserService;
use App\Services\FindUserByIdService;
use App\Services\GetAppearanceFromUser;
use App\Services\GetLinksFromUserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function findById(
        Request $findUserByIdRequest,
        FindUserByIdService $findUserByIdService
    )
    {
        $id = $findUserByIdRequest->user()->id;
        $user = $findUserByIdService->run($id);
        return new UserResource($user);
    }

    public function create(
        CreateUserRequest $createUserRequest,
        CreateUserService $createUserService
    ): Application|ResponseFactory|Response
    {
        $data = $createUserRequest->validated();
        $token = $createUserService->run($data);
        return response($token, 201);
    }

    public function getProfile(
        int $id,
        FindUserByIdService $findUserByIdService,
        GetAppearanceFromUser $getAppearanceFromUser,
        GetLinksFromUserService $getLinksFromUserService,
    )
    {
        $user = $findUserByIdService->run($id);
        $appearance = $getAppearanceFromUser->run($id);
        $links = $getLinksFromUserService->run($id);

        return new ProfileResource((object) [
            "user" => $user,
            "appearance" => $appearance,
            "links" => $links
        ]);
    }
}
