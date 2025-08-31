<x-layout.html>
    <header class="border-b border-gray-800">
        <div class="flex justify-end items-center">
        </div>
        <x-layout.grid-section :no-padding="true" :post-collapse="true">
            <x-slot:pre class="flex flex-col">
                <div class="grow flex justify-center items-center">
                    <x-logo.php-sussex class="w-3/5" />
                </div>
            </x-slot:pre>
            <x-home.hero />
        </x-layout.grid-section>
    </header>

    <main id="content" class="divide-y divide-gray-800">

        <h1 class="sr-only">PHP Sussex</h1>

        <x-layout.grid-section class="p-8" heading="About us">
            <x-type tag="p" variant="display" class="mb-3">PHP Sussex is a free, open to all meetup, based in Brighton UK.</x-type>
            <div class="space-y-3">
                <x-type.para class="text-mono-400">We're a community of folks who <x-type.emoji text="love" icon="heart" /> working with the web and
                    getting <x-type.emoji text="sh*t" icon="poo" /> done, which often involves PHP (and
                    JavaScript and CSS and Tailwind and TypeScript and NodeJS and React and Vue and Python and&hellip;).
                </x-type.para>

                <x-type.para>We meet up every couple of months to socialise, share knowledge and get to know each other
                over drinks, pizza and presentations from some awesome speakers from the PHP commmunity.</x-type.para>
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Next Event">
            <div class="inline-block bg-mono-300 text-mono-900 px-4 py-3 -ml-4 mb-3">
                <x-type tag="p" variant="display">Encoding Explained &amp; Debugging Self-Doubt</x-type>
                <x-type tag="p" variant="upper" class="mb-3 font-extrabold !text-lg">
                    <time>10th September 2025 Doors 6:30pm</time>, Runway East nr. Preston Circus, Brighton
                </x-type>
            </div>
            <x-type.para>A big juicy IRL double-whammy not to be missed.</x-type.para>
            <x-type.para>Afterwards we'll head to <a class="link link-focus" href="https://www.unbarredbrewery.com/pages/taproom">UnBarred taproom</a>, 2 minutes from our venue, for good vibes and a craft beer / soft-drink or two to wrap the night up.</x-type.para>
            <a href="https://www.meetup.com/php-sussex/" class="mt-4 text-2xl inline-block link link-focus">Sign up on Meetup</a>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Socials">
            <x-socials class="-ml-3" />
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Organisers">
            <x-type.para class="mb-10">Need to know where the toilets are or which pizza is veggie, vegan&nbsp;/&nbsp;<span class="text-nowrap">gluten-free</span>?</x-type.para>
            <div class="flex gap-36 pb-4">
                <x-home.organizer
                    name="Yannick"
                    :img="Vite::asset('resources/images/yannick.jpg')"
                    pronounced="Yan-eek"
                    linkedin="https://linkedin.com/in/yannickchenot"
                />
                <x-home.organizer
                    name="Joby"
                    :img="Vite::asset('resources/images/joby.jpg')"
                    pronounced="Joe-bee"
                    linkedin="https://linkedin.com/in/jobyharding"
                />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Speak">
            <x-type.para>Want to speak at PHP Sussex? Amazing!  We'd love to hear from you.
            Complete the form below and we'll get back to you.</x-type.para>
            <a href="https://forms.gle/tHe66kBsgFbnM5ZW7" class="mt-4 text-2xl inline-block link link-focus">Speaker form</a>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Sponsors &amp; Support">
            <x-type.para class="mb-8">We couldn't do it on our own. Massive thanks to our amazing friends:</x-type.para>
            <div class="text-mono-700 flex gap-20">
                <x-sponsor name="Tillo" provides="Drinks" url="https://tillo.com" />
                <x-sponsor name="Runway East" provides="Pizza & Venue" url="https://runwayea.st" />
                <x-sponsor name="Silicon Brighton" provides="Support & AV" url="https://siliconbrighton.com" />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />
    </main>

    <x-layout.grid-section tag="footer" class="border-t border-gray-800" post-collapse="true">
        <x-slot:pre class="border-t border-gray-800"></x-slot:pre>
        <div class="flex flex-col gap-2">
            <small>
                This site is powered by
                <span class="inline-flex gap-1"><a href="https://laravel.com/" class="link link-focus !decoration-1">Laravel</a>
                <x-icon.laravel class="w-5 h-5 text-primary-400" /></span>
                and GitHub pages &ndash; <span class="italic">but how? Come along and ask&nbsp;us!</span>
            </small>
        </div>
    </x-layout.grid-section>
</x-layout.html>
