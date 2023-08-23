<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateAppearanceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test  */
    public function it_updates_a_appearance(): void
    {
        $user = User::factory()->create();
        $user->appearance()->create([
            'text_color' => '#000',
            'background_color' => '#f1f2f6',
            'button_color' => '#fff',
            'button_text_color' => '#000'
        ]);

        $response = $this->actingAs($user)->patch('/api/appearances', [
            'text_color' => '#fff'
        ]);

        $response->assertOk();
        $this->assertEquals('#fff', $user->appearance()->first()->text_color);
    }
}
