<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SlidesListingCommandTest extends TestCase
{
    protected string $outputPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = Storage::disk('local')->path('slides-listing.html');

        if (File::exists($this->outputPath)) {
            File::delete($this->outputPath);
        }
    }

    protected function tearDown(): void
    {
        if (File::exists($this->outputPath)) {
            File::delete($this->outputPath);
        }

        parent::tearDown();
    }

    public function test_it_generates_slides_listing_html_file(): void
    {
        $this->artisan('app:slides-listing')
            ->expectsOutput('Slides listing generated successfully at: '.$this->outputPath)
            ->assertExitCode(0);

        $this->assertFileExists($this->outputPath);
    }

    public function test_it_fails_if_file_already_exists(): void
    {
        File::put($this->outputPath, 'existing content');

        $this->artisan('app:slides-listing')
            ->expectsOutput('Slides listing file already exists. Use --force to overwrite.')
            ->assertExitCode(1);
    }

    public function test_it_overwrites_file_with_force_option(): void
    {
        File::put($this->outputPath, 'existing content');

        $this->artisan('app:slides-listing', ['--force' => true])
            ->expectsOutput('Slides listing generated successfully at: '.$this->outputPath)
            ->assertExitCode(0);

        $content = File::get($this->outputPath);

        $this->assertStringContainsString('<!DOCTYPE html>', $content);
        $this->assertStringNotContainsString('existing content', $content);
    }

    public function test_it_contains_links_to_all_slide_files(): void
    {
        $this->artisan('app:slides-listing')
            ->assertExitCode(0);

        $content = File::get($this->outputPath);

        $this->assertStringContainsString('<a href="/slides/example">Example</a>', $content);
        $this->assertStringContainsString('<a href="/slides/2026-02">2026 02</a>', $content);
    }

    public function test_it_generates_valid_html_structure(): void
    {
        $this->artisan('app:slides-listing')
            ->assertExitCode(0);

        $content = File::get($this->outputPath);

        $this->assertStringContainsString('<!DOCTYPE html>', $content);
        $this->assertStringContainsString('<html lang="en">', $content);
        $this->assertStringContainsString('<title>Slideshows</title>', $content);
        $this->assertStringContainsString('<h1>Slideshows</h1>', $content);
        $this->assertStringContainsString('<ul>', $content);
        $this->assertStringContainsString('</ul>', $content);
        $this->assertStringContainsString('</html>', $content);
    }

    public function test_it_displays_count_of_slideshows_found(): void
    {
        $this->artisan('app:slides-listing')
            ->expectsOutputToContain('Found 2 slideshow(s).')
            ->assertExitCode(0);
    }

    public function test_it_sorts_slides_alphabetically(): void
    {
        $this->artisan('app:slides-listing')
            ->assertExitCode(0);

        $content = File::get($this->outputPath);

        $examplePos = strpos($content, 'href="/slides/2026-02"');
        $feb2026Pos = strpos($content, 'href="/slides/example"');

        $this->assertTrue($examplePos < $feb2026Pos, 'Slides should be sorted alphabetically');
    }

    public function test_it_escapes_html_in_output(): void
    {
        $this->artisan('app:slides-listing')
            ->assertExitCode(0);

        $content = File::get($this->outputPath);

        $this->assertStringContainsString('href=', $content);
        $this->assertStringNotContainsString('<script>', strtolower($content));
    }
}
