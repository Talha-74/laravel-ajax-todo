<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::Paginate('5');
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

public function updatePriority($taskId)
{
    $task = Task::find($taskId);

    if ($task) {
        $task->priority = $task->priority == 1 ? 0 : 1;
        $task->save();

        return response()->json(['priority' => $task->priority]);
    }

    return response()->json(['error' => 'Task not found.'], 404);
}



// Update Task Status (Completed/Incomplete)
    public function updateStatus($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            if ($task->completed) {
                $task->completed = 0;
            } else {
                $task->completed = 1;
            }
            $task->save();
        }
        return back();
    }


}
