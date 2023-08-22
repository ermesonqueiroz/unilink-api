<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppearanceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text_color' => $this->text_color,
            'background_color' => $this->background_color,
            'button_color' => $this->button_color,
            'button_text_color' => $this->button_text_color
        ];
    }
}
