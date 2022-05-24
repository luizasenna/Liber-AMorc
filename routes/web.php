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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/livros',LivrosController::class);
Route::resource('/autores', AutoresController::class);
/*Route::controller(AutoresController::class)->group(function(){
    Route::group(['prefix' => '/autores'], function(){
        Route::get('', 'index')->name('autores.index');
        Route::get('/{autor}/edit', 'index')->name('autores.edit');
        Route::post('/store', 'store')->name('autores.store');
        Route::post('/create', 'create')->name('autores.create');
        Route::post('/{autor}/update', 'update')->name('autores.update');
        Route::post('/{autor}/destroy', 'destroy')->name('autores.destroy');
    });
});*/
Route::resource('/membros', MembrosController::class);
Route::resource('/editoras', EditorasController::class);
Route::resource('/emprestimos', EmprestimosController::class);