<?php

namespace Tests\Feature\Views\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MeetupLinkTest extends TestCase
{
    #[Test]
    public function it_shows_group_link_when_no_event(): void
    {
        $view = $this->blade('<x-meetup-link />');
        $view->assertSeeText('Join us on Meetup');
        $view->assertSee('href="https://www.meetup.com/php-sussex/"', escape: false);
        $view->assertSee('data-event="meetup group click"', escape: false);
    }

    #[Test]
    public function it_shows_event_link(): void
    {
        $view = $this->blade('<x-meetup-link event-id="abc123" />');
        $view->assertSeeText('Sign up on Meetup');
        $view->assertSee('href="https://www.meetup.com/php-sussex/events/abc123/', escape: false);
        $view->assertSee('data-event="meetup event click"', escape: false);
    }
}
