<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                //
            ],
        ]);

        // Configure slides with optional URL prefix
        $prefix = config('slides.prefix', '');
        $uri = $prefix ? '/'.trim($prefix, '/').'/slides' : '/slides';

        Folio::path(resource_path('views/pages/slides'))->uri($uri);
    }
}
