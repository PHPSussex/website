@use(function App\setting)
@use(function App\theme)
<?php
    use function Laravel\Folio\name;
    name('home');
?>
@php
    $home = route('home', absolute: false);
    $links = [
        'Events' => $home.'#next-event',
        'Socials' => $home.'#socials',
    ];
@endphp

<x-layout.html>
    <div>
        <header @class([
            'border-b divide-y relative grid grid-cols-12', theme('border', 'divide'),
            'grid grid-cols-12',
            'sticky z-10 top-0 bg-white dark:bg-black',
            'py-3 sm:py-4',
        ])>
            <nav @class(['px-8 flex col-start-2 md:col-start-3'])>
                <a href="{{ route('home', absolute: false) }}" class="inline-block mr-6 sm:mr-10 md:mr-12">
                    <x-logo.php-sussex class="w-10 md:w-12" />
                </a>
                <ul class="flex items-center gap-6 md:gap-10">
                    @foreach ($links as $label => $href)
                        <li>
                            <x-type
                                tag="a"
                                :href="$href"
                                variant="upper primary"
                                class="text-xs md:text-sm"
                            >{{ $label }}</x-type>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </header>

        <main id="content" @class(['divide-y', theme('divide')])>
            <x-home.hero class="col-span-12" />

            <h1 class="sr-only">PHP Sussex</h1>

            <x-layout.grid-section>
                <x-type tag="p" variant="display headline" class="mb-3">PHP Sussex is a free, open to all meetup, based in Brighton UK.</x-type>
                <div class="space-y-3">
                    <x-type.para variant="dim">We're a community of folks who <x-type.emoji text="love" icon="heart" /> working with the web and
                        getting <x-type.emoji text="sh*t" icon="poo" /> done fast using PHP based applications.
                    </x-type.para>

                    <x-type.para variant="dim">We meet every couple of months to socialise and share ideas
                    over drinks, pizza and presentations by some awesome speakers from the PHP commmunity.</x-type.para>
                </div>
            </x-layout.grid-section>

            <x-layout.grid-divider />

            <x-layout.grid-section heading="Next Event">
                <x-type.para>
                    Happy New Year! We're planning the first meetup in 2026 for February.
                    Join our Meetup group for announcements.
                </x-type.para>
                <x-meetup-link />
            </x-layout.grid-section>

            <x-layout.grid-divider />

            <x-layout.grid-section heading="Socials">
                <x-socials class="mt-6 -mx-6 md:-mx-8 -mb-6 md:-mb-8" />
            </x-layout.grid-section>

            <x-layout.grid-divider />

            <x-layout.grid-section heading="Organisers">
                <x-type.para class="mb-6">Need to know where the toilets are or which pizza is veggie, vegan&nbsp;/&nbsp;<span class="text-nowrap">gluten-free</span>?</x-type.para>
                <div @class([
                    '-mx-6 md:-mx-8 -mb-6 md:-mb-8 grid grid-cols-1 sm:grid-cols-2',
                    'sm:divide-x divide-y sm:divide-y-0 border-t',
                    theme('border', 'divide')
                ])>
                    <x-home.organizer
                        class="py-6 md:py-8"
                        name="Yannick"
                        :img="setting('portrait-yannick')"
                        pronounced="Yan-eek"
                        linkedin="https://linkedin.com/in/yannickchenot"
                    />
                    <x-home.organizer
                        class="py-6 md:py-8"
                        name="Joby"
                        :img="setting('portrait-joby')"
                        pronounced="Joe-bee"
                        linkedin="https://linkedin.com/in/jobyharding"
                    />
                </div>
            </x-layout.grid-section>

            <x-layout.grid-divider />

            <x-layout.grid-section heading="Speak">
                <x-type.para variant="dim">Want to speak at PHP Sussex? Amazing!  We'd love to hear from you.
                Complete the form below and we'll get back to you.</x-type.para>
                <div
                    role="note"
                    @class([
                        'flex items-start gap-2 bg-primary-500/20 p-2 mt-4',
                        'border-l-4 border-primary-500 rounded-sm'
                    ])
                >
                    <x-type variant="primary">
                        <x-icon.info class="w-5 h-5 flex-shrink-0 text-primary-500" />
                    </x-type>
                    <x-type class="text-sm">The speaker form link will take you to Google&nbsp;Forms</x-type>
                </div>
                <a
                    data-event="speaker form click"
                    href="https://forms.gle/tHe66kBsgFbnM5ZW7"
                    class="mt-4 text-2xl inline-block link link-focus"
                >Speaker form</a>
            </x-layout.grid-section>

            <x-layout.grid-divider />

            <x-layout.grid-section heading="Sponsors &amp; Support">
                <x-type.para variant="dim" class="mb-8">We couldn't do it on our own. Massive thanks to our amazing friends:</x-type.para>
                <div class="flex flex-row flex-wrap gap-10 justify-between">
                    <x-sponsor
                        name="Silicon Brighton"
                        provides="Support & AV"
                        url="https://siliconbrighton.com"
                    />
                    <x-sponsor
                        name="Runway East"
                        provides="Venue"
                        url="https://runwayea.st"
                    />
                    <x-sponsor name="Tillo" provides="Pizza & Drinks" url="https://tillo.com" />
                </div>
            </x-layout.grid-section>

            <x-layout.grid-divider />
        </main>

        <x-layout.footer />
    </div>
</x-layout.html>
