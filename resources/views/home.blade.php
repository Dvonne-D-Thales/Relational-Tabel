<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { darkMode: 'class' }
  </script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <body class="antialiased font-sans transition-colors duration-500 bg-[#0f172a] text-white">

    <div class="min-h-screen flex flex-col">

      <!-- HEADER -->
      <header class="w-full py-4 px-6 flex items-center justify-between backdrop-blur-md bg-[#0f172a]/90 border-b border-gray-700 shadow-md transition-colors duration-500">
        <div class="flex items-center gap-4">
          <div class="rounded-lg p-2 bg-purple-800/30">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
              <path d="M3 12h18M12 3v18" stroke="#D8B4FE" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h1 class="text-xl font-bold text-white transition-colors duration-500">{{ $title ?? 'Dashboard' }}</h1>
        </div>

        <div class="flex items-center gap-3">
          <div class="relative">
            <input type="search" placeholder="Search..."
              class="w-48 px-3 py-2 rounded-xl border border-gray-700 bg-[#0f172a]/70 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-500 backdrop-blur-md" />
          </div>
        </div>
      </header>

      <!-- HERO -->
      <section class="px-6 mt-8">
        <div class="relative rounded-3xl overflow-hidden">
          <div aria-hidden class="absolute inset-0 -z-10 animate-tilt"
               style="background: linear-gradient(135deg, #7C3AED 0%, #9333EA 100%); opacity:0.1;"></div>

          <div class="p-8 md:p-12 bg-[#0f172a]/90 border border-gray-700 rounded-3xl flex flex-col md:flex-row items-center gap-8 shadow-xl backdrop-blur-md transition-colors duration-500">
            <div class="flex-1">
              <h2 class="text-3xl md:text-4xl font-extrabold text-white transition-colors duration-500">
                Halo — Selamat datang di <span class="text-purple-400">Home</span>
              </h2>
              <p class="mt-4 text-gray-300 max-w-xl transition-colors duration-500">
                Ringkasan cepat aktivitas dan akses fitur penting. Dashboard futuristik, elegan, dan performa tinggi.
              </p>

              <div class="mt-6 flex gap-4">
                <a href="#" class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold shadow-lg hover:scale-105 transform transition">
                  Mulai Sekarang
                </a>
                <a href="#" class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl border border-purple-700 text-white hover:bg-purple-800/30 transition">
                  Lihat Fitur
                </a>
              </div>
            </div>

            <div class="w-full md:w-80 grid gap-4">
              <div class="p-5 rounded-2xl bg-[#0f172a]/80 border border-purple-700 shadow-md backdrop-blur-md hover:shadow-xl transition-colors duration-500">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-sm text-gray-400 transition-colors duration-500">Tasks</p>
                    <p class="mt-1 text-2xl font-bold text-white transition-colors duration-500">{{ $tasks ?? 0 }}</p>
                  </div>
                  <svg width="36" height="36" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="#D8B4FE" stroke-width="1.5" />
                  </svg>
                </div>
              </div>

              <div class="p-5 rounded-2xl bg-[#0f172a]/80 border border-purple-700 shadow-md backdrop-blur-md hover:shadow-xl transition-colors duration-500">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-sm text-gray-400 transition-colors duration-500">Notifikasi</p>
                    <p class="mt-1 text-2xl font-bold text-white transition-colors duration-500">{{ $notifications ?? 0 }}</p>
                  </div>
                  <svg width="36" height="36" viewBox="0 0 24 24" fill="none">
                    <rect x="4" y="4" width="16" height="16" rx="4" stroke="#9333EA" stroke-width="1.5" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN GRID -->
      <main class="px-6 mt-8 flex-1">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Left -->
          <section class="md:col-span-2 space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <article class="p-6 rounded-2xl bg-[#0f172a]/80 border border-gray-700 shadow-md backdrop-blur-md hover:shadow-xl transition-colors duration-500">
                <h3 class="font-bold text-purple-400 text-lg transition-colors duration-500">Analitik Cepat</h3>
                <p class="mt-2 text-gray-300 text-sm transition-colors duration-500">Grafik ringkas performa, bisa ditambahkan chart library nanti.</p>
              </article>

              <article class="p-6 rounded-2xl bg-[#0f172a]/80 border border-gray-700 shadow-md backdrop-blur-md hover:shadow-xl transition-colors duration-500">
                <h3 class="font-bold text-purple-400 text-lg transition-colors duration-500">Integrasi Pintas</h3>
                <p class="mt-2 text-gray-300 text-sm transition-colors duration-500">Tautan menuju tools penting, export data, dan import.</p>
              </article>
            </div>

            <div class="rounded-2xl bg-[#0f172a]/80 border border-gray-700 p-6 shadow-md backdrop-blur-md transition-colors duration-500">
              <h4 class="font-bold text-purple-400 transition-colors duration-500">Aktivitas Terbaru</h4>
              <ul class="mt-3 space-y-3">
                <li class="flex items-start gap-3">
                  <span class="text-purple-400 text-sm transition-colors duration-500">•</span>
                  <div>
                    <p class="text-gray-200 text-sm transition-colors duration-500">[09 Sep] Pengguna X menyelesaikan tugas A</p>
                    <p class="text-gray-400 text-xs transition-colors duration-500">2 jam lalu</p>
                  </div>
                </li>
              </ul>
            </div>
          </section>

          <!-- Right -->
          <aside class="space-y-5">
            <div class="p-5 rounded-2xl bg-[#0f172a]/80 border border-gray-700 shadow-md backdrop-blur-md transition-colors duration-500">
              <h4 class="font-bold text-purple-400 transition-colors duration-500">Quick Links</h4>
              <nav class="mt-3 flex flex-col gap-3">
                <a class="px-4 py-2 rounded-lg hover:bg-purple-800/30 transition-colors duration-500" href="#">Proyek</a>
                <a class="px-4 py-2 rounded-lg hover:bg-purple-800/30 transition-colors duration-500" href="#">Pengaturan</a>
                <a class="px-4 py-2 rounded-lg hover:bg-purple-800/30 transition-colors duration-500" href="#">Bantuan</a>
              </nav>
            </div>
          </aside>
        </div>
      </main>

    </div>

  </body>
</x-layout>
