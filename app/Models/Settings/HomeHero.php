<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeHero extends Setting implements HasMedia
{
    /** @use HasFactory<\Database\Factories\Settings\HomeHeroFactory> */
    use HasFactory;

    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('pixellated')
            ->performOnCollections('image')
            ->withResponsiveImages()
            ->pixelate(3)
            ->nonQueued();
    }

    public function value(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getFirstMedia('image'),
        );
    }
}
