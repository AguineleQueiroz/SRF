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
    Schema::create('atendimentos_primarios', function (Blueprint $table) {

        $table->id();

        //5º tópico: Atenção Primária

        $table->integer('dor')->default(0);
        $table->text('dor_descricao')->nullable();

        $table->integer('incapacidade')->default(0);
        $table->text('incapacidade_descricao')->nullable();

        $table->integer('osteomusculares')->default(0);
        $table->text('osteomusculares_descricao')->nullable();

        $table->integer('neurologicas')->default(0);
        $table->text('neurologicas_descricao')->nullable();

        $table->integer('uroginecologicas')->default(0);
        $table->text('uroginecologicas_descricao')->nullable();

        $table->integer('cardiovasculares')->default(0);
        $table->text('cardiovasculares_descricao')->nullable();

        $table->integer('respiratorias')->default(0);
        $table->text('respiratorias_descricao')->nullable();

        $table->integer('oncologicas')->default(0);
        $table->text('oncologicas_descricao')->nullable();

        $table->integer('pediatria')->default(0);
        $table->text('pediatria_descricao')->nullable();

        $table->integer('multiplas')->default(0);
        $table->text('multiplas_descricao')->nullable();

        //6º tópico: Avaliação Fisioterapêutica

        $table->text('queixa')->nullable();

        $table->text('achados_exame_fisico')->nullable();

        $table->text('testes_padronizados')->nullable();

        $table->text('condicao_funcional')->nullable();

        $table->text('fatores_ambientais')->nullable();

        $table->text('diagnostico_fisioterapeutico')->nullable();

        //7º tópico: Atividades ou grupos operativos

        $table->integer('mova_se')->default(0);

        $table->integer('menos_dor_mais_saude')->default(0);

        $table->integer('peso_saudavel')->default(0);

        $table->integer('geracao_esporte')->default(0);

        $table->integer('nda')->default(0);

        //8º tópico: Atividades ou grupos operativos dos quais o usuário já participou

        $table->integer('mova_se_RA')->default(0);

        $table->integer('mais_saude_RA')->default(0);

        $table->integer('peso_saudavel_RA')->default(0);

        $table->integer('geracao_esporte_RA')->default(0);

        $table->integer('nda_RA')->default(0);

        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos_primarios');
    }
};
