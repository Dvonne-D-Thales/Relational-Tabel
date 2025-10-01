<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="relative min-h-screen bg-gray-900 text-white flex items-center justify-center py-16 px-6 overflow-hidden">

        {{-- Canvas untuk particle --}}
        <canvas id="particles" class="absolute inset-0 -z-10"></canvas>

        {{-- Konten Kontak (tanpa background putih) --}}
        <div class="max-w-3xl w-full text-center relative z-10">

            {{-- Heading --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                Kontak Saya
            </h1>

            {{-- Garis pemisah --}}
            <div class="w-24 h-1 bg-violet-500 mx-auto mb-10 rounded-full"></div>

            {{-- Info Kontak --}}
            <div class="space-y-6 text-lg font-bold">
                <p>
                    <span class="text-violet-400">Email:</span>
                    joseph@email.com
                </p>
                <p>
                    <span class="text-violet-400">Instagram:</span>
                    @joseph_tortellini
                </p>
                <p>
                    <span class="text-violet-400">WhatsApp:</span>
                    +62 812-3456-7890
                </p>
                <p>
                    <span class="text-violet-400">GitHub:</span>
                    github.com/josephdev
                </p>
                <p>
                    <span class="text-violet-400">LinkedIn:</span>
                    linkedin.com/in/joseph
                </p>
            </div>

        </div>
    </div>

    {{-- Script Particle --}}
    <script>
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.radius = Math.random() * 2 + 1;
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.speedY = (Math.random() - 0.5) * 0.5;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,255,255,0.8)';
                ctx.fill();
            }
        }

        function initParticles() {
            particles = [];
            for (let i = 0; i < 100; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        initParticles();
        animate();
    </script>
</x-layout>
