<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [UserController::class, 'get'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/people', [UserController::class, 'criar'])->name('criar');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/people/{id}', [UserController::class, 'getEditar'])->name('people');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/people/excluir', [UserController::class, 'excluir'])->name('excluir');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/people/editar', [UserController::class, 'setEditar'])->name('setEditar');
