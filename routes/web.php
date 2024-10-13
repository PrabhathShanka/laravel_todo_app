<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/crate', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::get('/{todo_id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/{todo_id}', [TodoController::class, 'update'])->name('todo.update');
Route::get('/delete/{todo_id}', [TodoController::class, 'delete'])->name('todo.delete');
