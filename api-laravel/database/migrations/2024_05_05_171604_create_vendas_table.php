<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_frete', 10, 2);
            $table->enum('forma_pagamento', ['boleto', 'pix', 'cartao']);
            $table->dateTime('data_venda');
            $table->decimal('valor_total', 10, 2);
            $table->foreignId('variacao_do_produto_id')->references('id')->on('variacao_do_produtos');
            $table->foreignId('endereco_id')->references('id')->on('enderecos');
            $table->foreignId('cliente_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};