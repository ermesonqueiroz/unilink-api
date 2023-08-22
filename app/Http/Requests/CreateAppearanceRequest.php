<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppearanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text_color' => ['required'],
            'background_color' => ['required'],
            'button_color' => ['required'],
            'button_text_color' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'text_color.required' => 'The field text_color is required',
            'background_color.required' => 'The field background_color is required',
            'button_color.required' => 'The field button_color is required',
            'button_text_color.required' => 'The field button_text_color is required'
        ];
    }
}
