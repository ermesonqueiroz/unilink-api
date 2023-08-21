<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required'],
            'display_name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'The field username is required',
            'display_name.required' => 'The field display_name is required',
            'email.required' => 'The field email is required',
            'password.required' => 'The field password is required',
        ];
    }
}
