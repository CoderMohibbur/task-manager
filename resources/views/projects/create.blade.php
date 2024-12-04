<!-- resources/views/projects/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-gray-900 dark:text-white">
            {{ __('Projects/Create') }}
        </h1>
    </x-slot>
  <form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Project Name</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="description">Project Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <button type="submit">Create Project</button>
    </div>
 </form>
</x-app-layout>
