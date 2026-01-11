<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SlidesListingCommandTest extends TestCase
{
    protected string $outputPath;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');
        $this->outputPath = Storage::disk('local')->path('slides-listing.html');

        $this->app->when(\App\Console\Commands\SlidesListingCommand::class)
            ->needs(\Illuminate\Contracts\Filesystem\Filesystem::class)
            ->give(fn () => Storage::disk('local'));
    }

    #[Test]
    public function it_generates_slides_listing_html_file(): void
    {
        $this->artisan('app:slides-listing')
            ->expectsOutput('Slides listing generated successfully at: '.$this->outputPath)
            ->assertSuccessful();

        $this->assertFileExists($this->outputPath);
    }

    #[Test]
    public function it_fails_if_file_already_exists(): void
    {
        Storage::disk('local')->put('slides-listing.html', 'existing content');

        $this->artisan('app:slides-listing')
            ->expectsOutput('Slides listing file already exists. Use --force to overwrite.')
            ->assertFailed();
    }

    #[Test]
    public function it_overwrites_file_with_force_option(): void
    {
        Storage::disk('local')->put('slides-listing.html', 'existing content');

        $this->artisan('app:slides-listing', ['--force' => true])
            ->expectsOutput('Slides listing generated successfully at: '.$this->outputPath)
            ->assertSuccessful();

        $content = Storage::disk('local')->get('slides-listing.html');

        $this->assertStringContainsString('<!DOCTYPE html>', $content);
        $this->assertStringNotContainsString('existing content', $content);
    }

    #[Test]
    public function it_contains_links_to_all_slide_routes(): void
    {
        $this->artisan('app:slides-listing')
            ->assertSuccessful();

        $content = Storage::disk('local')->get('slides-listing.html');

        $this->assertStringContainsString('<a href="/slides/example">Example</a>', $content);
        $this->assertStringContainsString('<a href="/slides/2026-02">2026 02</a>', $content);
    }

    #[Test]
    public function it_generates_valid_html_structure(): void
    {
        $this->artisan('app:slides-listing')
            ->assertSuccessful();

        $content = Storage::disk('local')->get('slides-listing.html');

        $this->assertStringContainsString('<!DOCTYPE html>', $content);
        $this->assertStringContainsString('<html lang="en">', $content);
        $this->assertStringContainsString('<title>Slideshows</title>', $content);
        $this->assertStringContainsString('<h1>Slideshows</h1>', $content);
        $this->assertStringContainsString('<ul>', $content);
        $this->assertStringContainsString('</ul>', $content);
        $this->assertStringContainsString('</html>', $content);
    }

    #[Test]
    public function it_displays_count_of_slideshows_found(): void
    {
        $this->artisan('app:slides-listing')
            ->expectsOutputToContain('Found 2 slideshow(s).')
            ->assertSuccessful();
    }

    #[Test]
    public function it_sorts_slides_alphabetically(): void
    {
        $this->artisan('app:slides-listing')
            ->assertSuccessful();

        $content = Storage::disk('local')->get('slides-listing.html');

        $examplePos = strpos($content, 'href="/slides/2026-02"');
        $feb2026Pos = strpos($content, 'href="/slides/example"');

        $this->assertTrue($examplePos < $feb2026Pos, 'Slides should be sorted alphabetically');
    }

    #[Test]
    public function it_escapes_html_in_output(): void
    {
        $this->artisan('app:slides-listing')
            ->assertSuccessful();

        $content = Storage::disk('local')->get('slides-listing.html');

        $this->assertStringContainsString('href=', $content);
        $this->assertStringNotContainsString('<script>', strtolower($content));
    }
}
