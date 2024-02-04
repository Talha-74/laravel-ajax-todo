<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::Paginate('5');
        return view('tasks.index')->with($data);
    }
    public function store(TaskRequest $request) {
        $request->validated();

        try {
            DB::beginTransaction();

            Task::create($request->all());

            DB::commit();
            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception("Error processing operations: " . $th->getMessage());
        }
    }

    // Update Task Priority Asynchronously
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

   public function sortedTasks() {
    $data['tasks'] = Task::orderBy('priority', 'desc')->paginate('7');
    return view('tasks.index')->with($data);
}

}
