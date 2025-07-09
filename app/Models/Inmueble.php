<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';
    protected $fillable = [
        'codigo',
        'slug',
        'name',
        'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
