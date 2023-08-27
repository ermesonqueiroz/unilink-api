<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Collection;

class GetLinksFromUserService
{
    public function run(int $id): Collection
    {
        return Link::where('user_id', $id)->get();
    }
}
