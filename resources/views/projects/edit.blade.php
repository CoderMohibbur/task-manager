<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Project</h1>
    </x-slot>
    <div class="p-6 sm:ml-64">
        <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md">
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium">Project Name</label>
                    <input type="text" id="name" name="name" value="{{ $project->name }}"
                        class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-medium">Project Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ $project->description }}</textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('projects.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                        Update Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
