@props(['url'])
<div {{ $attributes->except(['width', 'height'])->class('flex flex-col justify-center') }}>
    <x-slide.qr-code class="mx-auto" {{ $attributes->only(['width', 'height'])->merge(['data' => $url]) }} />
    <small class="max-w-sm">{{ $url }}</small>
</div>
