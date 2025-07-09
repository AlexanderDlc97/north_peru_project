<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spcc extends Model
{

    use HasFactory;
    protected $table = 'spcc';

    protected $fillable = [
        'slug',
        'name',
        'tipo',
        'estado'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
