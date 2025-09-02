<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Settings\HomeHero;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Settings\ImageSetting;
use App\Models\Settings\PortraitJoby;
use App\Models\Settings\PortraitYannick;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HomeHero::firstOrCreate()
            ->addMedia(resource_path('images/hero.jpg'))
            ->preservingOriginal()
            ->toMediaCollection(ImageSetting::$collection);

        PortraitYannick::firstOrCreate()
            ->addMedia(resource_path('images/yannick.jpg'))
            ->preservingOriginal()
            ->toMediaCollection(ImageSetting::$collection);

        PortraitJoby::firstOrCreate()
            ->addMedia(resource_path('images/joby.jpg'))
            ->preservingOriginal()
            ->toMediaCollection(ImageSetting::$collection);
    }
}
