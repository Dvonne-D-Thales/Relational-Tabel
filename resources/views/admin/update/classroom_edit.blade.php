<x-admin.layout>
    <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md max-w-xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">
            Edit Classroom
        </h1>

        <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama Kelas --}}
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300">Nama Kelas</label>
                <input type="text" name="name"
                    value="{{ old('name', $classroom->name) }}"
                    class="w-full rounded-lg px-4 py-2 border dark:bg-gray-700 dark:text-white">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between pt-4">
                <a href="{{ route('admin.classrooms.index') }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                    Batal
                </a>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-admin.layout>
