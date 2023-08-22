<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppearanceRequest;
use App\Http\Resources\AppearanceResource;
use App\Services\CreateAppearanceService;

class AppearanceController extends Controller
{
    public function create(
        CreateAppearanceRequest $createAppearanceRequest,
        CreateAppearanceService $createAppearanceService
    ): AppearanceResource
    {
        $data = $createAppearanceRequest->validated();
        $appearance = $createAppearanceService->run($data);
        return new AppearanceResource($appearance);
    }
}
