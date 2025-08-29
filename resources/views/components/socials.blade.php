@use(App\Enums\Socials)
<ul {{ $attributes->class('flex gap-4') }}>
    @foreach (Socials::cases() as $social)
        <li>
            <a
                href="{{ $social->url() }}"
                @class([
                    'inline-block rounded-xl p-2 bg-gray-950/0 hover:bg-gray-950/50',
                    'focus-visible:outline-none focus-visible:bg-amber-500 focus-visible:text-mono-950'
                ])
            >
                <x-dynamic-component :component="$social->icon()" class="w-10 h-10" />
            </a>
        </li>
    @endforeach
</ul>
