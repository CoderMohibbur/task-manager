<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-semibold text-center text-gray-800 mb-6">Create New Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-8 rounded-lg shadow-xl max-w-lg mx-auto">
        @csrf

        <!-- Project Dropdown -->
        <div class="flex flex-col md:flex-row mb-4">
            <label for="project_id" class="text-white text-lg font-semibold md:w-1/3 mb-2 md:mb-0">Project</label>
            <select name="project_id" id="project_id" class="bg-white text-gray-700 rounded-lg w-full md:w-2/3 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Title Input -->
        <div class="flex flex-col md:flex-row mb-4">
            <label for="title" class="text-white text-lg font-semibold md:w-1/3 mb-2 md:mb-0">Task Title</label>
            <input type="text" name="title" id="title" class="bg-white text-gray-700 rounded-lg w-full md:w-2/3 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- Description Input -->
        <div class="flex flex-col md:flex-row mb-4">
            <label for="description" class="text-white text-lg font-semibold md:w-1/3 mb-2 md:mb-0">Description</label>
            <textarea name="description" id="description" rows="4" class="bg-white text-gray-700 rounded-lg w-full md:w-2/3 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <!-- Priority Dropdown -->
        <div class="flex flex-col md:flex-row mb-4">
            <label for="priority" class="text-white text-lg font-semibold md:w-1/3 mb-2 md:mb-0">Priority</label>
            <select name="priority" id="priority" class="bg-white text-gray-700 rounded-lg w-full md:w-2/3 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <!-- Status Dropdown -->
        <div class="flex flex-col md:flex-row mb-6">
            <label for="status" class="text-white text-lg font-semibold md:w-1/3 mb-2 md:mb-0">Status</label>
            <select name="status" id="status" class="bg-white text-gray-700 rounded-lg w-full md:w-2/3 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 transition duration-300">
                Create Task
            </button>
        </div>
    </form>
</div>
@endsection
