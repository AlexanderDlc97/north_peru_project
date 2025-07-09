<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallehorariot extends Model
{
    use HasFactory;
    protected $table = 'detalle_horariost';
    
    protected $fillable = [
        'fecha_registro',
        'horario_registro',
        'horario_finregistro',
        'hora_totales',
        'operaciones_polifuncionale_id'
    ];
}
