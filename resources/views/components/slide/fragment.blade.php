@props(['tag' => 'div'])
<{{ $tag }} {{ $attributes->merge(['class' => 'fragment']) }}>{{ $slot }}</{{ $tag }}>
