@extends('layouts.app') <!-- যদি app লেআউট থাকে -->

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <div>
            <label for="priority">Priority:</label>
            <select id="priority" name="priority">
                <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit">Update Task</button>
    </form>

</div>
@endsection
