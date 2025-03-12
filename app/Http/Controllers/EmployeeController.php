<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employees = Employee::with('tasks')->get();

            if (!$employees) {
                return new PostResource(false, 'Employee data not found', []);
            }

            return new PostResource(true, 'Employee data Found', $employees);

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
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $employee = Employee::create($validated);

        return new PostResource(true, 'Data Employee Berhasil Ditambahkan!', $employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with('tasks')->find($id);

        if (!$employee) {
            return new PostResource(false, 'Employee data not found', []);
        }

        return new PostResource(true, 'Employee data found', $employee);
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
