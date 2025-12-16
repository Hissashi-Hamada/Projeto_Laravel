<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('home');
});

// Rotas para Clientes
Route::resource('clientes', ClienteController::class);

// Rotas para Produtos
Route::resource('produtos', ProdutoController::class);

// Rotas de formulários (mantidas para compatibilidade)
Route::view('/form/cliente', 'form_cliente');
Route::view('/form/produto', 'form_produto');