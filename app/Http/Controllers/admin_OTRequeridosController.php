<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Detallerequerido;
use App\Models\DtlleOtrabajo;
use App\Models\DetalledvoTrabajo;
use App\Models\Detallehorariot;
use App\Models\Detalleprogreso;
use App\Models\Equipo;
use App\Models\Operacionespolifuncional;
use App\Models\Otrabajo;
use App\Models\Requerido;
use App\Models\User;
use App\Models\Rubro;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Spcc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class admin_OTRequeridosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fecha_actual = Carbon::now()->format('Y-m-d');
        $admin_ot_requeridos = Otrabajo::where('tipo_operacion', 'Ot. REQUERIDO')->where('fecha_emision', $fecha_actual)->get();
        return view('ADMINISTRADOR.OPERACIONES.orden-trabajo.ot-requeridos.index', compact('admin_ot_requeridos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ADMINISTRADOR.OPERACIONES.orden-trabajo.ot-requeridos.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Otrabajo $admin_ot_requerido)
    {
        return view('ADMINISTRADOR.OPERACIONES.orden-trabajo.ot-requeridos.show', compact('admin_ot_requerido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Otrabajo $admin_ot_requerido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Otrabajo $admin_ot_requerido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
