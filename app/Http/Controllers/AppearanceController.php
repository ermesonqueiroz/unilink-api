<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppearanceRequest;
use App\Http\Requests\UpdateAppearanceRequest;
use App\Http\Resources\AppearanceResource;
use App\Services\CreateAppearanceService;
use App\Services\UpdateAppearanceService;

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

    public function update(
        UpdateAppearanceRequest $updateAppearanceRequest,
        UpdateAppearanceService $updateAppearanceService
    ): AppearanceResource
    {
        $data = $updateAppearanceRequest->validated();
        $appearance = $updateAppearanceService->run($data);
        return new AppearanceResource($appearance);
    }
}
