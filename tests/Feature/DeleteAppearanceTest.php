<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteAppearanceTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test  */
    public function it_deletes_user_appearance(): void
    {
        $user = User::factory()->create();
        $user->appearance()->create([
            'text_color' => '#000',
            'background_color' => '#f1f2f6',
            'button_color' => '#fff',
            'button_text_color' => '#000'
        ]);

        $response = $this->actingAs($user)->delete('/api/appearances');

        $response->assertOk();
        $this->assertNull($user->appearance()->first());
    }
}
