<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('atendimentos_basicos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_especializacao');
            $table->text('descricao_especialidade');
            $table->unsignedBigInteger('atendimento_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos_basicos');
    }
};
