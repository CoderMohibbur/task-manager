<x-app-layout>
    <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white">
            {{ __('Task Management') }}
        </h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto">
                <a href="{{ route('tasks.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg mb-4">Create New Task</a>

                <!-- Filter and Search Form -->
                <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Status Filter -->
                        <div>
                            <label for="status" class="block text-gray-700 dark:text-gray-400">Filter by Status:</label>
                            <select name="status" id="status" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                <option value="">All</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Priority Filter -->
                        <div>
                            <label for="priority" class="block text-gray-700 dark:text-gray-400">Filter by Priority:</label>
                            <select name="priority" id="priority" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                <option value="">All</option>
                                <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>

                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-gray-700 dark:text-gray-400">Search:</label>
                            <input type="text" name="search" id="search" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300" placeholder="Search by title or description" value="{{ request('search') }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg">Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Pending & In Progress Tasks -->
                <h3 class="text-xl mb-4 text-gray-900 dark:text-gray-100">Pending & In Progress Tasks</h3>
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr class="border border-gray-300 md:border-none md:border-gray-300">
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Title</th>
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Description</th>
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Status</th>
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Priority</th>
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Actions</th>
                            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Project</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($pendingAndInProgressTasks as $task)
                            <tr class="border border-gray-300 md:border-none md:border-gray-300">
                                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->description }}</td>
                                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">
                                    <!-- Status Dropdown -->
                                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" id="status-form-{{ $task->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300" id="status-select-{{ $task->id }}" onchange="submitStatusForm({{ $task->id }})">
                                            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->priority }}</td>
                                <td class="block md:table-cell p-2">
                                    <!-- Check-In and Check-Out Buttons Here -->
                                    @if (is_null($task->check_in_time))
                                        <form action="{{ route('tasks.checkIn', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-500 text-white py-1 px-2 rounded-lg text-sm">Check In</button>
                                        </form>
                                    @else
                                        <span class="text-gray-700 dark:text-gray-300">Checked In: {{ $task->check_in_time }}</span>
                                    @endif
                                        <br>
                                    @if (is_null($task->check_out_time) && !is_null($task->check_in_time))
                                        <form action="{{ route('tasks.checkOut', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded-lg text-sm">Check Out</button>
                                        </form>
                                    @elseif (!is_null($task->check_out_time))
                                        <span class="text-gray-700 dark:text-gray-300">Checked Out: {{ $task->check_out_time }}</span>
                                    @endif
                                </td>
                                <td class="block md:table-cell p-2">
                                    <a href="{{ route('projects.show', $task->project->id) }}" class="text-blue-500 hover:text-blue-700">
                                        {{ $task->project ? $task->project->name : 'No Project' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Completed Tasks -->
<h3 class="text-xl mb-4 text-gray-900 dark:text-gray-100">Completed Tasks</h3>
<table class="min-w-full border-collapse block md:table">
    <thead class="block md:table-header-group">
        <tr class="border border-gray-300 md:border-none md:border-gray-300">
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">#</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Title</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Description</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Priority</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Status</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Project</th>
            <th class="block md:table-cell p-2 text-left text-gray-900 dark:text-gray-100">Actions</th>
        </tr>
    </thead>
    <tbody class="block md:table-row-group">
        @foreach ($completedTasks as $task)
            <tr class="border border-gray-300 md:border-none md:border-gray-300">
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->id }}</td>
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->description }}</td>
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ $task->priority }}</td>
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">{{ ucfirst($task->status) }}</td>
                <td class="block md:table-cell p-2 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('projects.show', $task->project->id) }}" class="text-blue-500 hover:text-blue-700">
                        {{ $task->project ? $task->project->name : 'No Project' }}
                    </a>
                </td>
                <td class="block md:table-cell p-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded-lg text-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded-lg text-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function submitStatusForm(taskId) {
        document.getElementById('status-form-' + taskId).submit();
    }
</script>

</x-app-layout>
