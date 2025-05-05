@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Employee Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $employee->name) }}" required class="mt-1 block w-full">
        </div>

        <div class="mt-4">
            <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
            <select id="company_id" name="company_id" required class="mt-1 block w-full">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Update Employee</button>
    </form>
</div>
@endsection
