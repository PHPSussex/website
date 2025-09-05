<?php
    use function App\setting;
?>
<x-layout.html>
    <header class="border-b border-gray-800 divide-y divide-gray-800">
        <div class="md:hidden">
            <x-layout.grid-section>
                <x-logo.php-sussex class="w-18" />
            </x-layout.grid-section>
        </div>
        <x-layout.grid-section :no-padding="true" :collapse="true">
            <x-slot:pre class="flex flex-col">
                <div class="grow flex justify-center items-center">
                    <x-logo.php-sussex class="hidden md:block w-20 2xl:w-24" />
                </div>
            </x-slot:pre>
            <x-home.hero />
        </x-layout.grid-section>
    </header>

    <main id="content" class="divide-y divide-gray-800">

        <h1 class="sr-only">PHP Sussex</h1>

        <x-layout.grid-section heading="About us">
            <x-type tag="p" variant="display headline" class="mb-3">PHP Sussex is a free, open to all meetup, based in Brighton UK.</x-type>
            <div class="space-y-3">
                <x-type.para class="text-mono-400">We're a community of folks who <x-type.emoji text="love" icon="heart" /> working with the web and
                    getting <x-type.emoji text="sh*t" icon="poo" /> done fast using PHP based applications.
                </x-type.para>

                <x-type.para>We meet every couple of months to socialise and share ideas
                over drinks, pizza and presentations by some awesome speakers from the PHP commmunity.</x-type.para>
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Next Event">
            <div class="-rotate-2 inline-block bg-mono-300 text-mono-900 px-6 py-3 -mt-1 -ml-8 mb-6 space-y-1">
                <x-type tag="p" variant="display headline">Encoding Explained &amp; <span class="text-nowrap">Debugging Self-Doubt</span></x-type>
                <x-type tag="p" variant="upper" class="mb-3 md:font-extrabold !md:text-lg">
                    <time> Wed 10th September 2025 Doors 6:30pm</time>, Runway East nr. Preston Circus, Brighton
                </x-type>
            </div>
            <x-type.para>A big juicy IRL talk + lightning talk combo not to be missed. Featuring Laravel scene regular Dan Johnson of TRYBE and Adria Figueres Garcia of Hove-based startup and PHP Sussex sponsor, Tillo.</x-type.para>
            <x-type.para>Afterwards we'll head to <a class="link link-focus" href="https://www.unbarredbrewery.com/pages/taproom">UnBarred taproom</a>, 2 minutes from our venue, for good vibes and a craft beer / soft-drink or two to wrap the night up.</x-type.para>
            <a
                href="https://www.meetup.com/php-sussex/events/308915820/"
                @class([
                'text-center',
                'mt-4 text-xl block sm:inline-block bg-primary-500 hover:bg-primary-400',
                'text-mono-900 pl-6 pr-8 py-2 rounded-sm focus-visible:bg-accent-500',
                'focus-visible:outline-none',
                'active:scale-95 whitespace-nowrap',
            ])>
                <x-icon.meetup class="-translate-x-1 w-8 h-8 inline-block" />
                <span class="inline-block translate-y-[1px]">
                    Sign up <span class="hidden sm:inline">on Meetup</span>
                </span>
            </a>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Socials">
            <x-socials class="mt-6 -mx-6 md:-mx-8 -mb-6 md:-mb-8" />
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Organisers">
            <x-type.para class="mb-6">Need to know where the toilets are or which pizza is veggie, vegan&nbsp;/&nbsp;<span class="text-nowrap">gluten-free</span>?</x-type.para>
            <div @class([
                '-mx-6 md:-mx-8 -mb-6 sm:-mb-8 grid grid-cols-1 sm:grid-cols-2',
                'sm:divide-x divide-y sm:divide-y-0 divide-gray-800 border-t border-gray-800',
            ])>
                <x-home.organizer
                    class="py-6"
                    name="Yannick"
                    :img="setting('portrait-yannick')"
                    pronounced="Yan-eek"
                    linkedin="https://linkedin.com/in/yannickchenot"
                />
                <x-home.organizer
                    class="py-6"
                    name="Joby"
                    :img="setting('portrait-joby')"
                    pronounced="Joe-bee"
                    linkedin="https://linkedin.com/in/jobyharding"
                />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Speak">
            <x-type.para>Want to speak at PHP Sussex? Amazing!  We'd love to hear from you.
            Complete the form below and we'll get back to you.</x-type.para>
            <div
                role="note"
                @class([
                    'flex items-start gap-2 bg-primary-500/20 p-2 mt-4',
                    'border-l-4 border-primary-500'
                ])
            >
                <x-icon.info class="w-5 h-5 flex-shrink-0 text-primary-500" />
                <p class="text-sm text-mono-300">Please note the speaker form link will take you to Google&nbsp;Forms</p>
            </div>
            <a href="https://forms.gle/tHe66kBsgFbnM5ZW7" class="mt-4 text-2xl inline-block link link-focus">Speaker form</a>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Sponsors &amp; Support">
            <x-type.para class="mb-8">We couldn't do it on our own. Massive thanks to our amazing friends:</x-type.para>
            <div class="flex flex-row flex-wrap gap-10 justify-between">
                <x-sponsor
                    name="Silicon Brighton"
                    provides="Support & AV"
                    url="https://siliconbrighton.com"
                    logo-class="scale-115 translate-x-[1rem]"
                />
                <x-sponsor
                    name="Runway East"
                    provides="Pizza & Venue"
                    url="https://runwayea.st"
                    logo-class="scale-105 translate-x-[0.4rem]"
                />
                <x-sponsor name="Tillo" provides="Drinks" url="https://tillo.com" />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />
    </main>

    <x-layout.footer />
</x-layout.html>
