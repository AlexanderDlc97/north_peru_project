<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = [
        'codigo',
        'name',
        'slug',
        'departamento_id',
        'inmueble_id',
        'centro_costo_id',
        'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    public function centro_costo()
    {
        return $this->belongsTo(Centrocosto::class);
    }
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
