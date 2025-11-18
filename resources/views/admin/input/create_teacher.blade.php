<form x-ref="teacherForm" action="{{ route('admin.teachers.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Nama --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
        <input type="text" id="name" name="name" required
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm">
    </div>

    {{-- Email --}}
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
        <input type="email" id="email" name="email"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm">
    </div>

    {{-- Mapel --}}
    <div>
        <label for="id_mapel" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran</label>
        <select id="id_mapel" name="id_mapel" required
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm">
            <option value="">-- Pilih Mapel --</option>
            @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Telepon --}}
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No. Telepon</label>
        <input type="text" id="phone" name="phone"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm">
    </div>

    {{-- Alamat --}}
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
        <textarea id="address" name="address" rows="3"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2.5 text-sm"></textarea>
    </div>

    {{-- Tombol Simpan --}}
    <div class="flex justify-end">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
            Simpan Guru
        </button>
    </div>
</form>
