<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = 'sectores';

    protected $fillable = [
        'slug',
        'name',
        'estado',
        'sede_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
