<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Spatie\Export\Exporter;
use Symfony\Component\Finder\SplFileInfo;

use function App\slidesUrl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected function addExportPaths(): void
    {
        $exporter = $this->app->make(Exporter::class);
        $dir = resource_path('views/pages/slides');

        if (! File::isDirectory($dir)) {
            return;
        }

        $decks = Collection::make(File::allFiles($dir))
            ->filter(function ($file) {
                if ($file->getFileName() === 'example.blade.php') {
                    return false;
                }

                return Str::of($file->getFilename())->endsWith('.blade.php');
            });

        $exporter->paths($decks->map(function (SplFileInfo $file) {
            $relativeUrl = Str::of($file->getRealPath())
                ->after(resource_path('views/pages/slides'))
                ->rtrim('.blade.php');

            // Ideally we'd use route() but the routes
            // are not registered at this point.
            return slidesUrl($relativeUrl);
        })->toArray());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->addExportPaths();
        }
    }
}
