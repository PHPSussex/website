@props(['name', 'provides', 'url'])
<div class="w-[14rem]">
    <span class="block text-sm">{{ $provides }}</span>
    <x-dynamic-component
        component="logo.{{ Str::of($name)->kebab()->value() }}"
        {{ $attributes->only('class')->class(['h-[3.5rem] text-primary-600 dark:text-primary-500 my-1.5']) }}
    />
    <a class="text-xs link link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
