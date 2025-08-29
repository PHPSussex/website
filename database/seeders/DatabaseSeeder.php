<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Settings\HomeHero;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! HomeHero::first()) {
            $hero = HomeHero::create();
            $hero
                ->addMedia(resource_path('images/hero.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('image');
        }
    }
}
