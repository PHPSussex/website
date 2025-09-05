@props(['name', 'provides', 'url'])
<div>
    <span class="block text-sm">{{ $provides }}</span>
    <x-dynamic-component
        component="logo.{{ Str::of($name)->kebab()->value() }}"
        @class(['h-[3.5rem] text-mono-800 dark:text-mono-400 dark:text-mono-500 my-1.5'])
    />
    <a class="text-xs link link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
