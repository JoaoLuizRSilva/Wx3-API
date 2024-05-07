<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VariacaoDoProdutoController;
use App\Http\Controllers\VendaController;

Route::resource('users', UserController::class);
Route::resource('bairros', BairroController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('cidades', CidadeController::class);
Route::resource('enderecos', EnderecoController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('variacoes', VariacaoDoProdutoController::class);
Route::resource('vendas', VendaController::class)->only(['store']);