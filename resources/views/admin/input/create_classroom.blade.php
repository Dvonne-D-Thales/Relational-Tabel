<form id="classroomForm" action="{{ route('admin.classrooms.store') }}" method="POST" class="space-y-4">
    @csrf
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Tambah Kelas Baru</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Nama Kelas</label>
            <input type="text" name="name" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <button type="submit"
            class="px-5 py-2.5 text-sm rounded-lg bg-blue-600 hover:bg-blue-700 text-white">
            Simpan
        </button>
    </div>
</form>
