@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Companies</h1>

    <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Company</a>

    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">#</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td class="border px-4 py-2">{{ $company->id }}</td>
                    <td class="border px-4 py-2">{{ $company->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('companies.edit', $company->id) }}" class="text-indigo-600">Edit</a> |
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
