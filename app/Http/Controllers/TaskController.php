<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::id();
        $date = Carbon::parse($request->input('task_date'))->toDateString();

        $query =  Task::where('user_id', $userId)
            ->whereDate('task_date', $date)
            ->orderBy('created_at', 'desc');


        $tasks = $query->get();

        return response()->json($tasks);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:500',
            'task_date' => 'required|date',
        ]);

        $user = Auth::user();

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'task_date' => $validated['task_date'],
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Task created with success',
            'task' => $task,
        ], 201);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $existingTask = Task::find($id);

        if ($existingTask) {
            $existingTask->completed = $request->task['completed'] ? true : false;
            $existingTask->updated_at = Carbon::now();
            $existingTask->save();
            return $existingTask;
        }
        return "Task not found";
    }


    public function destroy($id)
    {
        $existingTask = Task::find($id);
        if ($existingTask) {
            $existingTask->delete();
            return "Task deleted";
        }
        return "Task not found";
    }
}
