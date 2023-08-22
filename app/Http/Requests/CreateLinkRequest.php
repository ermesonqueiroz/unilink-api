<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'url' => ['required'],
            'active' => ['nullable'],
            'next_link_id' => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The field title is required',
            'url.required' => 'The field url is required'
        ];
    }
}
