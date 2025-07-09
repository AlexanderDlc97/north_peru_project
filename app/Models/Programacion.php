<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;
    protected $table = 'programaciones';
    protected $fillable = [
        'codigo',
        'slug',
        'responsable',
        'fecha_emision',
        'categoria_id',
        'categoria',
        'rubro',
        'descripcion_orden',
        'descripcion_labor',
        'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
