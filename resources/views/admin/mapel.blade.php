<x-admin.layout>

    {{-- Sembunyikan elemen sebelum Alpine aktif --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                {{-- ✅ Inisialisasi Alpine --}}
                <div x-data="{ openAddModal: false }">

                    {{-- ✅ Header --}}
                    <div class="flex justify-between items-center p-4">
                        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Daftar Mata Pelajaran</h1>
                        <button @click="openAddModal = true"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2">
                            + Tambah Mapel
                        </button>
                    </div>

                    {{-- ✅ Modal Create --}}
                    <div x-show="openAddModal" x-transition.opacity.duration.300ms x-cloak
                        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

                        <div x-show="openAddModal" x-transition.scale.origin.center.duration.300ms
                            @click.away="openAddModal = false"
                            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">

                            {{-- Tombol Tutup --}}
                            <button @click="openAddModal = false"
                                class="absolute top-2 right-3 text-gray-400 hover:text-gray-600 dark:text-gray-300 dark:hover:text-white text-xl">
                                ✕
                            </button>

                            {{-- ✅ Include form tambah mapel --}}
                            @include('admin.input.create_mapel')
                        </div>
                    </div>

                    {{-- ✅ Tabel Data --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Deskripsi</th>
                                    <th class="px-4 py-3">Guru</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mapel as $m)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $m->name }}</td>
                                        <td class="px-4 py-3">{{ $m->description ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $m->teacher?->name ?? '-' }}</td>
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('admin.mapel.edit', $m->id) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                            <form action="{{ route('admin.mapel.destroy', $m->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus mapel ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-gray-400">Belum ada data mapel.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ Pagination --}}
                    <div class="p-4">
                        {{ $mapel->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ✅ Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</x-admin.layout>
