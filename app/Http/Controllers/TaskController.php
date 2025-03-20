<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks = Task::all();
            if (!$tasks) {
                return new PostResource(false, 'Task data not found', []);
            }
            return new PostResource(true, 'Task data Found', $tasks);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employees_id' => 'required|exists:employees,id',
            'task_name' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task = Task::create($validated);
        return new PostResource(true, 'Data Task Berhasil Ditambahkan!', $task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil dihapus',
            'task' => $task
        ], 200);
    }
}
