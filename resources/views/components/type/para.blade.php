@props(['variant' => ''])
@use(function App\variant)
@php
$variantClasses = variant($variant, [
    'small' => 'text-xs !leading-relaxed'
])
@endphp
<x-type tag="p" variant="dim" {{ $attributes->class(['md:leading-loose mb-3', ...$variantClasses]) }}>{{ $slot }}</x-type>
