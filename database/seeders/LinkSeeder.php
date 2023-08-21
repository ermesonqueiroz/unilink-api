<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        Link::factory()->create([
            'user_id' => 11
        ]);
    }
}
