<?php

namespace Tests\Feature\Views\Components\Layout;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GridSectionTest extends TestCase
{
    #[Test]
    public function it_generates_id_from_heading(): void
    {
        $view = $this->blade('<x-layout.grid-section heading="About Us" />');

        $view->assertSee('id="about-us"', escape: false);
    }

    #[Test]
    public function it_strips_ampersand_entity(): void
    {
        $view = $this->blade('<x-layout.grid-section heading="About &amp; Contact" />');

        $view->assertSee('id="about-contact"', escape: false);
    }

    #[Test]
    public function test_no_id_when_no_heading(): void
    {
        $view = $this->blade('<x-layout.grid-section />');

        $view->assertDontSee('id=', escape: false);
    }
}
