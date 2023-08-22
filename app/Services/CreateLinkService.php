<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\InvalidUrlException;

class CreateLinkService
{
    public function run(array $data): Link
    {
        $this->validateData($data);
        return Auth::user()->links()->create($data);
    }

    private function validateData(array $data): void
    {
        if (!$this->urlIsValid($data['url'])) throw new InvalidUrlException();
    }

    private function urlIsValid(string $url): bool
    {
        return preg_match('/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i', $url);
    }
}
