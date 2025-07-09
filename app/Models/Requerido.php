<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerido extends Model
{
    use HasFactory;
    protected $table = 'ot_requeridos';

    protected $fillable = [
        'departamento_id',
        'equipo',
        'porcentaje',
        'categoria_id',
        'categoria',
        'rubro',
        'fecha_inicio',
        'fecha_fin',
        'mes_fin',
        'nivel_importancia',
        'descripcion_orden',
        'descripcion_labor',
        'supervision_general',
        'telefono',
        'conformidad',
        'comentarios',
        'operacion_funcional',
        'supervisor_contratista',
        'tecnico_especialista',
        'encargado_spcc',
        'n_vale_compra',
        'estado'
];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
