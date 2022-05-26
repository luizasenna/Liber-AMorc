<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('autor_id')->constrained();
            $table->string('tipo');
            $table->text('descricao')->nullable();
            $table->string('codigobarras')->nullable();
            $table->string('isbn')->nullable();
            $table->string('edicao')->nullable();
            $table->foreignId('editora_id')->constrained();
            $table->string('ano');
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
