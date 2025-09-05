@use(App\Enums\Socials)
@use(function App\theme)
<ul {{ $attributes->class('grid grid-cols-2 sm:grid-cols-3') }}>
    @foreach (Socials::cases() as $social)
        <li @class([
            'relative group',
            'border-t border-r',
            theme('border'),
            'nth-2:border-r-0 nth-4:border-r-0',
            'sm:nth-2:border-r sm:nth-4:border-r',
            'sm:nth-3:border-r-0',
        ])>
            <a
                href="{{ $social->url() }}"
                data-event="{{ $social->fathomEvent('click') }}"
                @class([
                    'group flex items-center justify-center',
                    'p-2 py-4 md:py-6 lg:py-8 bg-gray-950/0 hover:bg-mono-100 dark:hover:bg-mono-950',
                    'focus-visible:outline-none focus-visible:bg-amber-500',
                    'focus-visible:text-mono-950',
                    'text-mono-700 dark:text-mono-200',
                    'hover:text-mono-950 dark:hover:text-mono-50',
                ])
            >
                <div class="translate-y-2 flex flex-col items-center gap-1">
                    <x-dynamic-component :component="$social->icon()" class="w-12 h-12" />
                    <x-type variant="dim" @class([
                        'text-sm group-focus-visible:text-mono-950',
                        'group-hover:text-mono-600 dark:group-hover:text-mono-300',
                    ])>{{ $social->label() }}</x-type>
                </div>
            </a>
        </li>
    @endforeach
    <span class="border-t {{ theme('border') }}"></span>
</ul>
