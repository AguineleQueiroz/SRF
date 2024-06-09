<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $table='atendimentos';

    protected $fillable = [
    
        'user_id',
        'tb_dados_basicos_id',
        'tb_atendimento_primario_id',
        'tb_atendimento_secundario_id',
        
    ];
}
