@props(['data'])
@use(chillerlan\QRCode\QRCode)
@use(chillerlan\QRCode\QROptions)

@php
    $options = new QROptions;
@endphp

<img
    {{ $attributes->merge([
        'src' => new QRCode($options ?: new QROptions())->render($data),
    ]) }}
/>
