<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class DeleteAppearanceService
{
    public function run(): void
    {
        Auth::user()->appearance()->delete();
    }
}
