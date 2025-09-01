@props(['name', 'provides', 'url', 'logoClass' => null])
<div>
    <span class="block text-mono-300">{{ $provides }}</span>
    <x-dynamic-component
        component="logo.{{ Str::of($name)->kebab()->value() }}"
        @class(['h-[3.5rem] text-mono-600 my-1', $logoClass])
    />
    <a class="text-sm link link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
