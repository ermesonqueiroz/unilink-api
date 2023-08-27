<?php

namespace App\Services;

use App\Models\User;

class FindUserByIdService
{
    public function run(int $id): User
    {
        return User::find($id);
    }
}
