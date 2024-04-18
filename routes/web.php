<?php

use App\Http\Controllers\TasksController;

Route::resource('tasks', TasksController::class);

// トップページをタスク一覧に設定
Route::redirect('/', '/tasks');
Route::get('/', [TasksController::class, 'index']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
