<?php

namespace App\Services;

use App\Models\Link;

class DeleteLinkService
{
    public function run(int $linkId): void
    {
        Link::find($linkId)->delete();
    }
}
