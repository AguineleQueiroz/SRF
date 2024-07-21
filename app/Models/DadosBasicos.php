<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosBasicos extends Model
{
    use HasFactory;

    protected $table='dados_basicos';

    protected $fillable = [

        //1º tópico: Informações

        'nome',

        'idade',

        'sexo',

        'contato',

        'data_nascimento',

        'cpf',
        'cartao_sus',



        'endereco',

        'data_cadastro',

        //2º tópico: Unidade Básica de Saúde

        'ubs',

        'acs',

        //3º tópico: Condições de Saúde

        'diagnostico',

        'comorbidades',

        'ultima_internacao',

        'responsavel_cadastro',

        'medico_responsavel',

        //4º tópico: Nível de prioridade

        'prioridade',
    ];

}
