@props(['name', 'provides', 'url'])
<div>
    <span class="block text-mono-300 mb-0.5">{{ $provides }}</span>
    <x-dynamic-component component="logo.{{ Str::of($name)->kebab()->value() }}" class="h-[4rem]" />
    <x-type tag="a" variant="dim" class="text-sm link-focus" href="{{ $url }}">{{ $url }}</x-type>
</div>
