<?php

namespace App\Service;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use App\Contracts\InterfaceTask;

class TaskService implements InterfaceTask
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function createTask($validated)  
    {
        $task = Task::create($validated);
        return $task;
    }
    public function getTasks(){
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks
        ]);
    }
    public function getLastTask(){
        $task = Task::latest()->first();
        return response()->json([
            'task' => $task
        ]);
    }
    public function editTask( Task $id)
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
