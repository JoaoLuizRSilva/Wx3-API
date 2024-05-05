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
        Schema::create('variacao_do_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('tamanho');
            $table->integer('estoque');
            $table->foreignId('produto_id')->referencs('id')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacao_do_produtos');
    }
};
