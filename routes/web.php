<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/test', function () {
    return "hello";
});

/*Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::delete('/task/{id}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');*/
Route::resource('/task', TaskController::class)->except('show');