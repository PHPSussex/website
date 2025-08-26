<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHP Sussex</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#000] text-gray-100 h-full">
        <header class="px-6 py-3 flex justify-between items-center">
            <x-logo class="w-[4.25rem]" />
            <x-socials />
        </header>
        <main>
            <img class="object-cover w-full" src="{{ Vite::asset('resources/images/meetup.jpg') }}" alt="Attendees at the PHP Sussex meetup" />
            <div class="container mx-auto px-6 py-4 max-w-3xl">
                <h1 class="text-4xl font-bold">PHP Sussex</h1>
                <p>PHP Sussex is a free, open to all, meetup based in Brighton, UK.</p>
            </div>
        </main>
    </body>
</html>
