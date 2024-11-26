@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Task List</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    <!-- Filter and Search Form -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="row">
            <!-- Status Filter -->
            <div class="col-md-3">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Priority Filter -->
            <div class="col-md-3">
                <label for="priority">Filter by Priority:</label>
                <select name="priority" id="priority" class="form-control">
                    <option value="">All</option>
                    <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <!-- Search -->
            <div class="col-md-4">
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search by title or description" value="{{ request('search') }}">
            </div>

            <!-- Submit Button -->
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>

    <!-- Pending & In Progress Tasks -->
    <h3>Pending & In Progress Tasks</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Actions</th>
                <th>Project</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingAndInProgressTasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <!-- Status Dropdown -->
                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" id="status-form-{{ $task->id }}">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-control" id="status-select-{{ $task->id }}" onchange="submitStatusForm({{ $task->id }})">
                            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </form>

                </td>
                <td>{{ $task->priority }}</td>
                <td>
                    <!-- Check-In and Check-Out Buttons Here -->
                    @if (is_null($task->check_in_time))
                        <form action="{{ route('tasks.checkIn', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Check In</button>
                        </form>
                    @else
                        <span>Checked In at: {{ $task->check_in_time }}</span>
                    @endif

                    @if (is_null($task->check_out_time) && !is_null($task->check_in_time))
                        <form action="{{ route('tasks.checkOut', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">Check Out</button>
                        </form>
                    @elseif (!is_null($task->check_out_time))
                        <span>Checked Out at: {{ $task->check_out_time }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('projects.show', $task->project->id) }}" class="text-decoration-none text-primary">
                        {{ $task->project ? $task->project->name : 'No Project' }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Completed Tasks -->
    <h3>Completed Tasks</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completedTasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ ucfirst($task->status) }}</td>
                <td>
                    <a href="{{ route('projects.show', $task->project->id) }}" class="text-decoration-none text-primary">
                        {{ $task->project ? $task->project->name : 'No Project' }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<script>
    function submitStatusForm(taskId) {
        document.getElementById('status-form-' + taskId).submit();
    }
</script>
