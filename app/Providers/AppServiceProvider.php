<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('youtube', function () {
            return $this
                ->baseUrl('https://www.googleapis.com/youtube/v3')
                ->withQueryParameters([
                    'key' => Config::get('services.youtube.api_key'),
                ]);
        });
    }
}
