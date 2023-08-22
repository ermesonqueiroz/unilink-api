<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Services\CreateLinkService;
use App\Services\UpdateLinkService;

class LinkController extends Controller
{
    public function create(
        CreateLinkRequest $createLinkRequest,
        CreateLinkService $createLinkService
    ): LinkResource
    {
        $data = $createLinkRequest->validated();
        $link = $createLinkService->run($data);
        return new LinkResource($link);
    }

    public function update(
        UpdateLinkRequest $updateLinkRequest,
        int $id,
        UpdateLinkService $updateLinkService
    ): LinkResource
    {
        $data = $updateLinkRequest->validated();
        $link = $updateLinkService->run([...$data, 'id' => $id]);
        return new LinkResource($link);
    }
}
