@props([
    'heading' => null,
    'tag' => 'div',
    'pre' => null,
    'post' => null,
    'noPadding' => false,
    'postCollapse' => false
])
@use(Illuminate\View\ComponentAttributeBag)
@php
    $padding = 'p-8';
    $preClasses = 'col-span-2';
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
                    $postCollapse ? 'col-span-10' : 'col-span-8',
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

    @unless($postCollapse)
        @if($post)
            <div {{ $post->attributes([$postClasses, $padding]) }}></div>
        @else
            <div @class([$postClasses, $padding])></div>
        @endif
    @endif
</{{ $tag }}>
