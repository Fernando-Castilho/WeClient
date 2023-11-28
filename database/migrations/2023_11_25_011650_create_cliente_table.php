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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id("Id");
            $table->string("Nome", 150);
            $table->string("Cpf", 11)->unique();
            $table->date("DataNascimento");
            $table->decimal("Renda")->nullable();
            $table->timestamp("DataCadastro")->nullable();
            $table->timestamp("DataAtualizacao")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
