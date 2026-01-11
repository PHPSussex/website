<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
    public function handle(): int
    {
        $output = Storage::disk('local')->path('slides-listing.html');

        if (File::exists($output) && ! $this->option('force')) {
            $this->error('Slides listing file already exists. Use --force to overwrite.');

            return self::FAILURE;
        }

        $routes = $this->getSlideRoutes();

        if ($routes->isEmpty()) {
            $this->error('No slide routes found.');

            return self::FAILURE;
        }

        $slides = $this->slides($routes);

        File::put($output, $this->generateHtml($slides));

        $this->info('Slides listing generated successfully at: '.$output);
        $this->info('Found '.count($slides).' slideshow(s).');

        return self::SUCCESS;
    }

    /**
     * Get all registered slide routes.
     */
    protected function getSlideRoutes(): \Illuminate\Support\Collection
    {
        return collect(Route::getRoutes())
            ->filter(fn ($route) => Str::startsWith($route->uri(), 'slides/'))
            ->filter(fn ($route) => in_array('GET', $route->methods()))
            ->values();
    }

    /**
     * Transform routes into slide data.
     */
    protected function slides(\Illuminate\Support\Collection $routes): \Illuminate\Support\Collection
    {
        return $routes
            ->map(function ($route) {
                $uri = $route->uri();
                $filename = Str::after($uri, 'slides/');
                $title = Str::title(str_replace(['-', '_'], ' ', $filename));

                return [
                    'route' => '/'.$uri,
                    'title' => $title,
                    'filename' => $filename,
                ];
            })
            ->sortBy('filename')
            ->values();
    }

    /**
     * Generate the HTML content for the slides listing.
     */
    protected function generateHtml(\Illuminate\Support\Collection $slides): string
    {
        $items = $slides->map(function ($slide) {
            return sprintf(
                '        <li><a href="%s">%s</a></li>',
                htmlspecialchars($slide['route']),
                htmlspecialchars($slide['title'])
            );
        })->implode("\n");

        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Slideshows</title>
            <style>
                body {
                    font-family: system-ui, -apple-system, sans-serif;
                    max-width: 800px;
                    margin: 40px auto;
                    padding: 0 20px;
                    line-height: 1.6;
                }
                h1 {
                    color: #333;
                    border-bottom: 2px solid #eee;
                    padding-bottom: 10px;
                }
                ul {
                    list-style: none;
                    padding: 0;
                }
                li {
                    margin: 10px 0;
                    padding: 15px;
                    background: #f9f9f9;
                    border-radius: 5px;
                    transition: background 0.2s;
                }
                li:hover {
                    background: #f0f0f0;
                }
                a {
                    color: #0066cc;
                    text-decoration: none;
                    font-size: 1.1em;
                }
                a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <h1>Slideshows</h1>
            <ul>
        {$items}
            </ul>
        </body>
        </html>
        HTML;
    }
}
