<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::Paginate('20');
        return view('tasks.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        $task = Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}
