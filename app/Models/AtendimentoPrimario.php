<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtendimentoPrimario extends Model
{
    use HasFactory;

    protected $table='atendimentos_primarios';

    protected $fillable = [

        //5º tópico: Atenção Primária

        'dor',

        'dor_descricao',

        'incapacidade',

        'incapacidade_descricao',

        'osteomusculares',

        'osteomusculares_descricao',

        'neurologicas',

        'neurologicas_descricao',

        'uroginecologicas',

        'uroginecologicas_descricao',

        'cardiovasculares',

        'cardiovasculares_descricao',

        'respiratorias',

        'respiratorias_descricao',

        'oncologicas',

        'oncologicas_descricao',

        'pediatria',

        'pediatria_descricao',

        'multiplas',

        'multiplas_descricao',

        //6º tópico: Avaliação Fisioterapêutica

        'queixa',

        'achados_exame_fisico',

        'testes_padronizados',

        'condicao_funcional',

        'fatores_ambientais',

        'diagnostico_fisioterapeutico',

        //7º tópico: Atividades ou grupos operativos

        'mova_se',

        'menos_dor_mais_saude',

        'peso_saudavel',

        'geracao_esporte',

        'nda',

        //8º tópico: Atividades ou grupos operativos dos quais o usuário já participou

        'mova_se_RA',

        'mais_saude_RA',

        'peso_saudavel_RA',

        'geracao_esporte_RA',

        'nda_RA',
        
    ];
}
