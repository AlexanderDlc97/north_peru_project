<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallemovimiento extends Model
{
    use HasFactory;
    protected $table = 'detalle_movimientos';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
