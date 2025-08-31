@props(['text', 'icon'])
<span class="sr-only">{{ $text }}</span>
<x-type class="inline-block" variant="primary">
    <x-dynamic-component component="icon.{{ $icon }}" class="inline-block h-6 w-6" />
</x-type>
