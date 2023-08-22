<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable'],
            'url' => ['nullable'],
            'active' => ['nullable'],
            'next_link_id' => ['nullable']
        ];
    }
}
