@props(['tag' => 'p'])
<{{ $tag }} {{ $attributes->class('text-primary-400 uppercase tracking-wide text-sm') }}>{{ $slot }}</{{ $tag }}>
