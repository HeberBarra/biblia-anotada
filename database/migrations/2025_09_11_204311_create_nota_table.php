<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_nota', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30)->unique();
            $table->integer('capitulo_livro');
            $table->string('texto', 256);
            $table->unsignedBigInteger('codigo_livro');
            $table->foreign('codigo_livro')->references('id')->on('tb_livro');
            $table->unsignedBigInteger('codigo_usuario');
            $table->foreign('codigo_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_nota');
    }
};
