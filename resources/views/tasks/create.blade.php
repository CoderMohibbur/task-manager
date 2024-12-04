<x-app-layout>
    <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white">
            {{ __('Create Task') }}
        </h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto">
                <div class="container mx-auto">
                    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" grid gap-6 grid-cols-2">
                            <!-- Task Title Input -->
                            <div class="">
                                <label for="title" class="block text-gray-700 dark:text-gray-300">Task Title</label>
                                <input type="text" name="title" id="title"
                                    class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"
                                    placeholder="Enter Task Title" required>
                            </div>

                            <!-- Task Description Input -->
                            <div class="">
                                <label for="description"
                                    class="block text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description"
                                    class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"
                                    placeholder="Enter Task Description" required></textarea>
                            </div>

                            <!-- Select Project -->
                            <div class="">
                                <label for="project_id" class="block text-gray-700 dark:text-gray-300">Select
                                    Project</label>
                                <select name="project_id" id="project_id"
                                    class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"
                                    required>
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Priority Select -->
                            <div class="">
                                <label for="priority" class="block text-gray-700 dark:text-gray-300">Priority</label>
                                <select name="priority" id="priority"
                                    class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"
                                    required>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>

                            <!-- Status Select -->
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 dark:text-gray-300">Status</label>
                                <select name="status" id="status"
                                    class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"
                                    required>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>
                         <!-- Submit Button -->
                         <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
