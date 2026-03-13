@use(function App\setting)
<div {{ $attributes->class("h-[10rem] md:h-[16rem] lg:h-[18rem] xl:h-[20rem] bg-gradient-to-br from-cyan-300 to-cyan-700 overflow-hidden relative") }}>
    {{ setting('home-hero')->img()->attributes(['class' => 'object-cover w-full min-h-full grayscale brightness-130']) }}
    <div class="absolute inset-0 bg-gradient-to-br from-cyan-200 to-cyan-600 mix-blend-multiply"></div>
</div>
