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
            <div class="text-4xl font-extrabold uppercase mb-4">
                <p class="inline">PHP Sussex is a free, open to all meetup, based in Brighton UK.</p>
            </div>
            <div class="space-y-3">
                <x-type.para class="text-mono-400">We're a community of folks who love working with the web and
                    getting sh<span class="text-primary-400">*</span>t done, which often involves PHP (and
                    JavaScript and CSS and Tailwind and TypeScript and NodeJS and React and Vue and Python and&hellip;).
                </x-type.para>
                <x-type.para>We meet up every couple of months to ...</x-type.para>
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Socials">
            <x-socials class="-ml-3 justify-between" />
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Organisers">
            <x-type.para class="mb-10">Need to know where the toilets are or which pizza is veggie, vegan or&nbsp;<span class="text-nowrap">gluten-free</span>?</x-type.para>
            <div class="flex gap-36">
                <x-home.organizer
                    name="Yannick"
                    :img="Vite::asset('resources/images/yannick.jpg')"
                    pronounced="Yan-eek"
                    nationality="Br<span class='text-primary-400'>e</span>ton <span class='text-2xl'>🇫🇷</span>"
                />
                <x-home.organizer
                    name="Joby"
                    :img="Vite::asset('resources/images/joby.jpg')"
                    pronounced="Joe-bee"
                    nationality="Br<span class='text-primary-400'>i</span>ton <span class='text-2xl'>🇬🇧</span>"
                />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Sponsors &amp; Support">
            <x-type.para class="mb-8">We couldn't do it on our own. Massive thanks to our amazing friends:</x-type.para>
            <div class="text-mono-700 flex justify-between gap-10">
                <x-sponsor name="Tillo" provides="Drinks" url="https://tillo.com" />
                <x-sponsor name="Runway East" provides="Pizza & Venue" url="https://runwayea.st" />
                <x-sponsor name="Silicon Brighton" provides="Support & AV" url="https://siliconbrighton.com" />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />
    </main>

    <x-layout.grid-section tag="footer" class="border-t border-gray-800" post-collapse="true">
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
