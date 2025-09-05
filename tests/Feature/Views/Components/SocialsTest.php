<?php

namespace Tests\Feature\Views\Components;

use App\Enums\Socials;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SocialsTest extends TestCase
{
    #[Test]
    public function it_includes_fathom_event_data(): void
    {
        $view = $this->blade('<x-socials />');

        Collection::make(Socials::cases())->each(function (Socials $social) use ($view) {
            $view->assertSee('data-event="'.$social->fathomEvent('click').'"', escape: false);
        });
    }
}
