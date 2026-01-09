@props(['title' => null])
@use(Illuminate\Support\Facades\Vite)
@use(function App\theme)
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full sm:text-lg xl:text-xl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ? "$title | PHPSussex" : 'PHPSussex' }}</title>

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

    {{ $head ?? '' }}
</head>
<body
    @class([
        'antialiased bg-mono-white text-mono-800',
        'dark:bg-black dark:text-mono-300 h-full',
        theme('border'),
    ])
>
    {{ $slot }}
</body>
</html>
