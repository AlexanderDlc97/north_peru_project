<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Programacion;
use App\Models\Rubro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class admin_CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin_categorias = Categoria::all();
        $admin_rubros = Rubro::where('estado', 'Activo')->get();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.categorias.index', compact('admin_rubros', 'admin_categorias'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $admin_categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Categoria $admin_categoria)
    {
        //
    }
}
