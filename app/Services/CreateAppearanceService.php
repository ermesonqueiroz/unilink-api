<?php

namespace App\Services;

use App\Exceptions\InvalidColorException;
use App\Models\Appearance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateAppearanceService
{
    public function run(array $data): Appearance
    {
        $this->validateData($data);
        return Auth::user()->appearance()->create($data);
    }

    private function validateData(array $data): void
    {
        if (!$this->colorIsValid($data['text_color'])) throw new InvalidColorException();
        if (!$this->colorIsValid($data['background_color'])) throw new InvalidColorException();
        if (!$this->colorIsValid($data['button_color'])) throw new InvalidColorException();
        if (!$this->colorIsValid($data['button_text_color'])) throw new InvalidColorException();
    }

    private function colorIsValid(string $color): bool
    {
        return preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $color);
    }
}
