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
        Schema::create('atendimentos', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('tb_dados_basicos_id');

            $table->unsignedBigInteger('tb_atendimento_primario_id');

            $table->unsignedBigInteger('tb_atendimento_secundario_id');

            $table->string('encaminhamento')->nullable();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('tb_dados_basicos_id')->references('id')->on('dados_basicos');

            $table->foreign('tb_atendimento_primario_id')->references('id')->on('atendimentos_primarios');

            $table->foreign('tb_atendimento_secundario_id')->references('id')->on('atendimentos_secundarios');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
