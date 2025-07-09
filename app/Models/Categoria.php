<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = [
        'codigo',
        'slug',
        'name',
        'rubro_id',
        'estado'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }
}
