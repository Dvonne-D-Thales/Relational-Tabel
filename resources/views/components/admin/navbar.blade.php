<nav class="relative z-50">
  <!-- Navbar -->
  <div class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-4 py-3 backdrop-blur-md bg-white/20 dark:bg-gray-900/20 border-b border-gray-200 dark:border-gray-700 shadow-md">

    <!-- Left + Search -->
    <div class="flex items-center gap-4">
      <!-- Tombol menu mobile -->
      <button class="sm:hidden inline-flex items-center p-2 rounded-lg hover:bg-white/30 dark:hover:bg-gray-700 transition text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Judul -->
      <span class="font-bold text-lg text-white tracking-wide">Admin Panel</span>

      <!-- Search Bar -->
      <div class="relative w-64 hidden sm:block">
        <input type="text" id="searchInput" placeholder="Search..."
               class="w-full pl-10 pr-4 py-2 rounded-lg bg-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-purple-400">
        <svg class="absolute left-3 top-2.5 w-5 h-5 text-white/70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18.5a7.5 7.5 0 006.15-3.85z"/>
        </svg>
      </div>
    </div>

    <!-- Right (Notif + Profile) -->
    <div class="flex items-center gap-4 relative">
      <!-- Notifikasi -->
      <div class="relative">
        <button id="notifBtn" class="relative p-2 rounded-full hover:bg-white/30 transition text-white">
          <!-- Icon bel -->
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <!-- Titik merah notif -->
          <span class="absolute top-1 right-1 block w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- Dropdown Notifikasi -->
        <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-72 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
          <div class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-200 border-b dark:border-gray-700">Notifikasi</div>
          <div class="max-h-60 overflow-y-auto">
            <div class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
              🔔 Update sistem berhasil diinstal.
            </div>
            <div class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
              📦 Pesanan baru dari user: <b>Andi</b>.
            </div>
            <div class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
              ⚙️ Server akan maintenance malam ini.
            </div>
          </div>
          <div class="text-center px-4 py-2 text-sm text-purple-600 dark:text-purple-400 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">Lihat semua</div>
        </div>
      </div>

      <!-- Profil -->
      <div class="relative">
        <button id="userMenuBtn" class="flex items-center gap-2 p-1 rounded-full hover:bg-white/30 transition">
          <img class="w-9 h-9 rounded-full border border-gray-300" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        <!-- Dropdown Profil -->
        <div id="userMenuDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
          <a href="#" class="px-4 py-2 block text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
          <a href="#" class="px-4 py-2 block text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
          <a href="#" class="px-4 py-2 block text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 font-semibold">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Dropdown -->
  <script>
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userMenuDropdown = document.getElementById('userMenuDropdown');
    const notifBtn = document.getElementById('notifBtn');
    const notifDropdown = document.getElementById('notifDropdown');

    // Toggle dropdown profil
    userMenuBtn.addEventListener('click', () => {
      userMenuDropdown.classList.toggle('hidden');
      notifDropdown.classList.add('hidden'); // tutup notif jika buka profil
    });

    // Toggle dropdown notifikasi
    notifBtn.addEventListener('click', () => {
      notifDropdown.classList.toggle('hidden');
      userMenuDropdown.classList.add('hidden'); // tutup profil jika buka notif
    });

    // Klik di luar dropdown untuk menutup semuanya
    window.addEventListener('click', (e) => {
      if (!notifBtn.contains(e.target) && !notifDropdown.contains(e.target)) {
        notifDropdown.classList.add('hidden');
      }
      if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
        userMenuDropdown.classList.add('hidden');
      }
    });
  </script>
</nav>
