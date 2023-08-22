<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required'],
            'password' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'The field email is required',
            'password.required' => 'The field password is required'
        ];
    }
}
