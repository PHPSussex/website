@props(['tag' => 'span', 'variant' => ''])
@use(function App\variant)
<{{ $tag }} {{ $attributes->class(variant($variant, [
    'dim' => 'text-mono-400',
    'display' => 'font-extrabold uppercase',
    'headline' => 'text-xl md:text-4xl',
    'primary' => 'text-primary-400',
    'upper' => 'uppercase tracking-wide',
])) }}>{{ $slot }}</{{ $tag }}>
