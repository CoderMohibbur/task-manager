<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Filter Inputs
        $status = $request->input('status');
        $priority = $request->input('priority');
        $search = $request->input('search');

        // Query
        $tasks = Task::query();

        if ($status) {
            $tasks->where('status', $status);
        }

        if ($priority) {
            $tasks->where('priority', $priority);
        }

        if ($search) {
            $tasks->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Get all tasks and separate the completed ones
        $tasks = $tasks->get();
        $completedTasks = $tasks->where('status', 'Completed');
        $pendingAndInProgressTasks = $tasks->whereNotIn('status', ['Completed']);

        return view('tasks.index', compact('pendingAndInProgressTasks', 'completedTasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx,zip|max:10240',  // ফাইল সাইজ ও টাইপ চেক করুন
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->priority = $request->priority;
        $task->status = $request->status;

        // ফাইল আপলোডের জন্য
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('task_files', 'public');  // 'public' ড্রাইভে ফাইল স্টোর করুন
            $task->file = $filePath;
        }

        $task->save();

        return redirect()->route('tasks.index');
    }


    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        // Update status
        $task->update([
            'status' => $request->status
        ]);

        return redirect()->route('tasks.index');
    }

    // In the TaskController
public function checkIn($id)
{
    $task = Task::findOrFail($id);
    $task->check_in_time = now();
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Checked in successfully');
}

public function checkOut($id)
{
    $task = Task::findOrFail($id);
    $task->check_out_time = now();
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Checked out successfully');
}

public function completeTask($id)
{
    $task = Task::find($id);

    if (!$task) {
        return redirect()->route('tasks.index')->with('error', 'Task not found.');
    }

    $task->status = 'Completed';
    $task->completed_at = now(); // Current time store
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
}

public function edit($id)
{
    $task = Task::findOrFail($id); // টাস্ক খুঁজে বের করুন
    return view('tasks.edit', compact('task')); // টাস্ক সম্পাদনা করার ভিউ পাঠান
}

public function destroy($id)
{
    $task = Task::findOrFail($id); // টাস্ক খুঁজে বের করুন
    $task->delete(); // ডিলিট করুন

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully'); // রিডাইরেক্ট করুন
}




}
