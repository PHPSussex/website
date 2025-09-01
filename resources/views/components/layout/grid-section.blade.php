@props([
    'heading' => null,
    'tag' => 'div',
    'pre' => null,
    'post' => null,
    'noPadding' => false,
    'collapse' => false,
])
@use(Illuminate\View\ComponentAttributeBag)
@php
    $padding = 'p-6 md:p-8';
    $preClasses = 'col-span-1 md:col-span-2';
    $postClasses = $preClasses;
@endphp
<{{ $tag }} class="grid grid-cols-12">
    @if ($pre)
        <div {{ $pre->attributes->class([$preClasses, $padding]) }}>{{ $pre }}</div>
    @else
        <div @class([$preClasses, $padding])></div>
    @endif

    <div {{ $attributes
                ->class([
                    'border-l border-mono-800', $padding => !$noPadding,
                    'col-span-11 md:col-span-10' => $collapse,
                    'col-span-11 md:col-span-8 xl:col-span-7 xl:col-span-6' => !$collapse,
                    'border-r' => !$collapse,
                ])
                ->when($heading, function (ComponentAttributeBag $attributes) use ($heading) {
                    $attributes->merge(['id' => Str::of($heading)->kebab()->value()]);
                })
     }}>
        @if($heading)
            <x-type tag="h2" variant="primary upper" class="mb-3">{!! $heading !!}</x-type>
        @endif
        {{ $slot }}
    </div>
</{{ $tag }}>
