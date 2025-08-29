@props(['tag' => 'section'])
<{{ $tag }} {{ $attributes->class('py-6') }}>
    <x-container>
        {{ $slot }}
    </x-container>
</{{ $tag }}>
