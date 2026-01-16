@use(Illuminate\View\ComponentAttributeBag)
<x-layout.html {{ $attributes }}>
    <x-slot:head>
        @vite([
            'resources/css/slides.css',
            'resources/js/slides.js',
        ])
        <style>
            .reveal {
                background-image: url("data:image/svg+xml,{{ rawurlencode(Blade::render('components.logo.php-sussex', ['attributes' => new ComponentAttributeBag(['fill' => 'rgba(255,255,255,0.25)'])])) }}");
                background-repeat: no-repeat;
                background-position: top 2rem right 2rem;
                background-size: 6rem auto;
            }
            #matrix-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                opacity: 0.15;
            }
        </style>
    </x-slot:head>
    <canvas id="matrix-bg"></canvas>
    <div class="reveal transition-all">
        <div class="slides">
            {{ $slot }}
        </div>
    </div>
    <script>
        (function() {
            const canvas = document.getElementById('matrix-bg');
            const ctx = canvas.getContext('2d');

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const chars = 'PHPSUSSEX'.split('');
            const fontSize = 18;
            const columns = Math.floor(canvas.width / fontSize);
            const drops = Array(columns).fill(1);

            function draw() {
                ctx.fillStyle = 'rgba(13, 17, 23, 0.05)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.fillStyle = '#4dc0b5';
                ctx.font = fontSize + 'px monospace';

                for (let i = 0; i < drops.length; i++) {
                    const char = chars[Math.floor(Math.random() * chars.length)];
                    ctx.fillText(char, i * fontSize, drops[i] * fontSize);

                    if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                        drops[i] = 0;
                    }
                    drops[i]++;
                }
            }

            setInterval(draw, 150);

            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        })();
    </script>
</x-layout.html>

