@use(function App\theme)
@props([
    'heading' => null,
    'tag' => 'div',
    'pre' => null,
    'post' => null,
    'noPadding' => false,
    'collapse' => false,
])
@php
    $padding = 'p-6 md:p-8';
    $preClasses = 'col-span-1 md:col-span-2';
    $postClasses = $preClasses.' xl:col-span-3';
@endphp
<{{ $tag }} class="grid grid-cols-12">
    @if ($pre)
        <div {{ $pre->attributes->class([$preClasses, $padding]) }}>{{ $pre }}</div>
    @else
        <div @class([$preClasses, $padding])></div>
    @endif

    <div {{ $attributes
                ->class([
                    theme('border'),
                    'border-l', $padding => !$noPadding,
                    'col-span-11 md:col-span-10' => $collapse,
                    'col-span-10 md:col-span-8 xl:col-span-7' => !$collapse,
                    'border-r' => !$collapse,
        ]) }}

        @if ($heading)
            id="{{ Str::of($heading)->replace('&amp;', '')->kebab()->value() }}"
        @endif
     >
        @if($heading)
            <x-type tag="h2" variant="primary upper" class="mb-3">{!! $heading !!}</x-type>
        @endif
        {{ $slot }}
    </div>
    @if (!$collapse && $post)
        <div {{ $pre->attributes->class([$postClasses, $padding]) }}>{{ $pre }}</div>
    @endif
</{{ $tag }}>
