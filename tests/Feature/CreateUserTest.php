<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_creates_a_new_user(): void
    {
        $response = $this->post('/api/users', [
            'username' => fake()->unique()->userName(),
            'display_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password'
        ]);

        $response->assertCreated();
    }

    /** @test */
    public function it_fails_with_invalid_username_exception(): void
    {
        $response = $this->post('/api/users', [
            'username' => 'Invalid Username',
            'display_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password'
        ]);

        $response->assertBadRequest();
    }

    /** @test */
    public function it_fails_with_invalid_email_exception(): void
    {
        $response = $this->post('/api/users', [
            'username' => fake()->unique()->userName(),
            'display_name' => fake()->name(),
            'email' => 'Invalid email',
            'password' => 'password'
        ]);

        $response->assertBadRequest();
    }

    /** @test */
    public function it_fails_with_invalid_username_already_taken_exception(): void
    {
        User::factory()->create([
            'username' => 'same_username'
        ]);

        $response = $this->post('/api/users', [
            'username' => 'same_username',
            'display_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password'
        ]);

        $response->assertBadRequest();
    }

    /** @test */
    public function it_fails_with_invalid_email_already_taken_exception(): void
    {
        User::factory()->create([
            'email' => 'same.email@example.com'
        ]);

        $response = $this->post('/api/users', [
            'username' => fake()->unique()->userName(),
            'display_name' => fake()->name(),
            'email' => 'same.email@example.com',
            'password' => 'password'
        ]);

        $response->assertBadRequest();
    }
}
