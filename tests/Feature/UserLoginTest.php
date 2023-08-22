<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_returns_auth_token(): void
    {
        User::factory()->create([
            'email' => 'email@example.com',
            'password' => 'password'
        ]);

        $response = $this->post('/api/auth/login', [
            'email' => 'email@example.com',
            'password' => 'password'
        ]);

        $response->assertCreated();
    }

    /** @test */
    public function it_fails_with_invalid_credentials_exception(): void
    {
        User::factory()->create([
            'email' => 'email@example.com',
            'password' => 'password'
        ]);

        $response = $this->post('/api/auth/login', [
            'email' => 'incorrect@example.com',
            'password' => 'incorrect_password'
        ]);

        $response->assertUnauthorized();
    }
}
