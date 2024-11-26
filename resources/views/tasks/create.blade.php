@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-semibold text-center text-gray-800 mb-6">Create New Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Task Title Input -->
        <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Task Title" required>
        </div>

        <!-- Task Description Input -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Task Description" required></textarea>
        </div>

        <!-- Select Project -->
        <div class="form-group">
            <label for="project_id">Select Project</label>
            <select name="project_id" class="form-control" id="project_id" required>
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Priority Select -->
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control" id="priority" required>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>

        <!-- Status Select -->
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
@endsection
