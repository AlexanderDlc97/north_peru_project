<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admin_ConfiguracionesController extends Controller
{
    public function index()
    {
        // if(Gate::allows('gerencia',Auth()->user())){
            return view('ADMINISTRADOR.PRINCIPAL.configuraciones.index');
        // }else{
        //     abort(403);
        // };
    }
}
