@props(['w' => 640, 'h' => 640])
<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {{ $w }} {{ $h }}" {{ $attributes->class('fill-current') }}>{{ $slot }}</svg>
