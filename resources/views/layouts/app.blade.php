<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Management</title>
    @vite('resources/js/app.js') <!-- hanya js, karena js sudah import css -->

</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold">Company Management</div>
            <div class="space-x-4">
                <a href="{{ route('companies.index') }}" class="text-blue-600 hover:underline">Companies</a>
                <a href="{{ route('employees.index') }}" class="text-blue-600 hover:underline">Employees</a>
                <a href="{{ route('skills.index') }}" class="text-blue-600 hover:underline">Skills</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
