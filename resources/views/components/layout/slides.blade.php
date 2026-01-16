@use(Illuminate\View\ComponentAttributeBag)
<x-layout.html {{ $attributes }}>
    <x-slot:head>
        @vite([
            'resources/css/slides.css',
            'resources/js/slides.js',
        ])
        <style>
            .reveal {
                background-image: url("data:image/svg+xml,{{ rawurlencode(Blade::render('components.logo.php-sussex', ['attributes' => new ComponentAttributeBag(['fill' => 'rgba(255,255,255,0.25)'])])) }}");
                background-repeat: no-repeat;
                background-position: top 2rem right 2rem;
                background-size: 6rem auto;
            }
        </style>
    </x-slot:head>
    <div class="reveal transition-all">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>
</x-layout.html>

