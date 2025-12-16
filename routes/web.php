<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('layouts.app');
});

// Rotas para Clientes
Route::resource('clientes', ClienteController::class);

// Rotas para Produtos
Route::resource('produtos', ProdutoController::class);

// Rotas de formulários (mantidas para compatibilidade)
Route::resource('clientes', ClienteController::class);
Route::resource('produtos', ProdutoController::class);
