<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppearanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'text_color' => '#000',
            'background_color' => '#f1f2f6',
            'button_color' => '#fff',
            'button_text_color' => '#000'
        ];
    }
}
