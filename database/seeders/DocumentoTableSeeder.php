<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documento = new Documento();
        $documento->name = "Registro único de contribuyentes";
        $documento->slug = Str::slug($documento->name);
        $documento->abreviatura = "RUC";
        $documento->codigo = "6";
        $documento->save();

        $documento = new Documento();
        $documento->name = "Documento Nacional de identidad";
        $documento->slug = Str::slug($documento->name);
        $documento->abreviatura = "DNI";
        $documento->codigo = "1";
        $documento->save();

        $documento = new Documento();
        $documento->name = "Carnet de extranjería";
        $documento->slug = Str::slug($documento->name);
        $documento->abreviatura = "CE";
        $documento->codigo = "4";
        $documento->save();

        $documento = new Documento();
        $documento->name = "Pasaporte";
        $documento->slug = Str::slug($documento->name);
        $documento->abreviatura = "PP";
        $documento->codigo = "7";
        $documento->save();

        $documento = new Documento();
        $documento->name = "Documento tributario no domiciliado sin ruc";
        $documento->slug = Str::slug($documento->name);
        $documento->abreviatura = "SIN RUC";
        $documento->codigo = "0";
        $documento->save();
    }
}
