<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /** @test */
    public function test_example(): void
    {
        User::factory()->create([
            'email' => 'email@example.com',
            'password' => 'password'
        ]);

        $response = $this->post('/api/auth', [
            'email' => 'email@example.com',
            'password' => 'password'
        ]);

        $response->assertCreated();
    }
}
