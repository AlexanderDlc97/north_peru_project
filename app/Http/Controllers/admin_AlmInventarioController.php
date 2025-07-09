<?php

namespace App\Http\Controllers;

use App\Exports\INVExport;
use App\Exports\INVExportFecha;
use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class admin_AlmInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacen = Producto::all();
        return view('ADMINISTRADOR.LOGISTICA.almacen.inventario.index', compact('almacen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
