@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Delete Skill</h1>

    <p class="text-sm mb-4">Are you sure you want to delete the skill "<strong>{{ $skill->name }}</strong>"?</p>

    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex space-x-4">
            <a href="{{ route('skills.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete Skill</button>
        </div>
    </form>
</div>
@endsection
