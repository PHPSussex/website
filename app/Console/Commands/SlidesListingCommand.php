<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
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
        $outputPath = Storage::disk('local')->path('slides-listing.html');

        if (File::exists($outputPath) && ! $this->option('force')) {
            $this->error('Slides listing file already exists. Use --force to overwrite.');

            return self::FAILURE;
        }

        $slidesPath = resource_path('views/pages/slides');

        if (! File::isDirectory($slidesPath)) {
            $this->error('Slides directory not found: '.$slidesPath);

            return self::FAILURE;
        }

        $slideFiles = File::glob($slidesPath.'/*.blade.php');

        if (empty($slideFiles)) {
            $this->error('No slide files found in: '.$slidesPath);

            return self::FAILURE;
        }

        $slides = collect($slideFiles)
            ->map(function ($file) {
                $filename = basename($file, '.blade.php');
                $route = '/slides/'.$filename;
                $title = Str::title(str_replace(['-', '_'], ' ', $filename));

                return [
                    'route' => $route,
                    'title' => $title,
                    'filename' => $filename,
                ];
            })
            ->sortBy('filename')
            ->values();

        $html = $this->generateHtml($slides);

        File::put($outputPath, $html);

        $this->info('Slides listing generated successfully at: '.$outputPath);
        $this->info('Found '.count($slides).' slideshow(s).');

        return self::SUCCESS;
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
