<!-- resources/views/projects/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Project Details</h2>

    <div class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 p-8 rounded-lg shadow-xl">
        <h3 class="text-3xl font-semibold mb-4">{{ $project->name }}</h3>
        <p class="text-xl mb-2"><strong>Description:</strong> {{ $project->description }}</p>

        <!-- অন্যান্য প্রজেক্টের তথ্য দেখান, যেমন তারিখ, স্ট্যাটাস ইত্যাদি -->
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Created At:</strong> {{ $project->created_at->format('d-m-Y') }}</p>
        <p><strong>Updated At:</strong> {{ $project->updated_at->format('d-m-Y') }}</p>
    </div>

    <a href="{{ route('projects.index') }}" class="mt-5 text-blue-500 hover:underline">Back to Projects List</a>
</div>
@endsection
