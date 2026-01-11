<?php

namespace Tests\Feature\Providers;

use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FolioServiceProviderTest extends TestCase
{
    #[Test]
    public function it_serves_slides_without_prefix_by_default(): void
    {
        $response = $this->get('/slides/example');
        $response->assertOk();
    }

    #[Test]
    #[RunInSeparateProcess]
    public function it_serves_slides_with_configured_prefix(): void
    {
        putenv('SLIDES_PREFIX=prefix');
        $this->refreshApplication();

        $response = $this->get('/prefix/slides/example');
        $response->assertOk();
    }

    #[Test]
    #[RunInSeparateProcess]
    public function it_handles_prefix_with_leading_slash(): void
    {
        putenv('SLIDES_PREFIX=/prefix');
        $this->refreshApplication();

        $response = $this->get('/prefix/slides/example');
        $response->assertOk();
    }

    #[Test]
    #[RunInSeparateProcess]
    public function it_handles_prefix_with_trailing_slash(): void
    {
        putenv('SLIDES_PREFIX=/prefix');
        $this->refreshApplication();

        $response = $this->get('/prefix/slides/example');
        $response->assertOk();
    }
}
