<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

// Página inicial
Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/register', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Cadastro
Route::resource('cadastro', CadastroController::class);

// Clientes (protegido)
Route::resource('clientes', ClienteController::class)
    ->middleware('auth');

// Produtos (protegido)
Route::resource('produtos', ProdutoController::class)
    ->middleware('auth');

// Vendas
Route::get('vendas', [UserController::class, 'index'])
    ->name('vendas.index')
    ->middleware('auth');
