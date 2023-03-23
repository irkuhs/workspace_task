<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//workspace
Route::post('/workspace/store', [App\Http\Controllers\WorkspaceController::class, 'store'])->name('workspace.store');

//task
Route::get('/task/show', [App\Http\Controllers\TaskController::class, 'show'])->name('task.show');
Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
