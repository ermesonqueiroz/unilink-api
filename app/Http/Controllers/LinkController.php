<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Services\CreateLinkService;
use App\Services\UpdateLinkService;
use App\Services\DeleteLinkService;

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

    public function update(UpdateLinkRequest $updateLinkRequest,
        int $id,
        UpdateLinkService $updateLinkService
    ): LinkResource
    {
        $data = $updateLinkRequest->validated();
        $link = $updateLinkService->run([...$data, 'id' => $id]);
        return new LinkResource($link);
    }

    public function delete(Request $deleteRequest, int $id, DeleteLinkService $deleteLinkService): void
    {
        $deleteLinkService->run($id);
    }
}
