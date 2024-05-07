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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cor')->nullable();
            $table->string('imagem')->nullable(); // Armazenar a URL de onde a imagem está armazenda
            $table->decimal('preco', 8, 2);
            $table->text('descricao');
            $table->dateTime('data_cadastro');
            $table->decimal('peso', 8, 2);
            $table->foreignId('categoria_id')->referencs('id')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
