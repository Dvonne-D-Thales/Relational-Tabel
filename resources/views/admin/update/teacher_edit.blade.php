<x-admin.layout>
    <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">
            Edit Guru
        </h1>

        <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Nama Guru</label>
                    <input type="text" name="name" value="{{ old('name', $teacher->name) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" value="{{ old('email', $teacher->email) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $teacher->address) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Pilih Mapel</label>
                    <select name="id_mapel"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                        @foreach ($mapels as $m)
                            <option value="{{ $m->id }}" {{ $m->id == $teacher->id_mapel ? 'selected' : '' }}>
                                {{ $m->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.teachers.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-admin.layout>
