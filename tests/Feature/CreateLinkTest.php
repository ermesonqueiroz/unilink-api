<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CreateLinkTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_creates_a_new_link(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/links', [
            'title' => fake()->title(),
            'url' => fake()->url(),
            'active' => true,
            'next_link_id' => null
        ]);

        $response->assertCreated();
        $this->assertTrue($user->links()->count() > 0);
    }

    /** @test */
    public function it_fails_with_invalid_url_exception(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/links', [
            'title' => fake()->title(),
            'url' => 'invalid_url',
            'active' => true,
            'next_link_id' => null
        ]);

        $response->assertBadRequest();
        $this->assertTrue($user->links()->count() == 0);
    }
}
