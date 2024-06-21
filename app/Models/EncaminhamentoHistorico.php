<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncaminhamentoHistorico extends Model
{
    use HasFactory;

    protected $table = 'encaminhamento_historicos';

    protected $fillable = [
        'atendimento_id',
        'encaminhamento',
        'user_id', // Adicionando user_id ao fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class, 'atendimento_id');
    }
}
