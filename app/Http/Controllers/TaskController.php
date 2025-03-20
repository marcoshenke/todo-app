<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends BaseController
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $date = Carbon::parse($request->input('task_date'))->toDateString();

        $tasks =  Task::where('user_id', $userId)
            ->whereDate('task_date', $date)
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->successResponse($tasks, 'Tasks retrieved successfully');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'sometimes|max:500',
            'task_date' => 'required|date',
        ]);

        $user = Auth::user();

        $task =  Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'task_date' => $validated['task_date'],
            'user_id' => $user->id,
        ]);

        return $this->successResponse($task, 'Task created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $existingTask = Task::find($id);

        if ($existingTask->user_id !== Auth::id()) {
            return $this->errorResponse('Access denied or task not found', 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string|max:1000',
            'completed' => 'sometimes|boolean',
            'task_date' => 'sometimes|date',
        ]);

        $existingTask->update($validated);

        return $this->successResponse($existingTask, 'Task updated successfully');
    }

    public function destroy($id)
    {
        $existingTask = Task::find($id);
        if ($existingTask->user_id !== Auth::id()) {
            return $this->errorResponse('Access denied or task not found', 403);
        }

        if ($existingTask) {
            $existingTask->delete();

            return response()->json([
                'message' => 'Task deleted with success',
            ], 200);
        }

        return $this->successResponse(null, 'Task deleted successfully');
    }
}
