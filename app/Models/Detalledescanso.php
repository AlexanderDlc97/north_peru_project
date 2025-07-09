<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalledescanso extends Model
{
    use HasFactory;
    protected $table = 'detalle_descansos';
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_permiso',
        'estado'
    ];
}
