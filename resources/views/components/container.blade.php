@props(['tag' => 'div'])
<{{ $tag }} {{ $attributes->class('container max-w-3xl mx-auto') }}>
    {{ $slot }}
</{{ $tag }}>
