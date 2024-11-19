<?php

namespace App\Service;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\JsonResponse;
use App\Contracts\InterfaceTask;

class TaskService implements InterfaceTask
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }
    public function createTask(TaskRequest $request)
    {
        $validated = $request->validated();
        Task::create($validated);
    }
    public function getTasks(): JsonResponse{
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks
        ]);
    }
    public function getLastTask(): JsonResponse{
        $task = Task::latest()->first();
        return response()->json([
            'task' => $task
        ]);
    }
    public function editTask(TaskRequest $request, Task $id)
    {
        $validated = $request->validated();
        $id->update($validated);
    }
    public function deleteTask(Task $id)
    {
        $id->delete();
    }
     public function completeTask(Task $id)
     {
        $id->update(['status' => true]);
     }
}
