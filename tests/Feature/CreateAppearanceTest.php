<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAppearanceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_creates_a_new_appearance(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/appearances', [
            'text_color' => '#000',
            'background_color' => '#f1f2f6',
            'button_color' => '#fff',
            'button_text_color' => '#000'
        ]);

        $response->assertCreated();
        $this->assertTrue($user->appearance()->count() > 0);
    }
}
