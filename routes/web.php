<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin_ActivosMaterialesController;
use App\Http\Controllers\admin_AlmInventarioController;
use App\Http\Controllers\admin_AlmMovIngresosController;
use App\Http\Controllers\admin_AlmMovSalidasController;
use App\Http\Controllers\admin_AsistenciaController;
use App\Http\Controllers\admin_CategoriasController;
use App\Http\Controllers\admin_CentroCostosController;
use App\Http\Controllers\admin_ConfiguracionesController;
use App\Http\Controllers\admin_CostosHHController;
use App\Http\Controllers\admin_DashboardController;
use App\Http\Controllers\admin_DepartamentosController;
use App\Http\Controllers\admin_EquiposController;
use App\Http\Controllers\admin_FuerzaLaboralController;
use App\Http\Controllers\admin_InmueblesController;
use App\Http\Controllers\admin_MarcasController;
use App\Http\Controllers\admin_MedidasController;
use App\Http\Controllers\admin_NotificacionesController;
use App\Http\Controllers\admin_OTPlanificadosController;
use App\Http\Controllers\admin_OTRequeridosController;
use App\Http\Controllers\admin_OTSeguimientoController;
use App\Http\Controllers\admin_OTSolicitudesController;
use App\Http\Controllers\admin_PerfilController;
use App\Http\Controllers\admin_ProgramacionesController;
use App\Http\Controllers\admin_ResidentesController;
use App\Http\Controllers\admin_RolesController;
use App\Http\Controllers\admin_RubrosController;
use App\Http\Controllers\admin_SectorController;
use App\Http\Controllers\admin_SedeController;
use App\Http\Controllers\admin_SPCCController;
use App\Http\Controllers\admin_UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {

    Route::get('admin-dashboard', [admin_DashboardController::class, 'index'])->name('admin-dashboard.index');
    Route::get('busqueda_grafico_ots', [admin_DashboardController::class, 'getbusqueda_grafico_ots'])->name('busqueda.graficoOTS');
    Route::post('/grafica/reportes', [admin_DashboardController::class, 'reportegraficosPrintPdf'])->name('admin-dashboard.store');
    

    Route::get('admin-configuraciones', [admin_ConfiguracionesController::class, 'index'])->name('admin-configuraciones.index');
    Route::get('admin-notificaciones', [admin_NotificacionesController::class, 'index'])->name('admin-notificaciones.index');
    Route::get('admin-roles', [admin_RolesController::class, 'index'])->name('admin-roles.index');

    Route::resource('admin-sectores', admin_SectorController::class);
    Route::put('/admin-sectores/estado/{admin_sectore}', [admin_SectorController::class, 'estado']);
    
    Route::resource('admin-sedes', admin_SedeController::class);
    Route::put('/admin-sedes/estado/{admin_sede}', [admin_SedeController::class, 'estado']);

    Route::resource('admin-usuarios', admin_UsuariosController::class);
    Route::put('/admin-usuarios/estado/{admin_usuario}', [admin_UsuariosController::class, 'estado']);
    Route::get('/admin-usuarios_miperfil/{admin_usuario}', [admin_UsuariosController::class, 'get_miperfil']);
    Route::put('/admin-usuarios_miperfil_update/{admin_usuario}', [admin_UsuariosController::class, 'update_miperfil'])->name('admin-usuarios.update_perfil');
    Route::post('/admin-usuarios_post_permiso/{admin_usuario}', [admin_UsuariosController::class, 'post_permisos']);
    Route::get('/admin_vigencia_permiso', [admin_UsuariosController::class, 'getaplicar_descanso']);
    Route::get('/lista_cargos', [admin_UsuariosController::class, 'getlista_cargos']);
    
    Route::resource('admin-spcc', admin_SPCCController::class);
    Route::put('/admin-spcc/estado/{admin_spcc}', [admin_SPCCController::class, 'estado']);
    
    Route::resource('admin-perfil', admin_PerfilController::class);

    Route::resource('admin-costos-hh', admin_CostosHHController::class);
    Route::put('/admin-costos-hh/estado/{admin_costos_hh}', [admin_CostosHHController::class, 'estado']);

    Route::resource('admin-centro-costos', admin_CentroCostosController::class);
    Route::put('/admin-centro-costos/estado/{admin_centro_costo}', [admin_CentroCostosController::class, 'estado']);
    Route::resource('admin-inmuebles', admin_InmueblesController::class);
    Route::put('/admin-inmuebles/estado/{admin_inmueble}', [admin_InmueblesController::class, 'estado']);
    Route::resource('admin-departamentos', admin_DepartamentosController::class);
    Route::put('/admin-departamentos/estado/{admin_departamento}', [admin_DepartamentosController::class, 'estado']);
    Route::resource('admin-equipos', admin_EquiposController::class);
    Route::put('/admin-equipos/estado/{admin_equipo}', [admin_EquiposController::class, 'estado']);
    Route::get('admin-equipos-centrocosto/{admin_equipos_centrocosto}', [admin_EquiposController::class, 'filtrar_equipos_centrocosto'])->name ('equipos.centro_costo');
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
    Route::resource('admin-residentes', admin_ResidentesController::class);
    Route::put('/admin-residentes/estado/{admin_residente}', [admin_ResidentesController::class, 'estado']);
    Route::resource('admin-programaciones', admin_ProgramacionesController::class);
    Route::put('/admin-programaciones/estado/{admin_programacione}', [admin_ProgramacionesController::class, 'estado']);
    Route::get('fecha_dtlle_show', [admin_ProgramacionesController::class, 'getfecha_dtlle_show']);
    Route::get('dias_mes_inicio', [admin_ProgramacionesController::class, 'getbusquedames_inicio']);
    Route::get('categoria_rubro', [admin_ProgramacionesController::class, 'getcategoria_rubro']);
    Route::get('cantidad_almacen', [admin_ProgramacionesController::class, 'getcantidad_almacen']);
    Route::get('dtlle_programacion', [admin_ProgramacionesController::class, 'getdtlle_programacion']);

    Route::resource('admin-ot-solicitudes', admin_OTSolicitudesController::class);
    Route::resource('admin-ot-requeridos', admin_OTRequeridosController::class);
    Route::get('admin-ot-requeridos_edit/{admin_ot_requerido}', [admin_OTRequeridosController::class, 'edit']);
    Route::get('/dtlle_plifunc_requerido', [admin_OTRequeridosController::class, 'getdtllepoli']);
    Route::get('/dtlle_plifunc_horas', [admin_OTRequeridosController::class, 'getdtlle_plifunc_horas']);
    Route::get('/dtlle_requeri_mat', [admin_OTRequeridosController::class, 'getdtllemat']);
    Route::get('/dtlle_devolu_mat', [admin_OTRequeridosController::class, 'getdtlle_devolu_mat']);
    Route::get('/lista_index_requeridos', [admin_OTRequeridosController::class, 'getlista_index_requeridos']);
    Route::get('/lista_index_requeridos_codigo_requer', [admin_OTRequeridosController::class, 'getlista_index_requeridos_codigo']);
    
    Route::get('/lista_index_seguimiento', [admin_OTSeguimientoController::class, 'getlista_index_seguimiento']);
    Route::get('/lista_index_seguimiento_codigo_segui', [admin_OTSeguimientoController::class, 'getlista_index_seguimiento_codigo_segui']);
    
    Route::resource('admin-ot-planificados', admin_OTPlanificadosController::class);
    Route::get('/dtlle_polifuncional_planifica', [admin_OTPlanificadosController::class, 'getdtllepoli_aplica']);
    Route::get('/admin-ot-planificados_dtlle/{admin_ot_planificado}', [admin_OTPlanificadosController::class, 'getdetalle_plani']);
    Route::get('departamento_planificacion', [admin_OTPlanificadosController::class, 'getdepartamento_planificacion']);
    Route::get('/dtlle_plifunc', [admin_OTPlanificadosController::class, 'getdtllepoli']);
    Route::get('/dtlle_plani_mat', [admin_OTPlanificadosController::class, 'getdtllemat']);
    Route::get('/dtlle_devolu_mat_pla', [admin_OTPlanificadosController::class, 'getdtlle_devolu_mat_pla']);
    Route::get('/busqueda_programacion', [admin_OTPlanificadosController::class, 'getbusqueda_programacion']);
    Route::get('/lista_index_planificados', [admin_OTPlanificadosController::class, 'getlista_index_planificados']);
    Route::get('/lista_index_requeridos_codigo_plani', [admin_OTPlanificadosController::class, 'getlista_index_requeridos_codigo']);
    
    Route::resource('admin-ot-seguimiento', admin_OTSeguimientoController::class);
    Route::post('/admin-ot-seguimiento/seguimiento-ot-polifunc', [admin_OTSeguimientoController::class, 'store_usuario_poli'])->name('admin-ot-seguimiento.store_usuario_poli');
    Route::post('/admin-ot-seguimiento/seguimiento-ot-progreso-update', [admin_OTSeguimientoController::class, 'update_progresos_dtlle']);
    Route::put('/admin-ot-seguimiento/seguimiento-ot-progreso-update/show/{id}', [admin_OTSeguimientoController::class, 'update_progresos_dtlle_show']);
    Route::get('/dtlle_plifunc_horas_sgto', [admin_OTSeguimientoController::class, 'getdtlle_plifunc_horas']);
    Route::put('/admin-ot-seguimiento/seguimiento-ot-polifunc-update/{id}', [admin_OTSeguimientoController::class, 'update_usuario_poli']);
    Route::get('/admin-ot-seguimiento/seguimiento-ot-pdf/{admin_ot_seguimiento}', [admin_OTSeguimientoController::class, 'getSeguimientoOTPdf'])->name('admin-ot-seguimiento.pdf');
    Route::get('/admin-ot-seguimiento/seguimiento-ot-excel/{admin_ot_seguimiento}', [admin_OTSeguimientoController::class, 'getSeguimientoOTExcel'])->name('admin-ot-seguimiento.excel');
    Route::get('/admin-ot-seguimiento/export/reporte-general-excel', [admin_OTSeguimientoController::class, 'OTExcel'])->name('lista-ot-general.xlsx');
    Route::post('admin-ot-seguimiento/resultadosEXCEL', [admin_OTSeguimientoController::class, 'reporteSeguimientoPrintExcelFechas'])->name('admin-seguimiento.resultadosEXCEL');
    Route::post('admin-ot-seguimiento/resultadosUHEXCEL', [admin_OTSeguimientoController::class, 'reporteSeguimientoUHPrintExcelFechas'])->name('admin-seguimiento.resultadosUHEXCEL');
    Route::post('admin-ot-seguimiento/resultadosCHHPEXCEL', [admin_OTSeguimientoController::class, 'reporteSeguimientoCHHPPrintExcelFechas'])->name('admin-seguimiento.resultadosCHHPEXCEL');
    Route::post('admin-ot-seguimiento/resultadosMCVEXCEL', [admin_OTSeguimientoController::class, 'reporteSeguimientoMCVPrintExcelFechas'])->name('admin-seguimiento.resultadosMCVEXCEL');

    Route::resource('admin-inventario', admin_AlmInventarioController::class);
    Route::get('/admin-inventario/export/reporte-general-excel', [admin_AlmInventarioController::class, 'INVExcel'])->name('lista-inv-general.xlsx');
    Route::post('admin-inventario/resultadosEXCEL', [admin_AlmInventarioController::class, 'reporteInventarioPrintExcelFechas'])->name('admin-inventario.resultadosEXCEL');
    Route::get('/lista_index_inventarios', [admin_AlmInventarioController::class, 'getlista_index_inventarios']);

    Route::resource('admin-mov-ingresos', admin_AlmMovIngresosController::class);
    Route::get('/ordenes_pdevueltos', [admin_AlmMovIngresosController::class, 'getordenes_pdevueltos']);
    Route::get('/admin-mov-ingresos/export/reporte-general-excel', [admin_AlmMovIngresosController::class, 'MIExcel'])->name('lista-mi-general.xlsx');
    Route::post('admin-ingresos/resultadosEXCEL', [admin_AlmMovIngresosController::class, 'reporteIngresosPrintExcelFechas'])->name('admin-ingresos.resultadosEXCEL');
    Route::get('/lista_index_movingresos', [admin_AlmMovIngresosController::class, 'getlista_index_movingresos']);

    Route::resource('admin-mov-salidas', admin_AlmMovSalidasController::class);
    Route::get('/ordenes_prequeridos', [admin_AlmMovSalidasController::class, 'getordenes_prequeridos']);
    Route::get('/ordenest_inventario', [admin_AlmMovSalidasController::class, 'getordenest_inventario']);
    Route::get('/admin-mov-salidas/export/reporte-general-excel', [admin_AlmMovSalidasController::class, 'MSExcel'])->name('lista-ms-general.xlsx');
    Route::post('admin-salidas/resultadosEXCEL', [admin_AlmMovSalidasController::class, 'reporteSalidasPrintExcelFechas'])->name('admin-salidas.resultadosEXCEL');
    Route::get('/lista_index_movsalidas', [admin_AlmMovSalidasController::class, 'getlista_index_movsalidas']);

    Route::resource('admin-asistencia', admin_AsistenciaController::class);
    Route::get('/lista_asistencia', [admin_AsistenciaController::class, 'getlista_asistencia']);
    Route::get('/search_asistencia', [admin_AsistenciaController::class, 'getsearch_asistencia']);
    Route::get('/search_ots_relacionadas', [admin_AsistenciaController::class, 'getsearch_ots_relacionadas']);
    Route::get('/search_asistencia_filtar', [admin_AsistenciaController::class, 'getsearch_asistencia_filtar']);
    Route::get('/search_lista_usuarios', [admin_AsistenciaController::class, 'getsearch_lista_usuarios']);

    Route::resource('admin-fuerza-laboral', admin_FuerzaLaboralController::class);



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
