@props(['name', 'provides', 'url'])
<div>
    <span class="block text-mono-300 mb-0.5">{{ $provides }}</span>
    <x-dynamic-component component="logo.{{ Str::of($name)->kebab()->value() }}" class="h-[4rem]" />
    <a class="text-sm text-mono-400 link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
