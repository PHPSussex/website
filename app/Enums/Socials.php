<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum Socials: string
{
    case X = 'x';
    case BlueSky = 'blue_sky';
    case Mastodon = 'mastodon';
    case Meetup = 'meetup';
    case Slack = 'slack';

    public function icon(): string
    {
        return Str::of($this->value)->camel()->kebab()->prepend('icon.')->value();
    }

    public function label(): string
    {
        return match ($this) {
            self::X => 'X [Twitter]',
            default => Str::of($this->value)->headline()->value(),
        };
    }

    public function url(): string
    {
        return match ($this) {
            self::X => 'https://x.com/PHPSussexUG',
            self::BlueSky => 'https://bsky.app/profile/phpsussex.uk',
            self::Mastodon => 'https://phpc.social/@phpsussex',
            self::Meetup => 'https://www.meetup.com/PHP-Sussex/',
            self::Slack => 'https://join.slack.com/t/silicon-brighton/shared_invite/zt-1nv1jph77-lN8LOCaxxM80I3Z0NAn9FQ',
        };
    }
}
