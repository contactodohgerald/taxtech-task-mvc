<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Todo\TaskController;
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

Route::get('/', [Controller::class, 'welcomePage']);

Route::get('/dashboard', [Controller::class, 'dashboardPage'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->name('todo.')->group(function () {
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';
