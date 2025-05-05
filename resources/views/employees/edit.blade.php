@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Company</label>
            <select name="company_id" class="w-full border px-3 py-2 rounded" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Skills</label>
            <select name="skills[]" multiple class="w-full border px-3 py-2 rounded">
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}"
                        {{ $employee->skills->contains($skill->id) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-500">Tekan Ctrl (Cmd di Mac) untuk pilih lebih dari satu.</small>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
