<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="relative min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-black text-white flex items-center justify-center overflow-hidden">

        {{-- Background glow --}}
        <div class="absolute inset-0 -z-10">
            <div class="absolute w-[600px] h-[600px] bg-violet-600/30 rounded-full blur-3xl top-20 left-10 animate-pulse"></div>
            <div class="absolute w-[500px] h-[500px] bg-cyan-500/20 rounded-full blur-3xl bottom-20 right-10 animate-ping"></div>
        </div>

        {{-- Card Kontak --}}
        <div class="max-w-md w-full bg-black/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 border border-white/20 relative z-10
                    transform transition duration-500 hover:scale-[1.05] hover:shadow-[0_0_60px_rgba(255,255,255,0.3)] hover:bg-black/90
                    opacity-0 translate-y-10 animate-fade-in-up">

            <h1 class="text-4xl font-extrabold text-center mb-8
                       bg-gradient-to-r from-violet-400 to-cyan-400 bg-clip-text text-transparent">
                Kontak Saya
            </h1>

            <div class="space-y-5 text-lg">
                @php
                    $contacts = [
                        ['icon' => '✉️', 'label' => 'joseph@email.com'],
                        ['icon' => '📸', 'label' => '@josepg_tortellini'],
                        ['icon' => '📱', 'label' => '+62 812-3456-7890'],
                        ['icon' => '💻', 'label' => 'github.com/josephdev'],
                        ['icon' => '🔗', 'label' => 'linkedin.com/in/joseph'],
                    ];
                @endphp

                @foreach ($contacts as $c)
                    <p class="flex items-center gap-4 group">
                        <span class="flex items-center justify-center w-10 h-10 rounded-xl
                                     bg-gradient-to-r from-violet-500 to-cyan-500
                                     text-white shadow-md group-hover:scale-110 transition">
                            {{ $c['icon'] }}
                        </span>
                        <span class="text-white group-hover:text-violet-300 group-hover:underline transition">
                            {{ $c['label'] }}
                        </span>
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tailwind Custom Animation --}}
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }
    </style>
</x-layout>
