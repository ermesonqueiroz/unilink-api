<?php

namespace App\Services;

use App\Exceptions\UserEmailAlreadyTakenException;
use App\Models\User;
use App\Exceptions\InvalidUserEmailException;
use App\Exceptions\InvalidUserUsernameException;
use App\Exceptions\UserUsernameAlreadyTakenException;
use Illuminate\Support\Facades\Auth;

class CreateUserService
{
    public function run(array $data): string
    {
        $this->validateData($data);

        $user = new User($data);
        $user->save();

        Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        return Auth::user()->createToken($data['email'])->plainTextToken;
    }

    private function validateData(array $data): void
    {
        $username = $data['username'];
        $email = $data['email'];

        if (!$this->usernameIsValid($username)) throw new InvalidUserUsernameException($username);
        if (!$this->emailIsValid($email)) throw new InvalidUserEmailException($email);
        if ($this->usernameAlreadyTaken($username)) throw new UserUsernameAlreadyTakenException($username);
        if ($this->emailAlreadyTaken($email)) throw new UserEmailAlreadyTakenException($email);
    }

    private function usernameIsValid(string $username): bool
    {
        return preg_match('/^[a-zA-Z0-9_.]{1,30}$/', $username);
    }

    private function emailIsValid(string $email): bool
    {
        return preg_match('/^[\w\.-]+@[\w\.-]+\.\w+$/', $email);
    }

    private function usernameAlreadyTaken(string $username): User|null
    {
        return User::where('username', $username)->first();
    }

    private function emailAlreadyTaken(string $email): User|null
    {
        return User::where('email', $email)->first();
    }
}
