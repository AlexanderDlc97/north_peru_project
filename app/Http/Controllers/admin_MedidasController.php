<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class admin_MedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin_medidas = Medida::all();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.medidas.index', compact('admin_medidas'));
    }

    /**
     * Show the form for creating a news resource.
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
    public function update(Request $request, Medida $admin_medida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Medida $admin_medida)
    {
        //
    }
}
