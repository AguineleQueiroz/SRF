<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoDescricao extends Model
{
    use HasFactory;

    protected $table = "motivo_descricoes";

    protected $fillable = [
        'ficha_atendimento_id',
        'motivo',
        'descricao',
    ];

    public function fichaAtendimento()
    {
        return $this->belongsTo(FichaAtendimento::class);
    }
}
