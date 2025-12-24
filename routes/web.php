<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rotas para Clientes
Route::resource('clientes', ClienteController::class);

// Rotas para Produtos
Route::resource('produtos', ProdutoController::class);
