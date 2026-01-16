<x-layout>
 <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            {{-- Card Login --}}
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 sm:p-8 border dark:border-gray-700">

                {{-- Judul --}}
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 text-center mb-2">
                    Login Admin
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
                    Silakan masuk untuk melanjutkan
                </p>

                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-700 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Form Login --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            required
                            autofocus
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Insert Email"
                        >
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Insert Password"
                        >
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <input type="checkbox" name="remember" class="mr-2 rounded">
                            Ingat saya
                        </label>
                    </div>

                    {{-- Tombol Login --}}
                    <button
                        type="submit"
                        class="w-full py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold transition"
                    >
                        Masuk
                    </button>
                </form>

                {{-- Footer --}}
                <p class="text-xs text-center text-gray-400 mt-6">
                    © {{ date('Y') }} Admin Panel
                </p>

            </div>
        </div>
    </section>

</x-admin.layout>
