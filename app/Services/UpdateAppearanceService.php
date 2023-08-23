<?php

namespace App\Services;

use App\Exceptions\InvalidColorException;
use App\Models\Appearance;
use Illuminate\Support\Facades\Auth;

class UpdateAppearanceService
{
    public function run(array $data): Appearance
    {
        $this->validateData($data);
        Auth::user()->appearance()->update($data);
        return Auth::user()->appearance()->first();
    }

    private function validateData(array $data): void
    {
        if (array_key_exists('text_color', $data)) $this->validateColor($data['text_color']);
        if (array_key_exists('background_color', $data)) $this->validateColor($data['background_color']);
        if (array_key_exists('button_color', $data)) $this->validateColor($data['button_color']);
        if (array_key_exists('button_text_color', $data)) $this->validateColor($data['button_text_color']);
    }

    private function validateColor(string $color): void
    {
        if (!preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $color)) throw new InvalidColorException();
    }
}
