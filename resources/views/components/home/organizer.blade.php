@props(['name', 'img', 'pronounced', 'sub', 'linkedin'])
<address {{ $attributes->class('@container flex flex-col items-center gap-3 not-italic') }}>
    <p class="text-lg text-center">{{ $name }}
        <x-type variant="primary" class="block @min-[275px]:inline italic text-nowrap">"{{ $pronounced }}"</x-type>
        <x-type variant="dim" class="block @min-[400px]:inline">[he/him]</x-type>
    </p>
    <div class="w-36 h-36 rounded-full border border-mono-800 overflow-hidden bg-gradient-to-br from-primary-200 to-primary-700 relative">
        <img alt="Portrait of Yannick Chenot" src="{{ $img }}" class="grayscale object-cover w-full h-full" />
        <div class="absolute inset-0 bg-gradient-to-br from-primary-200 to-primary-700 mix-blend-multiply"></div>
    </div>
    <a class="link link-focus text-lg" href="{{ $linkedin }}">LinkedIn</a>
</address>
