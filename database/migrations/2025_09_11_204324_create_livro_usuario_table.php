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
        Schema::create('tb_livro_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_livro');
            $table->foreign('codigo_livro')
                ->references('id')
                ->on('tb_livro')
                ->onDelete('cascade');
            $table->unsignedBigInteger('codigo_usuario');
            $table->foreign('codigo_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('qntd_vezes_lidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_livro_usuario');
    }
};
