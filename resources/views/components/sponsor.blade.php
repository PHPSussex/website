@props(['name', 'provides', 'url'])
<div>
    <p class="text-primary-400 uppercase tracking-wide text-sm mb-1">{{ $provides }}</p>
    <x-dynamic-component component="logo.{{ Str::of($name)->kebab()->value() }}" class="h-[4rem]" />
    <a class="text-sm text-mono-400 link-focus" href="{{ $url }}">{{ $url }}</a>
</div>
