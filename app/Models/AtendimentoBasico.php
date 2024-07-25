<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtendimentoBasico extends Model
{
    use HasFactory;

    protected $table = "atendimentos_basicos";

    protected $fillable = [
        'tipo_especializacao',
        'descricao_especialidade',
        'atendimento_id',
        'user_id'
    ];

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
