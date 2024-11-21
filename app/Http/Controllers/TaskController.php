<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Http\JsonResponse;
use App\Service\TaskService;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateTaskRequest $request):JsonResponse
    {   
        $validated = $request->validated();
        $result = $this->taskService->createTask($validated);
        return response()->json([
            'message' => 'Task created succesfully',
            'task' => $result,
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
