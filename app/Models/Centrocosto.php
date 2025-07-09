<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centrocosto extends Model
{
    use HasFactory;
    protected $table = 'centro_costos';
    protected $fillable = [
            'n_cuenta',
            'slug',
            'costo',
            'descripcion',
            'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
