<?php

namespace App\Services;

use App\Models\User;
use App\Models\Appearance;

class GetAppearanceFromUser
{
    public function run(int $id): Appearance
    {
        return User::find($id)->appearance()->first();
    }
}
