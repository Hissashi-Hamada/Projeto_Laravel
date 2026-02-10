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
        Schema::create('cliente_dados', function (Blueprint $table) {
            $table->id();

            // Dados do cliente
            $table->string('nome_completo');
            $table->string('email')->unique();
            $table->string('telefone', 20)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('cpf', 11)->unique();

            // Dados do cartão (forma correta: token + metadados)
            $table->string('cartao_nome')->nullable();
            $table->string('cartao_token')->nullable();     // vem do gateway
            $table->string('cartao_ultimos4', 4)->nullable();
            $table->string('cartao_validade', 5)->nullable(); // MM/AA
            $table->string('cartao_bandeira', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_dados');
    }
};
