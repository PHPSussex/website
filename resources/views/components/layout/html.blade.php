@use(Illuminate\Support\Facades\Vite)
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full sm:text-lg xl:text-xl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHP Sussex</title>

    @php
        $description = 'PHP Sussex is a free, open to all, monthly meetup based in Brighton, UK.';
        $banner = Vite::asset('resources/images/banner.png');
    @endphp
    <meta name="description" content="{{ $description }}">
    <meta property="og:image" content="{{ $banner }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@PHPSussexUG">
    <meta name="twitter:creator" content="@PHPSussexUG">
    <meta name="twitter:title" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $banner }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
    @endif
</head>
<body class="antialiased bg-[#000] text-mono-300 h-full">
    <x-skip-to-content />
    {{ $slot }}
</body>
</html>
