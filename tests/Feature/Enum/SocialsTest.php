<?php

namespace Tests\Feature\Enum;

use App\Enums\Socials;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SocialsTest extends TestCase
{
    #[Test]
    public function it_formats_fathom_event(): void
    {
        // Intentionally non-exhaustive.
        $this->assertSame('social mastodon click', Socials::Mastodon->fathomEvent('click'));
        $this->assertSame('social bluesky click', Socials::Bluesky->fathomEvent('click'));
    }
}
