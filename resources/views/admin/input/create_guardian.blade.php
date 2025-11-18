<form id="guardianForm" action="{{ route('admin.guardians.store') }}" method="POST" class="space-y-4">
    @csrf
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Tambah Data Wali</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Nama Wali</label>
            <input type="text" name="name" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Pekerjaan</label>
            <input type="text" name="job" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Telepon</label>
            <input type="text" name="phone" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div class="col-span-2">
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Alamat</label>
            <input type="text" name="address" required
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>
    </div>

    <div class="flex justify-end gap-2 mt-4">
        <button type="button" @click="$root.openAddModal = false"
            class="px-5 py-2.5 text-sm rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
            Batal
        </button>
        <button type="submit"
            class="px-5 py-2.5 text-sm rounded-lg bg-blue-600 hover:bg-blue-700 text-white">
            Simpan
        </button>
    </div>
</form>
