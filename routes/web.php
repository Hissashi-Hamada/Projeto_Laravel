<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rotas para Clientes
Route::resource('clientes', ClienteController::class);

// Rotas para Produtos
Route::resource('produtos', ProdutoController::class);

Route::resource('login',LoginController::class);


Route::resource('cadastro', CadastroController::class);

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');