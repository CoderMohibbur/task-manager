<?php

// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // প্রোজেক্ট তৈরি করার ফর্ম দেখানোর জন্য
    public function create()
    {
        return view('projects.create');
    }

    // প্রোজেক্ট তৈরি করার জন্য
    public function store(Request $request)
    {
        // ভ্যালিডেশন
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // প্রোজেক্ট ইনসার্ট করা
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    // প্রোজেক্টের লিস্ট দেখানোর জন্য
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function show($id)
    {
        // প্রজেক্টটি খুঁজে বের করুন
        $project = Project::findOrFail($id);

        // প্রজেক্ট ডিটেইল পেজে পাঠানো
        return view('projects.show', compact('project'));
    }
}
