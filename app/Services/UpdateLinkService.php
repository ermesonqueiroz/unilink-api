<?php

namespace App\Services;

use App\Exceptions\InvalidNextLinkIdException;
use App\Exceptions\InvalidUrlException;
use App\Models\Link;

class UpdateLinkService
{
    public function run(array $data): Link
    {
        $this->validateData($data);
        $link = Link::find($data['id']);
        $link->update($data);
        return $link;
    }

    private function validateData(array $data): void
    {
        if (array_key_exists('url', $data)) $this->validateUrl($data['url']);
        if (array_key_exists('next_link_id', $data)) $this->validateNextLinkId($data['next_link_id']);
    }

    private function validateUrl(string $url): void
    {
        if (!preg_match('/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i', $url)) {
            throw new InvalidUrlException();
        }
    }

    private function validateNextLinkId(int $id): void
    {
        if(!Link::find($id)) {
            throw new InvalidNextLinkIdException($id);
        }
    }
}
