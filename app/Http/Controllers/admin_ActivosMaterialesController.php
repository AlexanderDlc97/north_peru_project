<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Ingreso;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Tipo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class admin_ActivosMaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin_activos_materiales = Producto::all();
        $tipos = Tipo::all();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.activos-materiales.index', compact('admin_activos_materiales', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        $medidas = Medida::all();
        $marcas = Marca::all();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.activos-materiales.create', compact('tipos', 'medidas', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Producto $admin_activos_materiale)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $admin_activos_materiale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Producto $admin_activos_materiale)
    {
        //
    }
}
