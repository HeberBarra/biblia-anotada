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
        Schema::create('tb_livro', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->unique();
            $table->integer('qntd_capitulos');
            $table->unsignedBigInteger('codigo_categoria');
            $table->foreign('codigo_categoria')
                ->references('id')
                ->on('tb_categoria_livro')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_livro');
    }
};
