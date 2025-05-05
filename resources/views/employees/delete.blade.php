@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Delete Employee</h1>

    <p class="mb-4">Are you sure you want to delete the employee "<strong>{{ $employee->name }}</strong>"?</p>

    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Yes, Delete</button>
        <a href="{{ route('employees.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
    </form>
</div>
@endsection
