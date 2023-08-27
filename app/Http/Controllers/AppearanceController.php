<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppearanceRequest;
use App\Http\Requests\UpdateAppearanceRequest;
use App\Http\Resources\AppearanceResource;
use App\Services\CreateAppearanceService;
use App\Services\DeleteAppearanceService;
use App\Services\DeleteLinkService;
use App\Services\UpdateAppearanceService;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function update(
        UpdateAppearanceRequest $updateAppearanceRequest,
        UpdateAppearanceService $updateAppearanceService
    ): AppearanceResource
    {
        $data = $updateAppearanceRequest->validated();
        $appearance = $updateAppearanceService->run($data);
        return new AppearanceResource($appearance);
    }

    public function delete(DeleteAppearanceService $deleteAppearanceService): void
    {
        $deleteAppearanceService->run();
    }
}
