<!-- resources/views/projects/create.blade.php -->

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
