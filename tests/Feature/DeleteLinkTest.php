<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteLinkTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_deletes_a_link(): void
    {
        $user = User::factory()->create();
        $link = $user->links()->create([
            'title' => fake()->title(),
            'url' => fake()->url()
        ]);

        $response = $this->actingAs($user)->delete("/api/links/$link->id");

        $response->assertOk();
        $this->assertNull(Link::find($link->id));
    }
}
