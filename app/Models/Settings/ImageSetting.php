<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ImageSetting extends Setting implements HasMedia
{
    use InteractsWithMedia;

    public static string $collection = 'image';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::$collection)
            ->withResponsiveImages()
            ->singleFile();
    }

    public function value(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getFirstMedia('image'),
        );
    }
}
