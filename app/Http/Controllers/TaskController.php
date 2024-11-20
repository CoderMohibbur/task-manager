<?php

// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    // TaskController.php

public function store(Request $request)
{
    // টাস্কের জন্য ভ্যালিডেশন
    $request->validate([
        'project_id' => 'required|exists:projects,id', // নিশ্চিত করুন যে প্রোজেক্ট আইডি প্রকৃত প্রোজেক্ট থেকে এসেছে
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:Low,Medium,High',
        'status' => 'required|in:pending,in_progress,completed',
    ]);

    // টাস্ক তৈরি করা
    Task::create([
        'project_id' => $request->project_id,
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'status' => $request->status,
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}





public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:Low,Medium,High',
        'status' => 'required|in:pending,in_progress,completed',
    ]);

    // Update the task with the new data
    $task->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'priority' => $request->input('priority'),
        'status' => $request->input('status'),
    ]);

    // Redirect back with success message
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}



    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
    }


}
