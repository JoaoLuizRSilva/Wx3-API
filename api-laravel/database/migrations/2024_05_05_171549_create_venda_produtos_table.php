<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venda_produtos', function (Blueprint $table) {
            $table->id();
            $table->decimal('preco_venda', 10, 2);
            $table->foreignId('variacao_do_produto_id')->referencs('id')->on('variacao_do_produtos');
            $table->foreignId('venda_id')->referencs('id')->on('vendas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_produtos');
    }
};
