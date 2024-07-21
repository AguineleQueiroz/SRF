<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaAtendimento extends Model
{
    use HasFactory;

    protected $table = 'ficha_atendimentos';

    protected $fillable = [
        'tipo_ficha',
        'atendimento_id',
        'user_id',
        'funcional_condicao',
        'tratamento_ofertado',
        'evolucao_funcional',
        'sessoes',
        'assiduidade',
        'ambientais_pessoais',
        'diagnostico_fisio',
        'criterios',
        'justificativa',
        'tipo_especializacao',
        'descricao_especialidade',
        'motivos',
        'queixa',
        'achados_exame_fisico',
        'testes_padronizados',
        'condicao_funcional',
        'fatores_ambientais',
        'diagnostico_fisioterapeutico',
        'atividades',
        'atividades_passadas',
    ];

    protected $casts = [
        'motivos' => 'array',
        'motivos_descricao' => 'array',
        'atividades' => 'array',
        'atividades_passadas' => 'array',
        'sessoes' => 'array'
    ];

    public function motivoDescricoes()
    {
        return $this->hasMany(MotivoDescricao::class);
    }

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }
}
