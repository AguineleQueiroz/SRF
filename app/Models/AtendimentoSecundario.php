<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtendimentoSecundario extends Model
{
    use HasFactory;

    protected $table='atendimentos_secundarios';

    protected $fillable = [

        //5º tópico: Atenção Secundária

        'funcional_condicao',

        'tratamento_ofertado',

        'evolucao_funcional',

        //6º tópico: Sessões Realizadas

        'sessoes',

        //7º tópico: Assiduidade do paciente

        'assiduidade',

        //8º tópico: Fatores Ambientais e Pessoais

        'ambientais_pessoais',

        'diagnostico_fisio',

        'criterios',

        'justificativa',

         //9º tópico: Atividades

         'atividades',

         'atividades_passadas'

    ];

}
