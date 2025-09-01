@use(App\Enums\Socials)
<ul {{ $attributes->class('grid grid-cols-2 sm:grid-cols-3') }}>
    @foreach (Socials::cases() as $social)
        <li @class([
            'relative group',
            'border-t border-r border-mono-800',
        ])>
            <a
                href="{{ $social->url() }}"
                @class([
                    'group flex items-center justify-center',
                    'p-2 py-4 md:py-6 lg:py-8 bg-gray-950/0 hover:bg-mono-900',
                    'focus-visible:outline-none focus-visible:bg-amber-500',
                    'focus-visible:text-mono-950',
                ])
            >
                <div class="translate-y-2 flex flex-col items-center gap-1">
                    <x-dynamic-component :component="$social->icon()" class="w-12 h-12" />
                    <x-type variant="dim" @class([
                        'text-sm group-focus-visible:text-mono-950',
                    ])>{{ $social->label() }}</x-type>
                </div>
            </a>
        </li>
    @endforeach
    <span class="border-t lg:border-r border-mono-800"></span>
</ul>
