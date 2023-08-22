<?php

namespace App\Services;

use App\Exceptions\CannotFindUserException;
use App\Exceptions\IncorrectLoginCredentialsException;
use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\InvalidUserEmailException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function run(array $data): string
    {
        $this->validateData($data);
        return Auth::user()->createToken($data['email'])->plainTextToken;
    }

    private function validateData(array $data): void
    {
        $email = $data['email'];

        if (!$this->emailIsValid($email)) throw new InvalidUserEmailException($email);
        if (!$this->userExists($email)) throw new IncorrectLoginCredentialsException();
        if (!Auth::attempt($data)) throw new IncorrectLoginCredentialsException();
    }

    private function emailIsValid(string $email): bool
    {
        return preg_match('/^[\w\.-]+@[\w\.-]+\.\w+$/', $email);
    }

    private function userExists(string $email): User|null
    {
        return User::where('email', $email)->first();
    }
}
