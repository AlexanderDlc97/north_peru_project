<?php

namespace Database\Seeders;

use App\Models\Almacenproduccion;
use App\Models\Banco;
use App\Models\Medida;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedidaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medidas = new Medida();
        $medidas->name = 'Unidad';
        $medidas->slug = Str::slug($medidas->name);
        $medidas->codigo = "NIU";
        $medidas->abreviatura = "UND";
        $medidas->estado = "Activo";
        $medidas->save();
    }
}
