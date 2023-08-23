<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppearanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text_color' => ['nullable'],
            'background_color' => ['nullable'],
            'button_color' => ['nullable'],
            'button_text_color' => ['nullable']
        ];
    }
}
