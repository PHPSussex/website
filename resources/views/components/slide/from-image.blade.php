@props(['image'])
<x-slide
    {{ $attributes->merge([
        'data-background-size' => 'contain',
    ]) }}
    data-background-image="{{ Vite::asset($image) }}"
></x-slide>
