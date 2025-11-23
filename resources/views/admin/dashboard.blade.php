<x-admin.layout>

    {{-- Sembunyikan elemen yang pakai x-cloak --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <section class="bg-gray-50 dark:bg-gray-900 p-4 sm:p-6">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">

                {{-- Judul Dashboard --}}
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">
                    Dashboard
                </h1>

                {{-- CARD STATISTIK --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="p-5 rounded-lg bg-gray-100 dark:bg-gray-700 border dark:border-gray-600">
                        <p class="text-gray-600 dark:text-gray-300">Jumlah Siswa</p>
                        <h3 class="text-xl font-bold text-blue-600">128</h3>
                    </div>

                    <div class="p-5 rounded-lg bg-gray-100 dark:bg-gray-700 border dark:border-gray-600">
                        <p class="text-gray-600 dark:text-gray-300">Jumlah Guru</p>
                        <h3 class="text-xl font-bold text-blue-600">24</h3>
                    </div>

                    <div class="p-5 rounded-lg bg-gray-100 dark:bg-gray-700 border dark:border-gray-600">
                        <p class="text-gray-600 dark:text-gray-300">Jumlah Kelas</p>
                        <h3 class="text-xl font-bold text-blue-600">12</h3>
                    </div>

                    <div class="p-5 rounded-lg bg-gray-100 dark:bg-gray-700 border dark:border-gray-600">
                        <p class="text-gray-600 dark:text-gray-300">Jumlah Mapel</p>
                        <h3 class="text-xl font-bold text-blue-600">8</h3>
                    </div>
                </div>

                {{-- GRID 2 KOLOM --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                    {{-- Tabel Aktivitas Terbaru --}}
                    <div class="bg-gray-100 dark:bg-gray-700 p-5 rounded-lg shadow border dark:border-gray-600">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Aktivitas Terbaru</h2>

                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 text-white-500  dark:divide-gray-600">
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2">1</td>
                                    <td class="px-4 py-2 ">🧑‍🎓 Siswa baru ditambahkan: <strong>Andi Setiawan</strong></td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">📚 Guru baru bergabung: <strong>Ibu Lestari</strong></td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600 ">
                                    <td class="px-4 py-2">3</td>
                                    <td class="px-4 py-2">🏫 Kelas 8A diperbarui</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Placeholder Grafik --}}
                    <div class="bg-gray-100 dark:bg-gray-700 p-5 rounded-lg shadow border dark:border-gray-600 flex items-center justify-center">
                        <span class="text-gray-500 dark:text-gray-300">Grafik</span>
                    </div>

                </div>

                {{-- Jadwal Pelajaran --}}
                @php
                    $mapel = ['Matematika','Bahasa Inggris','Game Dev','IPA','IPS','Web Dev'];
                    $guru = ['Bu Siti','Pak Rudi','Pak Andi','Bu Nia','Bu Wati','Pak Budi'];
                    $durasi = 90*60;
                    $mulai = strtotime('07:00');
                    $hariList = ['Senin'=>5,'Selasa'=>6,'Rabu'=>5,'Kamis'=>5,'Jumat'=>2,'Sabtu'=>4];
                @endphp

                <div class="mt-8 space-y-6">
                    @foreach ($hariList as $hari => $jumlahPelajaran)
                        <div class="bg-white dark:bg-gray-800 shadow border dark:border-gray-700 rounded-lg p-5">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Jadwal Hari {{ $hari }}</h2>

                            <table class="w-full text-sm text-left text-white-500 dark:text-gray-400">
                                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th class="px-4 py-2">No</th>
                                        <th class="px-4 py-2">Mata Pelajaran</th>
                                        <th class="px-4 py-2">Guru Pengampu</th>
                                        <th class="px-4 py-2">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                                    @php $jam = $mulai; @endphp
                                    @for ($i = 0; $i < $jumlahPelajaran; $i++)
                                        @php
                                            $jam_selesai = $jam + $durasi;
                                            $waktu = date('H:i', $jam) . ' - ' . date('H:i', $jam_selesai);
                                            $jam = $jam_selesai;
                                        @endphp
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="px-4 py-2">{{ $i+1 }}</td>
                                            <td class="px-4 py-2">{{ $mapel[$i % count($mapel)] }}</td>
                                            <td class="px-4 py-2">{{ $guru[$i % count($guru)] }}</td>
                                            <td class="px-4 py-2">{{ $waktu }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

</x-admin.layout>
