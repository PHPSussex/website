@props(['name', 'provides', 'url'])
<div>
    <x-type.primary-upper class="mb-1">{{ $provides }}</x-type.primary-upper>
    <x-dynamic-component component="logo.{{ Str::of($name)->kebab()->value() }}" class="h-[4rem]" />
    <a class="text-sm text-mono-400 link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
