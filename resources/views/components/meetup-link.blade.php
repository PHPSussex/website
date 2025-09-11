@props(['eventId' => null])
@use(Illuminate\Support\Str)
@use(Illuminate\Support\Stringable)
@php
$href = Str::of('https://www.meetup.com/php-sussex/')
    ->when($eventId, fn (Stringable $s) => $s->append("events/$eventId/"));
@endphp
<a
    data-event="meetup event click"
    href="{{ $href }}"
    @class([
        'text-center',
        'mt-4 text-xl block sm:inline-block text-white dark:text-black bg-primary-600 hover:bg-primary-500 dark:bg-primary-500 dark:hover:bg-primary-400',
        'text-mono-900 pl-6 pr-8 py-2 rounded-sm focus-visible:bg-accent-500',
        'focus-visible:outline-none',
        'active:scale-95 whitespace-nowrap',
    ])
>
    <x-icon.meetup class="-translate-x-1 w-8 h-8 inline-block" />
    <span class="inline-block translate-y-[1px]">
        {{ $eventId ? 'Sign up' : 'Join us' }} <span class="hidden sm:inline">on Meetup</span></span>
</a>
