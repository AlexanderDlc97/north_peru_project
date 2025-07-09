<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;
    protected $table = 'rubros';
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
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
