<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('todo-list', [TodoController::class, 'index']);

Route::get('add-todo', [TodoController::class, 'addTodo']);

Route::post('save-todo', [TodoController::class, 'saveTodo']);

Route::get('edit-todo/{id}', [TodoController::class, 'editTodo']);

Route::post('update-todo', [TodoController::class, 'updateTodo']);

Route::get('delete-todo/{id}', [TodoController::class, 'deleteTodo']);