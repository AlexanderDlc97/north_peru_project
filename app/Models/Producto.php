<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'codigo',
        'slug',
        'name',
        'imagen',
        'descripcion',
        'vida_util',
        'depreciacion',
        'costo',
        'tipo_costo',
        'precio_unit',
        'fabricante_nparte',
        'medida',
        'estado',
        'marca_id',
        'tipo_id',
        'medida_id'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function umedida()
    {
        return $this->belongsTo(Medida::class, 'medida_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
