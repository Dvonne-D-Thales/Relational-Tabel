<x-admin.layout>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                <div x-data="{ openAddModal: false }">
                    {{-- ✅ Header --}}
                    <div class="flex justify-between items-center p-4">
                        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Daftar Guru</h1>
                        <button @click="openAddModal = true"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2">
                            + Tambah Guru
                        </button>
                    </div>

                    {{-- ✅ Modal Tambah Guru --}}
                    <div x-show="openAddModal" x-cloak x-transition.opacity.duration.300ms
                        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                        <div x-show="openAddModal" x-transition.scale.origin.center.duration.300ms
                            @click.away="
                                openAddModal = false;
                                $refs.teacherForm.reset();
                            "
                            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
                            <button
                                @click="
                                    openAddModal = false;
                                    $refs.teacherForm.reset();
                                "
                                class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">
                                ✕
                            </button>

                            {{-- Form Tambah Guru --}}
                            @include('admin.input.create_teacher', ['mapels' => $mapels])
                        </div>
                    </div>

                    {{-- ✅ Tabel Guru --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Mapel</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Telepon</th>
                                    <th class="px-4 py-3">Alamat</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachers as $teacher)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $teacher->name }}</td>
                                        <td class="px-4 py-3">{{ $teacher->mapel->name ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $teacher->email ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $teacher->phone ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $teacher->address ?? '-' }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-400">Belum ada data guru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ Pagination --}}
                    <div class="p-4">
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ✅ Tambahkan Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</x-admin.layout>
