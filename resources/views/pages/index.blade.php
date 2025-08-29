<?php
    use function App\setting;
?>
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
        <header>
            <div class="relative flex flex-col justify-between">
                <div class="bg-gradient-to-br from-cyan-200 to-cyan-600">
                    {{ setting('home-hero')->img('pixellated')->attributes(['class' => 'object-cover w-full grayscale mix-blend-multiply']) }}
                </div>
                <div class="absolute top-0 left-0 w-full px-6 py-2 flex justify-between items-center">
                    <x-logo.php-sussex class="w-[4.5rem] opacity-95" />
                    <x-socials />
                </div>
                <x-container class="!bg-transparent">
                    <h1 class="text-3xl font-extrabold uppercase tracking-tighter">September 10th</h1>
                </x-container>
            </div>
        </header>
        <x-container tag="p" class="pt-3 pb-3 text-sm">
            <span class="inline-block animate-ping rounded-full w-4 h-4"></span>
            <span>Next meetup September 10th 2025</span>
        </x-container>

        <main class="divide-y divide-gray-800">

            <x-section>
                <h1 class="text-4xl font-extrabold uppercase">PHP Sussex</h1>
                <p>PHP Sussex is a free, open to all, meetup based in Brighton, UK.</p>
                <p>We're a community of developers who love working with the web and getting sh*t delivered with PHP</p>
            </x-section>

            <x-section tag="section">
                <h2 class="tracking-wide text-gray-400 text-sm">
                    <pre>
//
// We couldn't do this without support from
//
                    </pre>
                </h2>
                <div class="text-mono-700 flex justify-between gap-10">
                    <x-sponsor name="Tillo" provides="Drinks" url="https://tillo.com" />
                    <x-sponsor name="Runway East" provides="Pizza & Venue" url="https://runwayea.st" />
                    <x-sponsor name="Silicon Brighton" provides="Support & AV" url="https://siliconbrighton.com" />
                </div>
            </x-section>
        </main>

        <x-section tag="footer" class="border-t border-gray-800">
            <div class="flex flex-col gap-2">
                <small class="flex gap-1 items-center">
                    This site is powered by Laravel
                    <x-icon.laravel class="w-5 h-5 text-primary-400" />
                    and GitHub pages &ndash; <span class="italic">but how? Come along and ask us!</span>
                </small>
            </div>
        </x-section>
    </body>
</html>
