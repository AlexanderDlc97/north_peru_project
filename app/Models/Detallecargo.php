<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecargo extends Model
{
    use HasFactory;
    protected $table = 'detalle_cargos';
    protected $fillable = [
            'name',
            'cargo_id',
            'user_id'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
