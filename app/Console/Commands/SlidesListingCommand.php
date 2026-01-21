<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SlidesListingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:slides-listing {--force : Overwrite existing file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an HTML listing of slideshows';

    /**
     * Execute the console command.
     */
    public function handle(Filesystem $disk): int
    {
        $name = 'slides-listing.html';

        if ($disk->exists($name) && ! $this->option('force')) {
            $this->error('Slides listing file already exists. Use --force to overwrite.');

            return self::FAILURE;
        }

        $slides = $this->discoverSlides();

        if ($slides->isEmpty()) {
            $this->error('No slide views found.');

            return self::FAILURE;
        }

        $disk->put($name, $this->html($slides));

        $this->info('Slides listing generated successfully at: '.$disk->path($name));
        $this->info('Found '.count($slides).' slideshow(s).');

        return self::SUCCESS;
    }

    /**
     * Discover all slide views from the filesystem.
     */
    protected function discoverSlides(): Collection
    {
        $viewsPath = resource_path('views/pages/slides');

        if (! File::isDirectory($viewsPath)) {
            return Collection::make();
        }

        $prefix = Config::get('slides.prefix', '');
        $baseUri = $prefix ? trim($prefix, '/').'/slides' : 'slides';

        return Collection::make(File::files($viewsPath))
            ->filter(fn ($file) => Str::endsWith($file->getFilename(), '.blade.php'))
            ->map(function ($file) use ($baseUri) {
                $filename = Str::before($file->getFilename(), '.blade.php');
                $title = Str::title(str_replace(['-', '_'], ' ', $filename));

                return [
                    'route' => "/{$baseUri}/{$filename}",
                    'title' => $title,
                    'filename' => $filename,
                ];
            })
            ->sortBy('filename')
            ->values();
    }

    protected function html(Collection $slides): string
    {
        return view('slides-listing', ['slides' => $slides])->render();
    }
}
