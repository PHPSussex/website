<?php
    use function App\setting;
?>
<div {{ $attributes->class("h-[10rem] md:h-[14rem] lg:h-[18rem] xl:h-[20rem] bg-gradient-to-br from-cyan-300 to-cyan-700 overflow-hidden") }}>
    {{ setting('home-hero')
        ->img('pixellated')
        ->attributes(['class' => 'object-cover w-full min-h-full grayscale mix-blend-multiply']) }}
</div>
