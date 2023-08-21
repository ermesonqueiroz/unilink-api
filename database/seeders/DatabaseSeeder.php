<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            AppearanceSeeder::class,
            UserSeeder::class,
            LinkSeeder::class
        ]);
    }
}
