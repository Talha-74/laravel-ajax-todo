<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{id}', [TaskController::class, 'updateStatus'])->name('tasks.update');
// Ajax request for priority update
Route::post('/task/update-priority/{taskId}', [TaskController::class, 'updatePriority']);
// sorting route
Route::get('/tasks/sorted', [TaskController::class, 'sortedTasks'])->name('tasks.sorted');

