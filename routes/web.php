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
Route::get('/workspace/show/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'show'])->name('workspace.show');

//task
Route::get('/task/create/{workspace}', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
Route::post('/task/store/{workspace}', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
