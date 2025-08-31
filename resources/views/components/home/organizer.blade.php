@props(['name', 'img', 'pronounced', 'sub', 'linkedin'])
<address {{ $attributes->class('flex flex-col items-center gap-3 not-italic') }}>
    <p class="text-lg">{{ $name }} <x-type variant="primary" class="italic">"{{ $pronounced }}"</x-type> <x-type variant="dim">[he/him]</x-type></p>
    <div class="w-36 h-36 rounded-full border border-mono-800 overflow-hidden bg-gradient-to-br from-primary-200 to-primary-700">
        <img alt="Portrait of Yannick Chenot" src="{{ $img }}" class="grayscale mix-blend-multiply" />
    </div>
    <a class="link link-focus text-lg" href="{{ $linkedin }}">LinkedIn</a>
</address>
