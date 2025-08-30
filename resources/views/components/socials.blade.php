@use(App\Enums\Socials)
<ul {{ $attributes->class('inline-flex gap-4') }}>
    @foreach (Socials::cases() as $social)
        <li>
            <a
                href="{{ $social->url() }}"
                @class([
                    'inline-block rounded-xl p-2 bg-gray-950/0 hover:bg-mono-800',
                    'focus-visible:outline-none focus-visible:bg-amber-500 focus-visible:text-mono-950'
                ])
            >
                <x-dynamic-component :component="$social->icon()" class="w-8 h-8" />
            </a>
        </li>
    @endforeach
</ul>
