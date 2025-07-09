<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Costoshh;
use App\Models\Detallecargo;
use App\Models\Detalledescanso;
use App\Models\Detallerole;
use App\Models\Documento;
use App\Models\Role;
use App\Models\Sector;
use App\Models\Sede;
use App\Models\Ubigeo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class admin_UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fecha = Carbon::now()->format('Y-m-d');
        $hora_actual = Carbon::now()->format('H:i:s');
        $admin_usuarios = User::all();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.usuarios.index', compact('fecha', 'admin_usuarios', 'hora_actual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumento = Documento::all();
        $roles = Role::where('estado', 'Activo')->where('id', '!=', '1')->get();
        $sedes = Sede::where('estado', 'Activo')->get();
        $ubigeos = Ubigeo::all();
        $sector = Sector::where('estado', 'Activo')->get();
        return view('ADMINISTRADOR.PRINCIPAL.configuraciones.usuarios.create', compact('tiposdocumento', 'roles', 'ubigeos', 'sector', 'sedes'));
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
    public function edit(Request $request, User $admin_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin_usuario)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin_usuario)
    {
        //

    }
}
