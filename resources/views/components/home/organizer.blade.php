@props(['name', 'img', 'pronounced', 'sub', 'nationality'])
<div class="flex flex-col items-center gap-3">
    <p>{{ $name }} <span class="text-primary-400">"{{ $pronounced }}"</span> <span class="text-mono-400">[he/him]</span></p>
    <div class="w-48 h-48 rounded-full border border-mono-800 overflow-hidden bg-gradient-to-br from-primary-100 to-primary-600">
        <img alt="Portrait of Yannick Chenot" src="{{ $img }}" class="grayscale mix-blend-multiply" />
    </div>
    <p class="text-lg">"The {!! $nationality !!}"</p>
</div>
