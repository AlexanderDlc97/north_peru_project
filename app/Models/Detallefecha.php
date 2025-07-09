<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallefecha extends Model
{
    use HasFactory;
    protected $table = 'detalle_fechas';
    
    protected $fillable = [
        'programacion_id',
        'mes_inicio',
        'dia_inicio',
        'mes_fin',
        'dia_fin'
    ];
}