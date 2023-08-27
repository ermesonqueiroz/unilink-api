<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $links = $this->links->map(function ($link) {
            return [
                "title" => $link->title,
                "url" => $link->url,
                "active" => $link->active,
                "next_link_id" => $link->next_link_id
            ];
        });

        return [
            "user" => [
                "username" => $this->user->username,
                "display_name" => $this->user->display_name,
                "email" => $this->user->email
            ],
            "appearance" => [
                'text_color' => $this->appearance->text_color,
                'background_color' => $this->appearance->background_color,
                'button_color' => $this->appearance->button_color,
                'button_text_color' => $this->appearance->button_text_color
            ],
            "links" => $links
        ];
    }
}
