<form x-ref="mapelForm" action="{{ route('admin.mapel.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Nama Mapel --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Mapel</label>
        <input type="text" id="name" name="name" required
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600
                   bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm">
    </div>

    {{-- Deskripsi --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
        <textarea id="description" name="description" rows="3"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600
                   bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm"></textarea>
    </div>

    {{-- Tombol Simpan --}}
    <div class="flex justify-end">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
            Simpan Mapel
        </button>
    </div>
</form>
