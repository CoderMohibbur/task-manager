<x-app-layout>
    <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white">
            {{ __('Create Project') }}
        </h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300">Project Name</label>
                    <input type="text" name="name" id="name" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300">Project Description</label>
                    <textarea name="description" id="description" class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300"></textarea>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
