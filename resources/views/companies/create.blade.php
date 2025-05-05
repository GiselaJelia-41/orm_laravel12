@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add Company</h1>

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Create Company</button>
    </form>
</div>
@endsection
