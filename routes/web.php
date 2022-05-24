<?php

use App\Http\Controllers\AutoresController;
use App\Http\Controllers\EditorasController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\MembrosController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/livros',LivrosController::class);
    Route::resource('/autores', AutoresController::class)->except('show');
    Route::resource('/membros', MembrosController::class)->except('show');
    Route::resource('/editoras', EditorasController::class)->except('show');
    Route::resource('/emprestimos', EmprestimosController::class)->except('show');
});