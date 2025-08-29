<?php
    use function App\setting;
?>
<div {{ $attributes->class("bg-gradient-to-br from-cyan-300 to-cyan-700") }}>
    {{ setting('home-hero')
        ->img('pixellated')
        ->attributes(['class' => 'object-cover w-full grayscale mix-blend-multiply']) }}
</div>
