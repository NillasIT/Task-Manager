<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/", [TaskController::class,"index"])->name("task.index");
Route::get('/create', [TaskController::class,'create'])->name('task.create');
Route::post('/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/edit/{task}', [TaskController::class,'edit'])->name('task.edit');
Route::put('/update/{task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
