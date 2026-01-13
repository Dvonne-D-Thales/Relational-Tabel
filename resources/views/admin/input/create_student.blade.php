<form x-ref="formAddStudent" action="{{ route('admin.students.store') }}" method="POST" class="space-y-4">
    @csrf
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div>
            <label for="name" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                Lengkap</label>
            <input type="text" id="name" name="name"
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" name="email"
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label for="classroom_id"
                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Kelas</label>
            <select id="classroom_id" name="classroom_id"
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
               bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
                <option value="" disabled selected>Pilih kelas</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="birthday" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                Lahir</label>
            <input type="date" id="birthday" name="birthday"
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label for="address" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
            <input type="text" id="address" name="address"
                class="border border-gray-300 dark:border-gray-600 text-sm rounded-lg w-full p-2.5
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
            Tambah Siswa
        </button>
    </div>
</form>
