@use(Illuminate\View\ComponentAttributeBag)
@use(Illuminate\Support\Facades\Blade)
@php
    $phpSussex = Blade::render('components.logo.php-sussex', ['attributes' => new ComponentAttributeBag([
        'attributes' => new ComponentAttributeBag(['fill' => 'rgba(255,255,255,0.2)']),
    ])]);
    $siliconBrighton = view('components.logo.silicon-brighton', ['attributes' => new ComponentAttributeBag(['fill' => 'rgba(255,255,255,0.2)'])])->render();
@endphp
<x-layout.html {{ $attributes }}>
    <x-slot:head>
        @vite([
            'resources/css/slides.css',
            'resources/js/slides.js',
        ])
        <style>
            .reveal {
                background-image:
                    url("data:image/svg+xml,{{ rawurlencode($phpSussex) }}"),
                    url("data:image/svg+xml,{{ rawurlencode($siliconBrighton) }}");
                background-repeat: no-repeat;
                background-position: top 2rem right 2rem, bottom 2rem right 2rem;
                background-size: 6rem auto, 14rem auto;
            }
        </style>
    </x-slot:head>
    <div class="reveal transition-all">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>
</x-layout.html>

