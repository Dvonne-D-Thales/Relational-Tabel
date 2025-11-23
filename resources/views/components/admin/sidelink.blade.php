<ul class="space-y-2 font-medium">
  <li>
    <a href="/admin"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
      <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 2L2 7v11h16V7l-8-5z"></path>
      </svg>
      <span class="ml-3">Dashboard</span>
    </a>
  </li>

  <li>
    <a href="/admin/students"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 14c-3.866 0-7 1.79-7 4v2h14v-2c0-2.21-3.134-4-7-4zm0-8a4 4 0 110 8 4 4 0 010-8z" />
      </svg>
      <span class="ml-3">Students</span>
    </a>
  </li>

  <li>
    <a href="/admin/teachers"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
       <svg xmlns="http://www.w3.org/2000/svg"
           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 14c-3.866 0-7 1.79-7 4v2h14v-2c0-2.21-3.134-4-7-4zm0-8a4 4 0 110 8 4 4 0 010-8z" />
      </svg>
      <span class="ml-3">Teachers</span>
    </a>
  </li>

  <li>
    <a href="/admin/mapel"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
       <svg xmlns="http://www.w3.org/2000/svg"
           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 14c-3.866 0-7 1.79-7 4v2h14v-2c0-2.21-3.134-4-7-4zm0-8a4 4 0 110 8 4 4 0 010-8z" />
      </svg>
      <span class="ml-3">Mapel</span>
    </a>
  </li>

  <li>
    <a href="/admin/classrooms"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 14c-3.866 0-7 1.79-7 4v2h14v-2c0-2.21-3.134-4-7-4zm0-8a4 4 0 110 8 4 4 0 010-8z" />
      </svg>
      <span class="ml-3">Classroom</span>
    </a>
  </li>

  <li>
    <a href="/admin/guardians"
       class="nav-link flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
              dark:hover:bg-gray-700 group transition-transform duration-200 ease-out">
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400
                  group-hover:text-gray-900 dark:group-hover:text-white"
           fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 14c-3.866 0-7 1.79-7 4v2h14v-2c0-2.21-3.134-4-7-4zm0-8a4 4 0 110 8 4 4 0 010-8z" />
      </svg>
      <span class="ml-3">Guardians</span>
    </a>
  </li>

</ul>

<script>
    // Tambahkan animasi klik
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            // Tambahkan class "active"
            link.classList.add('active-click');

            // Hapus class setelah animasi selesai (200ms)
            setTimeout(() => link.classList.remove('active-click'), 200);
        });
    });
</script>

<style>
    /* Efek shrink ketika diklik */
    .active-click {
        transform: scale(0.95);
        transition: transform 0.2s ease;
    }
</style>
