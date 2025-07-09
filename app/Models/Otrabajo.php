<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otrabajo extends Model
{
    use HasFactory;
    protected $table = 'orden_trabajos';

    protected $fillable = [
        'departamento_id',
        'ubicacion_tecnica',
        'equipo',
        'centro_costo',
        'porcentaje',
        'categoria_id',
        'categoria',
        'rubro',
        'fecha_inicio',
        'fecha_inicioH',
        'fecha_fin',
        'mes_fin',
        'nivel_importancia',
        'descripcion_orden',
        'descripcion_labor',
        'beneficiario',
        'telefono',
        'conformidad',
        'comentarios',
        'operacion_funcional',
        'supervisor_contratista',
        'tecnico_especialista',
        'sup_pla_cont',
        'fecha_sup_pla_cont',
        'n_vale_compra',
        'tec_esp_spcc_supervisor',
        'tec_esp_spcc_planeamiento',
        'almacen_contratista',
        'fecha_cierre_ot',
        'observaciones_cierre_ot',
        'tipo_operacion',
        'sectore_id',
        'estado'
];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sectore_id');
    }

}