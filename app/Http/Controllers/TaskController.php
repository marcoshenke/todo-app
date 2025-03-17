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
        $query = Task::orderBy('created_at', 'desc');

        $userId = Auth::user()->id;

        $query->where('user_id', $userId);

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('description')) {
            $query->where('description', 'like', '%' . $request->input('description') . '%');
        }

        if ($request->filled('task_date')) {
            $query->whereDate('task_date', $request->input('task_date'));
        }

        return $query->get();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:500',
            'task_date' => 'required|date',
        ]);

        $user = Auth::user();
        Log::debug('Usuário autenticado:', ['user' => $user]);
        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'task_date' => Carbon::parse($validated['task_date']),
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
