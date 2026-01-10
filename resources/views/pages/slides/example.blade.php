<x-layout.slides title="Example Slides">

    <x-slide>
        <x-slide.h>Cover Slide</x-slide.h>
        <a href="https://revealjs.com/">Reveal JS Docs</a>
    </x-slide>

    <x-slide data-transition="zoom">
        <x-slide.h>Transitions</x-slide.h>
        <a href="https://revealjs.com/transitions/">Reveal.js Docs</a>
        <x-slide.code class="language-html">
&lt;x-slide data-transition="zoom"&gt;
    &lt;!-- slide content.. --&gt;
&lt;/x-slide&gt;
        </x-slide.code>
    </x-slide>

    <x-slide>
        <x-slide.h>Fragments</x-slide.h>
        <a href="https://revealjs.com/fragments/">Reveal.js Docs</a>
        <x-slide.code>
&lt;ul&gt;
    &lt;x-slide.fragment tag="li"&gt;Item one&lt;/x-slide.fragment&gt;
    &lt;x-slide.fragment tag="li"&gt;Item two&lt;/x-slide.fragment&gt;
&lt/ul&gt;
        </x-slide.code>
        <ul>
            @php
                $items = [
                    'The fragment component',
                    'Provides a way to',
                    'Animate between parts of',
                    'The same slide',
                ];
            @endphp
            @foreach ($items as $li)
                <x-slide.fragment tag="li" class="fade-left">{{ $li }}</x-slide.fragment>
            @endforeach
        </ul>

    </x-slide>

    <x-slide data-transition="zoom">
        <x-slide.h class="r-fit-text">Have Fun! 🙌</x-slide.h>
    </x-slide>

</x-layout.slides>
