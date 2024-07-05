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
        Schema::create('dados_basicos', function (Blueprint $table) {
            
            $table->id();

            //1º tópico: Informações

            $table->string('nome');

            $table->integer('idade');

            $table->string('sexo');

            $table->string('contato', 20);

            $table->date('data_nascimento');

            $table->string('cartao_sus', 20);

            $table->string('endereco');

            $table->date('data_cadastro');

            //2º tópico: Unidade Básica de Saúde

            $table->string('ubs');

            $table->string('acs');

            //3º tópico: Condições de Saúde

            $table->text('diagnostico', 2000);

            $table->string('comorbidades', 2000)->nullable();

            $table->date('ultima_internacao')->nullable();

            $table->string('responsavel_cadastro')->nullable();

            $table->string('medico_responsavel')->nullable();

            //4º tópico: Nível de prioridade

            $table->enum('prioridade', ['alta', 'media', 'baixa']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_basicos');
    }
};
