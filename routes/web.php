<?php

use App\Http\Controllers\AutoresController as AutoresControllerAlias;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/livros',LivrosController::class);
Route::resource('/autores', AutoresControllerAlias::class);
Route::resource('/membros', MembrosController::class);
Route::resource('/editoras', EditorasController::class);
Route::resource('/emprestimos', EmprestimosController::class);