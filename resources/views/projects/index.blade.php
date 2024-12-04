<!-- resources/views/projects/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white">
            {{ __(' Projects') }}
        </h1>
    </x-slot>
<h1>All Projects</h1>

<a href="{{ route('projects.create') }}">Create New Project</a>

<ul>
    @foreach($projects as $project)
        <li>{{ $project->name }} - {{ $project->description }}</li>
    @endforeach
</ul>
</x-app-layout>
