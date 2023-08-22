<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateLinkTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_updates_a_link(): void
    {
        $user = User::factory()->create();

        $link = $user->links()->create([
            'title' => fake()->title,
            'url' => fake()->url(),
            'active' => true,
            'next_link_id' => null
        ]);

        $newData = [
            'title' => fake()->title(),
            'url' => fake()->url()
        ];

        $response = $this->actingAs($user)->patch("/api/links/$link->id", $newData);
        $updatedLink = Link::find($link->id);

        $response->assertOk();
        $this->assertEquals($newData['title'], $updatedLink->title);
        $this->assertEquals($newData['url'], $updatedLink->url);
    }

    /** @test */
    public function it_updates_active_status_from_a_link(): void
    {
        $user = User::factory()->create();
        $link = $user->links()->create([
            'title' => fake()->title,
            'url' => fake()->url(),
            'active' => true,
            'next_link_id' => null
        ]);

        $response = $this->actingAs($user)->patch("/api/links/$link->id", [
            'active' => false
        ]);
        $updatedLink = Link::find($link->id);

        $response->assertOk();
        $this->assertEquals(false, $updatedLink->active);
    }

    /** @test */
    public function it_updates_next_link_id_from_a_link(): void
    {
        $user = User::factory()->create();

        $link = $user->links()->create([
            'title' => fake()->title,
            'url' => fake()->url(),
            'active' => true,
            'next_link_id' => null
        ]);

        $nextLink = $user->links()->create([
            'title' => fake()->title,
            'url' => fake()->url(),
            'active' => true,
            'next_link_id' => null
        ]);

        $response = $this->actingAs($user)->patch("/api/links/$link->id", [
            'next_link_id' => $nextLink->id
        ]);
        $updatedLink = Link::find($link->id);

        $response->assertOk();
        $this->assertEquals($updatedLink->next_link_id, $nextLink->id);
    }
}
