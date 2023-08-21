<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'Google',
            'url' => 'https://google.com',
            'active' => true,
            'next_link_id' => null
        ];
    }
}
