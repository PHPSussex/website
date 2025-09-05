@props(['variant' => ''])
@use(function App\variant)
@php
$variantClasses = variant($variant, [
    'small' => 'leading-relaxed'
])
@endphp
<x-type variant="{{ $variant }}" {{ $attributes->merge(['tag' => 'p'])->class(['md:leading-loose mb-3', ...$variantClasses]) }}>{{ $slot }}</x-type>
