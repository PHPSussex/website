@props(['variant' => ''])
@use(function App\variant)
@php
$variantClasses = variant($variant, [
    'small' => 'leading-relaxed'
])
@endphp
<x-type
    {{ $attributes->merge(['tag' => 'p', 'variant' => $variant])->class(['md:leading-loose mb-3', ...$variantClasses]) }}
>{{ $slot }}</x-type>
