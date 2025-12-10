@props(['name', 'img', 'pronounced', 'sub', 'linkedin'])
@use(Spatie\MediaLibrary\MediaCollections\Models\Media)
@use(function App\theme)
@php
    /**
     * @var Media $img
     */
@endphp
<address {{ $attributes->class('flex flex-col items-center gap-3 not-italic') }}>
    <dl class="@container block w-full text-lg text-center ">
        <div class="inline-flex flex-col @min-[275px]:flex-row flex-wrap @min-[275px]:gap-2">
            <dt class="sr-only">Name</dt>
            <x-type tag="dd">{{ $name }}</x-type>
            <dt class="sr-only">Pronounced</dt>
            <x-type tag="dd" variant="primary" class="italic text-nowrap">"{{ $pronounced }}"</x-type>
        </div>
        <dt class="sr-only">Pronouns</dt>
        <x-type tag="dd" variant="dim">
            <span aria-hidden="true">[</span>he/him<span aria-hidden="true">]</span>
        </x-type>
    </dl>
    <div
        @class([
            theme('border'),
            'w-36 h-36 rounded-full border overflow-hidden relative',
        ])
    >
        {{ $img()->attributes(['alt' => "Portrait of $name", 'class' => 'grayscale object-cover w-full h-full']) }}
        <div class="bg-primary-200 dark:bg-primary-300 absolute top-0 left-0 right-0 bottom-0 mix-blend-multiply"></div>
    </div>
    <a class="link link-focus text-lg" href="{{ $linkedin }}">LinkedIn</a>
</address>
