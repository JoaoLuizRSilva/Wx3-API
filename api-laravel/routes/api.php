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
use App\Http\Controllers\VendaProdutoController;
use App\Http\Controllers\VendaController;

Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'index']);

    Route::post('/', [UserController::class, 'store']);

    Route::get('/{id}', [UserController::class, 'show']);

    Route::put('/{id}', [UserController::class, 'update']);

    Route::delete('/{id}', [UserController::class, 'destroy']);
});


Route::prefix('bairros')->group(function () {

    Route::get('/', [BairroController::class, 'index']);

    Route::post('/', [BairroController::class, 'store']);

    Route::get('/{id}', [BairroController::class, 'show']);

    Route::put('/{id}', [BairroController::class, 'update']);

    Route::delete('/{id}', [BairroController::class, 'destroy']);
});

Route::prefix('categorias')->group(function () {

    Route::get('/', [CategoriaController::class, 'index']);

    Route::post('/', [CategoriaController::class, 'store']);

    Route::get('/{id}', [CategoriaController::class, 'show']);

    Route::put('/{id}', [CategoriaController::class, 'update']);

    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});

Route::prefix('cidades')->group(function () {

    Route::get('/', [CidadeController::class, 'index']);

    Route::post('/', [CidadeController::class, 'store']);

    Route::get('/{id}', [CidadeController::class, 'show']);

    Route::put('/{id}', [CidadeController::class, 'update']);

    Route::delete('/{id}', [CidadeController::class, 'destroy']);
});

Route::prefix('enderecos')->group(function () {

    Route::get('/', [EnderecoController::class, 'index']);

    Route::post('/', [EnderecoController::class, 'store']);

    Route::get('/{id}', [EnderecoController::class, 'show']);

    Route::put('/{id}', [EnderecoController::class, 'update']);

    Route::delete('/{id}', [EnderecoController::class, 'destroy']);
});

Route::prefix('produtos')->group(function () {

    Route::get('/', [ProdutoController::class, 'index']);

    Route::post('/', [ProdutoController::class, 'store']);

    Route::get('/{id}', [ProdutoController::class, 'show']);

    Route::put('/{id}', [ProdutoController::class, 'update']);

    Route::delete('/{id}', [ProdutoController::class, 'destroy']);
});

Route::prefix('variacoes')->group(function () {

    Route::get('/', [VariacaoDoProdutoController::class, 'index']);

    Route::post('/', [VariacaoDoProdutoController::class, 'store']);

    Route::get('/{id}', [VariacaoDoProdutoController::class, 'show']);

    Route::put('/{id}', [VariacaoDoProdutoController::class, 'update']);

    Route::delete('/{id}', [VariacaoDoProdutoController::class, 'destroy']);
});

Route::prefix('vendas-produtos')->group(function () {

    Route::get('/', [VendaProdutoController::class, 'index']);

    Route::post('/', [VendaProdutoController::class, 'store']);

    Route::get('/{id}', [VendaProdutoController::class, 'show']);

    Route::put('/{id}', [VendaProdutoController::class, 'update']);

    Route::delete('/{id}', [VendaProdutoController::class, 'destroy']);
});

Route::post('/vendas', [VendaController::class, 'store']);
