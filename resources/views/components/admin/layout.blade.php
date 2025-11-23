@props(['title' => 'Admin Panel'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>

</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">

    <x-admin.navbar />

    <x-admin.sidebar />

    <main class="p-4 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>

</body>
</html>
