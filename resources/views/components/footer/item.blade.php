@props(['heading', 'icon' => null])
<div {{ $attributes }}>
    <x-type tag="h2" variant="upper" class="text-sm mb-2 flex items-center gap-1 text-primary-500">
        @if ($icon)
        <x-dynamic-component component="icon.{{ $icon }}" class="w-5 h-5" />
        @endif
        <span>{{ $heading }}</span>
    </x-type>
    {{ $slot }}
</div>
