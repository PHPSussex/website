<x-layout.html {{ $attributes }}>
    <x-slot:head>
        @vite([
            'resources/css/app.css',
            'resources/css/slides.css',
            'resources/js/slides.js',
        ])
    </x-slot:head>
    <div class="reveal">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>
</x-layout.html>

