<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
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

Route::get('/', [todoController::class, 'index']);
Route::get('/tdListCreate', [todoController::class, 'create']);
Route::post('/create', [todoController::class, 'createDB']);
Route::get('/details/{id}', [todoController::class, 'details']);
Route::delete('/details/{id}', [todoController::class, 'destroy']);
Route::post('/update/{id}', [todoController::class, 'updateDB']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
