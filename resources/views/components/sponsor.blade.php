@props(['name', 'provides', 'url'])
<div>
    <span class="block text-mono-300">{{ $provides }}</span>
    <x-dynamic-component
        component="logo.{{ Str::of($name)->kebab()->value() }}"
        class="h-[4rem] text-primary-600 my-1"
    />
    <a class="text-sm link link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
