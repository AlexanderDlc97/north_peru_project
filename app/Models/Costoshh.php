<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costoshh extends Model
{
    use HasFactory;
    protected $table = 'costoshhs';
    protected $fillable = [
        'name',
        'slug',
        'ccosto',
        'costo_hora_normal',
        'costo_hora_sobretiempo_25',
        'costo_hora_sobretiempo_100',
        'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
