@use(App\Enums\Socials)
<ul {{ $attributes->class('flex gap-4') }}>
    @foreach (Socials::cases() as $social)
        <li>
            <a
                href="{{ $social->url() }}"
                @class([
                    'inline-block rounded-xl p-2 bg-gray-800/0 hover:bg-gray-800/100',
                ])
            >
                <x-dynamic-component :component="$social->icon()" class="w-10 h-10" />
            </a>
        </li>
    @endforeach
</ul>
