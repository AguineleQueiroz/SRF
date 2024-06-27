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
        Schema::create('ficha_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_ficha');
            $table->json('motivos')->nullable();
            $table->text('queixa')->nullable();
            $table->text('achados_exame_fisico')->nullable();
            $table->text('testes_padronizados')->nullable();
            $table->text('condicao_funcional')->nullable();
            $table->text('fatores_ambientais')->nullable();
            $table->text('diagnostico_fisioterapeutico')->nullable();
            $table->json('atividades')->nullable();
            $table->json('atividades_passadas')->nullable();
            $table->text('funcional_condicao')->nullable();
            $table->text('tratamento_ofertado')->nullable();
            $table->text('evolucao_funcional')->nullable();
            $table->json('sessoes')->nullable();
            $table->enum('assiduidade', ['assiduo', 'nao_assiduo'])->nullable();
            $table->text('ambientais_pessoais')->nullable();
            $table->text('diagnostico_fisio')->nullable();
            $table->text('criterios')->nullable();
            $table->text('justificativa')->nullable();
            $table->unsignedBigInteger('atendimento_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('atendimento_id')->references('id')->on('atendimentos');
            $table->timestamps();
        });

        Schema::create('motivo_descricoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_atendimento_id');
            $table->string('motivo');
            $table->text('descricao')->nullable();
            $table->foreign('ficha_atendimento_id')->references('id')->on('ficha_atendimentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_atendimentos');
    }
};
