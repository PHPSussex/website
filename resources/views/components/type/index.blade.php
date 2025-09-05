@props(['tag' => 'span', 'variant' => ''])
@use(function App\variant)
<{{ $tag }} {{ $attributes->class(variant($variant, [
    'dim' => 'text-mono-500 dark:text-mono-400',
    'display' => 'font-extrabold uppercase',
    'headline' => 'text-xl md:text-4xl',
    'primary' => 'text-primary-600 dark:text-primary-400',
    'upper' => 'uppercase tracking-wide',
    'small' => 'text-sm lg:text-xs',
])) }}>{{ $slot }}</{{ $tag }}>
