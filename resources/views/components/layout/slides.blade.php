<x-layout.html {{ $attributes }}>
    <x-slot:head>
        @vite([
            'resources/css/slides.css',
            'resources/js/slides.js',
        ])
    </x-slot:head>
    <div class="reveal transition-all">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>
</x-layout.html>

