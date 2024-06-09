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
        Schema::create('atendimentos_secundarios', function (Blueprint $table) {
            
            $table->id();

            //5º tópico: Atenção Secundária

            $table->text('funcional_condicao')->nullable();

            $table->text('tratamento_ofertado')->nullable();

            $table->text('evolucao_funcional')->nullable();

            //6º tópico: Sessões Realizadas

            $table->string('sessoes')->default('Menos_de_10');

            //7º tópico: Assiduidade do paciente

            $table->string('assiduidade')->nullable();

            //8º tópico: Fatores Ambientais e Pessoais

            $table->text('ambientais_pessoais')->nullable();

            $table->text('diagnostico_fisio')->nullable();
    
            $table->text('criterios')->nullable();
    
            $table->text('justificativa')->nullable();

            //9º tópico: Atividades

            $table->string('atividades')->nullable();
    
            $table->string('atividades_passadas')->nullable();


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos_secundarios');
    }
};
