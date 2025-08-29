<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHP Sussex</title>

        <!-- Fonts Google TODO remove -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#000] text-mono-100 h-full">
        <x-skip-to-content />
        <header class="border-b border-gray-800">
            <div class="flex justify-end items-center">
            </div>
        </header>

        <main id="content" class="divide-y divide-gray-800">
            <h1 class="sr-only">PHP Sussex</h1>
            <div class="grid grid-cols-12">
                <div class="col-span-2 flex flex-col">
                    <div class="grow flex justify-center items-center">
                        <x-logo.php-sussex class="w-1/2" />
                    </div>
                    <div class="px-6">
                        <x-type.primary-upper tag="h2">Socials</x-type.primary-upper>
                        <x-socials class="-ml-3 justify-between" />
                    </div>
                </div>
                <x-home.hero class="col-span-10" />
            </div>

            <div class="grid grid-cols-12">
                <div class="col-span-2"></div>
                <div class="col-span-10">
                </div>
            </div>

            <div class="grid grid-cols-12 divide-x divide-gray-800">
                <div class="col-span-2"></div>
                <div class="col-span-8 p-8">
                    <x-type.primary-upper class="mb-3">About us</x-type.primary-upper>
                    <div class="text-4xl font-extrabold uppercase mb-4">
                        <p class="inline">PHP Sussex is a free, open to all, meetup based in Brighton, UK.</p>
                    </div>
                    <div class="space-y-3">
                        <x-type.para class="text-mono-400">We're a community of folks who love working with the web and getting sh<span class="text-primary-400">*</span>t done, which often involves PHP (and JavaScript and CSS and Tailwind and TypeScript and NodeJS and React and Vue and Python and&hellip;).</x-type.para>
                        <x-type.para>We meet up every couple of months to ...</x-type.para>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 divide-x divide-gray-800">
                <div class="col-span-2"></div>
                <div class="col-span-8 p-8">
                    <x-type.primary-upper class="mb-3">Organisers</x-type.primary-upper>
                    <x-type.para class="mb-10">Need to know where the toilets are or which pizza is veggie, vegan or gluten-free?</x-type.para>
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
                </div>
            </div>


            <div class="grid grid-cols-12 divide-x divide-gray-800">
                <div class="col-span-2"></div>
                <div class="col-span-8 p-8">
                    <x-type.primary-upper tag="h2" class="mb-3">Sponsors &amp; Support</x-type.primary-upper>
                    <div aria-hidden="true" class="tracking-wide text-mono-400 text-sm">
                    <pre>
//
// We couldn't do this without these rad people
//
                    </pre>
                    </div>
                    <div class="text-mono-700 flex justify-between gap-10">
                        <x-sponsor name="Tillo" provides="Drinks" url="https://tillo.com" />
                        <x-sponsor name="Runway East" provides="Pizza & Venue" url="https://runwayea.st" />
                        <x-sponsor name="Silicon Brighton" provides="Support & AV" url="https://siliconbrighton.com" />
                    </div>
                </div>
            </div>
        </main>

        <x-section tag="footer" class="border-t border-gray-800">
            <div class="flex flex-col gap-2">
                <small class="flex gap-1 items-center">
                    This site is powered by <a href="https://laravel.com/" class="link link-focus !decoration-1">Laravel</a>
                    <x-icon.laravel class="w-5 h-5 text-primary-400" />
                    and GitHub pages &ndash; <span class="italic">but how? Come along and ask us!</span>
                </small>
            </div>
        </x-section>
    </body>
</html>
