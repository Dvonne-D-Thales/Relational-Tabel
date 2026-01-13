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

                <div x-data="{ openAddModal: false }">
                    <div class="flex justify-between items-center p-4">
                        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Daftar Kelas</h1>
                        <button @click="openAddModal = true"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2">
                            + Tambah Kelas
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

                            {{-- ✅ Include form tambah wali --}}
                            @include('admin.input.create_classroom')
                        </div>
                    </div>

                    {{-- TABEL DATA --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-700 rounded-lg overflow-hidden">
                            <thead class="bg-blue-700 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">No</th>
                                    <th class="px-4 py-2 text-left">Nama Kelas</th>
                                    <th class="px-4 py-2 text-left">Jumlah Siswa</th>
                                    <th class="px-4 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray-900 text-white">
                                @forelse ($classrooms as $index => $c)
                                    <tr class="border-b border-gray-700 hover:bg-gray-600 transition">
                                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2">{{ $c->name }}</td>
                                        <td class="px-4 py-2">{{ $c->students_count }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <a href="{{ route('admin.classrooms.edit', $c->id) }}"
                                                class="text-blue-300 hover:text-blue-400 font-medium">Edit</a>
                                            <form action="{{ route('admin.classrooms.destroy', $c->id) }}"
                                                method="POST" class="inline">
                                                {{-- Cross-Site Request Forgery --}}
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3 text-gray-300">Belum ada data kelas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ Pagination --}}
                    <div class="p-4">
                        {{ $classrooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ✅ Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</x-admin.layout>
