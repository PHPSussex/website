@props(['name', 'provides', 'url', 'logoClass' => null])
<div>
    <span class="block text-sm">{{ $provides }}</span>
    <x-dynamic-component
        component="logo.{{ Str::of($name)->kebab()->value() }}"
        @class(['h-[3.5rem] text-mono-300 my-1.5', $logoClass])
    />
    <a class="text-xs link link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
