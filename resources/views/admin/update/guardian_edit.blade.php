<x-admin.layout>
    <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">
            Edit Wali Murid
        </h1>

        <form action="{{ route('admin.guardians.update', $guardian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $guardian->name) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                    <input type="text" name="job" value="{{ old('job', $guardian->job) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $guardian->phone) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" value="{{ old('email', $guardian->email) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $guardian->address) }}"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.guardians.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-admin.layout>
