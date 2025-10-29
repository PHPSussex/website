@props(['when'])
<div class="-rotate-2 inline-block bg-mono-200 dark:bg-mono-300 text-mono-900 px-6 py-3 -mt-1 -ml-8 mb-6 space-y-1">
    <x-type tag="p" variant="display headline">
        {{ $slot }}
    </x-type>
    <x-type tag="p" variant="upper" class="mb-3 md:font-extrabold !md:text-lg">
        <time>{{ $when }}</time>, Runway East nr. Preston Circus, Brighton
    </x-type>
</div>
