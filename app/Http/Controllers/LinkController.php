<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Services\CreateLinkService;

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
}
