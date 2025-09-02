<?php

namespace Database\Seeders;

use App\Models\Settings\HomeHero;
use App\Models\Settings\PortraitYannick;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Settings\ImageSetting;
use App\Models\Settings\PortraitJoby;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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
