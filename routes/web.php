<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeLogsController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [TimeLogsController::class, 'index'])->name('dashboard');
    Route::get('/timelogs', [TimeLogsController::class, 'add']);
    Route::post('/timelogs', [TimeLogsController::class, 'create']);

    Route::get('/timelogs/{timelog}', [TimeLogsController::class, 'edit']);
    Route::post('/timelogs/{timelog}', [TimeLogsController::class, 'update']);
});
