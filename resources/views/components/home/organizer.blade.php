@props(['name', 'img', 'pronounced', 'sub', 'nationality'])
<div class="flex flex-col items-center gap-3">
    <p>{{ $name }} <x-type variant="primary">"{{ $pronounced }}"</x-type> <x-type variant="dim">[he/him]</x-type></p>
    <div class="w-48 h-48 rounded-full border border-mono-800 overflow-hidden bg-gradient-to-br from-primary-200 to-primary-700">
        <img alt="Portrait of Yannick Chenot" src="{{ $img }}" class="grayscale mix-blend-multiply" />
    </div>
    <p class="text-lg">"The {!! $nationality !!}"</p>
</div>
