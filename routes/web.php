<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin_ActivosMaterialesController;
use App\Http\Controllers\admin_AlmInventarioController;
use App\Http\Controllers\admin_CategoriasController;
use App\Http\Controllers\admin_ConfiguracionesController;
use App\Http\Controllers\admin_DashboardController;
use App\Http\Controllers\admin_MarcasController;
use App\Http\Controllers\admin_MedidasController;
use App\Http\Controllers\admin_OTRequeridosController;
use App\Http\Controllers\admin_RolesController;
use App\Http\Controllers\admin_RubrosController;
use App\Http\Controllers\admin_UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {

    Route::get('admin-dashboard', [admin_DashboardController::class, 'index'])->name('admin-dashboard.index');
    Route::get('admin-configuraciones', [admin_ConfiguracionesController::class, 'index'])->name('admin-configuraciones.index');

    Route::resource('admin-usuarios', admin_UsuariosController::class);
    Route::put('/admin-usuarios/estado/{admin_usuario}', [admin_UsuariosController::class, 'estado']);
    Route::get('/admin-usuarios_miperfil/{admin_usuario}', [admin_UsuariosController::class, 'get_miperfil']);
    Route::put('/admin-usuarios_miperfil_update/{admin_usuario}', [admin_UsuariosController::class, 'update_miperfil'])->name('admin-usuarios.update_perfil');
    Route::post('/admin-usuarios_post_permiso/{admin_usuario}', [admin_UsuariosController::class, 'post_permisos']);
    Route::get('/admin_vigencia_permiso', [admin_UsuariosController::class, 'getaplicar_descanso']);
    Route::get('/lista_cargos', [admin_UsuariosController::class, 'getlista_cargos']);

    Route::resource('admin-activos-materiales', admin_ActivosMaterialesController::class);
    Route::put('/admin-activos-materiales/estado/{admin_activos_materiale}', [admin_ActivosMaterialesController::class, 'estado']);
    Route::resource('admin-marcas', admin_MarcasController::class);
    Route::put('/admin-marcas/estado/{admin_marca}', [admin_MarcasController::class, 'estado']);
    Route::resource('admin-medidas', admin_MedidasController::class);
    Route::put('/admin-medidas/estado/{admin_medida}', [admin_MedidasController::class, 'estado']);
    Route::resource('admin-categorias', admin_CategoriasController::class);
    Route::put('/admin-categorias/estado/{admin_categoria}', [admin_CategoriasController::class, 'estado']);
    Route::resource('admin-rubros', admin_RubrosController::class);
    Route::put('/admin-rubros/estado/{admin_rubro}', [admin_RubrosController::class, 'estado']);

    Route::resource('admin-ot-requeridos', admin_OTRequeridosController::class);
    Route::get('admin-ot-requeridos_edit/{admin_ot_requerido}', [admin_OTRequeridosController::class, 'edit']);

    Route::resource('admin-inventario', admin_AlmInventarioController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';
