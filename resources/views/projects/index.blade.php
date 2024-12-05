<x-app-layout> <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white"> {{ __('Task Management') }} </h1>
    </x-slot>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto"> <a href="{{ route('projects.create') }}"
                    class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg mb-4">Create New Project</a>
                <ul class="list-disc pl-6 space-y-2">
                    @foreach ($projects as $project)
                        <li class="text-gray-900 dark:text-gray-300">{{ $project->name }} - {{ $project->description }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>