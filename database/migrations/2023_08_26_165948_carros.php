<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome_veiculo')->nullable();
            $table->string('link')->nullable();
            $table->string('ano')->nullable();
            $table->string('combustivel')->nullable();
            $table->string('portas')->nullable();
            $table->string('quilometragem')->nullable();
            $table->string('cambio')->nullable();
            $table->string('cor')->nullable();
            $table->string('preco')->nullable();
            $table->string('ver_mais_link')->nullable();
            $table->timestamps();
            // Chave estrangeira para o usuário
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}