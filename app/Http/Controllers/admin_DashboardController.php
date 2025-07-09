<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Cargo;
use App\Models\Costoshh;
use App\Models\Otrabajo;
use App\Models\Producto;
use App\Models\Sede;
use App\Models\Spcc;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class admin_DashboardController extends Controller
{
    public function index()
    {
        return view('ADMINISTRADOR.PRINCIPAL.dashboard.index');
    }
}
