@props(['tag' => 'span', 'variant' => []])
@use(Illuminate\Support\Arr)
@use(Illuminate\Support\Collection)
@php
    $variants = [
        'primary' => 'text-primary-400',
        'dim' => 'text-mono-400',
        'upper' => 'uppercase tracking-wide text-sm',
    ];
    $variant = Collection::make(explode(' ', $variant))
        ->map(fn (string $variant) => trim($variant))
        ->filter()
        ->toArray();
    $variantClasses = array_values(Arr::only($variants, $variant));
@endphp
<{{ $tag }} {{ $attributes->class($variantClasses) }}>{{ $slot }}</{{ $tag }}>
