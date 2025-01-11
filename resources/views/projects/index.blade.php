<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white"> {{ __('Task Management') }} </h1>
    </x-slot>
    <div class="p-6 sm:ml-64">
        <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md">
            <div class="container mx-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Projects</h2>
                    <a href="{{ route('projects.create') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Create New Project
                    </a>
                </div>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($projects as $project)
                        <li class="py-4 flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ $project->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project->description }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
