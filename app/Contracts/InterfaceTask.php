<?php

namespace App\Contracts;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
interface InterfaceTask
{
    public function createTask($validated);
    public function getTasks();
    public function getLastTask();
    public function editTask(Task $id);
    public function deleteTask(Task $id);
    public function completeTask( Task $id);
}
