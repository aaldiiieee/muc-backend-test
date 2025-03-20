<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

Route::get('/employees/get-employees', [EmployeeController::class, 'index']);
Route::get('/employees/get-employee/{id}', [EmployeeController::class, 'show']);
Route::post('/employees/add-employee', [EmployeeController::class, 'store']);

Route::get('/tasks/get-tasks', [TaskController::class, 'index']);
Route::post('/tasks/add-task', [TaskController::class, 'store']);
Route::delete('/tasks/delete-task/{id}', [TaskController::class, 'destroy']);