<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\AluguelController;

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

Route::get('contatos/buscar/ns',[ContatosController::class,'buscar']);
Route::resource('contatos',ContatosController::class);

Route::resource('carros',CarrosController::class);

Route::resource('aluguel',AluguelController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
