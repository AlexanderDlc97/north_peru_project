@extends('TEMPLATE.administrador')

@section('title', 'O.T. REQUERIDOS')

@section('css')

@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0">O.T. REQUERIDOS</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Operaciones</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-ot-requeridos') }}">O.T. Requeridos</a></li>
                        <li class="breadcrumb-item link" aria-current="page">Detalle de O.T.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

{{-- Contenido --}}
<div class="container-fluid"> 
        <div class="card border-4 borde-top-primary shadow-sm h-100" style="border-radius: 20px; min-height: 420px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
                <div class="card mb-3 rounded-3">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="text-center" style="font-size: 13px">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Código
                                    </p>
                                    <span class="text-uppercase">{{$admin_ot_requerido->codigo}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="text-center" style="font-size: 13px">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Usuario
                                    </p>
                                    <span class="text-uppercase">{{$admin_ot_requerido->responsable}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3" style="font-size: 13px">
                                <div class="text-center">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Fecha
                                    </p>
                                    <span class="text-uppercase">{{$admin_ot_requerido->fecha_emision}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-uppercase fw-bold small mb-0 mt-3">Reporte de trabajo contratista</p>
                @php
                    $depart = \App\Models\Departamento::where('id',$admin_ot_requerido->departamento_id)->first();
                @endphp
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Departamento</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->ubicacion_tecnica}}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Equipo</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->equipo}}</div>
                    </div>
                   <div class="col-12 col-md-4 col-lg-2">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Porcentaje</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->porcentaje}}</div>
                    </div>
                     <div class="col-12 col-md-4 col-lg-2">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Estado</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">
                            <span class="text-uppercase badge
                            @if($admin_ot_requerido->estado == "PENDIENTE")
                                bg-danger
                            @elseif($admin_ot_requerido->estado == "APROBADO")
                                bg-warning
                            @elseif($admin_ot_requerido->estado == "ORGANIZACION")
                                bg-indigo
                            @elseif($admin_ot_requerido->estado == "REVISION")
                                bg-info
                            @elseif($admin_ot_requerido->estado == "EN PROCESO")
                                bg-grey
                            @elseif($admin_ot_requerido->estado == "FINALIZADO")
                                bg-primary
                            @endif
                            small border-0">{{$admin_ot_requerido->estado}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Categoría</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->categoria}}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Rubro</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->rubro}}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Fecha inicio</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->fecha_inicio}}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Fecha fin</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->fecha_fin}}</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Importancia</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">@if($admin_ot_requerido->nivel_importancia == '1')Muy alto
                        @elseif($admin_ot_requerido->nivel_importancia == '2')Alto
                        @elseif($admin_ot_requerido->nivel_importancia == '3')Media
                        @elseif($admin_ot_requerido->nivel_importancia == '4')Bajo
                        @endif</div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-12 col-lg-6">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Descripción de la orden</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 70px">{{$admin_ot_requerido->descripcion_orden}}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Descripción de la OT</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 70px">{{$admin_ot_requerido->descripcion_labor}}</div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-12 col-xl-6">
                        <div class="card h-100">
                            <div class="card-body p-2">
                                <table class="table table-sm table-striped">
                                    <thead class="text-white" style="background-color: #878D95">
                                        <tr class="small">
                                            <th class="align-middle fw-bold small text-uppercase text-center" style="width: 10%">N°</th>
                                            <th class="align-middle fw-bold small text-uppercase text-center" style="width: 50%">Operario</th>
                                            <th class="align-middle fw-bold small text-uppercase text-center" style="width: 10%">REG.</th>
                                            <th class="align-middle fw-bold small text-uppercase text-center" style="width: 10%">H.P.</th>
                                            <th class="align-middle fw-bold small text-uppercase text-center" style="width: 10%">H.H.</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $conteos = 1;
                                        $admin_dtlle_operadorf = \App\Models\Operacionespolifuncional::where('orden_trabajo_id',$admin_ot_requerido->id)->get();
                                    @endphp
                                    <tbody id="dtlle_polifuncional">
                                        @foreach($admin_dtlle_operadorf as $admin_dtlle_operadorfs)
                                            <tr>
                                                <td class="align-middle small text-uppercase text-center">{{$conteos}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_operadorfs->usuario}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_operadorfs->reg}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_operadorfs->hp}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_operadorfs->hh}}</td>
                                            </tr>
                                            @php
                                                $conteos++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-6">
                        <div class="row g-3">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Beneficiario</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->beneficiario}}</div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Teléfono</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->telefono}}</div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Conformidad</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->conformidad}}</div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Comentarios</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 70px">{{$admin_ot_requerido->comentarios}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card h-100 mb-3" style="min-height: 150px">
                    <div class="card-body p-2">
                        <p class="text-uppercase fw-bold small">Requerimiento de materiales</p>
                        <div class="table-responsive" style="min-height: 150px">
                            <table class="table table-striped w-100 table-sm">
                                <thead class="text-white" style="background-color: #878D95">
                                    <tr class="small">
                                        <th class="fw-bold text-uppercase small text-center">N°</th>
                                        <th class="fw-bold text-uppercase small text-center">Código</th>
                                        <th class="fw-bold text-uppercase small text-center">Descripción</th>
                                        <th class="fw-bold text-uppercase small text-center">Tipo</th>
                                        <th class="fw-bold text-uppercase small text-center">Und.</th>
                                        <th class="fw-bold text-uppercase small text-center">Cantidad</th>
                                        <th class="fw-bold text-uppercase small text-center">Cantidad Devuelta</th>
                                        <th class="fw-bold text-uppercase small text-center">Cantidad Utilizada</th>
                                    </tr>
                                </thead>
                                @php
                                    $conteos_dtlle_mat = 1;
                                    $admin_dtlle_plani = \App\Models\DtlleOtrabajo::where('orden_trabajo_id',$admin_ot_requerido->id)->get();
                                @endphp
                                <tbody>
                                    @foreach($admin_dtlle_plani as $admin_dtlle_planis)
                                    <tr>
                                        <td class="align-middle small text-uppercase text-center">{{$conteos_dtlle_mat}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->codigo}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->producto}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->tipo_producto}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->umedida}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->cantidad}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->cantidad_devuelta?$admin_dtlle_planis->cantidad_devuelta:'0'}}</td>
                                        <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_planis->cantidad_utilizada?$admin_dtlle_planis->cantidad_utilizada:'0'}}</td>
                                    </tr>
                                        @php
                                            $conteos_dtlle_mat++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--<div class="card h-100">-->
                <!--    <div class="card-body p-2">-->
                <!--        <p class="text-uppercase text-muted fw-bold small mb-0">Compra de material</p>-->
                <!--        <div class="row g-2">-->
                <!--            <div class="col-12 col-md-6">-->
                <!--                <label for="name_id">Operario polifuncional<span class="text-danger">*</span></label>-->
                <!--                <input type="text" disabled class="form-control bg-white" value="{{$admin_ot_requerido->operario_funcional}}" aria-describedby="basic-addon2">-->
                <!--            </div>-->
                <!--            <div class="col-12 col-md-6">-->
                <!--                <label for="name_id">Supervisor contratista<span class="text-danger">*</span></label>-->
                <!--                <input type="text" disabled class="form-control bg-white" value="{{$admin_ot_requerido->supervisor_contratista}}" aria-describedby="basic-addon2">-->
                <!--            </div>-->
                <!--            <div class="col-12 col-md-4">-->
                <!--                <label for="name_id">Técnico especialista SPCC<span class="text-danger">*</span></label>-->
                <!--                <input type="text" disabled class="form-control bg-white" value="{{$admin_ot_requerido->tecnico_especialista}}" aria-describedby="basic-addon2">-->
                <!--            </div>-->
                <!--            <div class="col-12 col-md-4">-->
                <!--                <label for="name_id">Encargado punto de entrega SPCC<span class="text-danger">*</span></label>-->
                <!--                <input type="text" disabled class="form-control bg-white" value="{{$admin_ot_requerido->encargado_spcc}}" aria-describedby="basic-addon2">-->
                <!--            </div>-->
                <!--            <div class="col-12 col-md-4">-->
                <!--                <label for="name_id">Número de vale de compra<span class="text-danger">*</span></label>-->
                <!--                <input type="text" disabled class="form-control bg-white" value="{{$admin_ot_requerido->n_vale_compra}}" aria-describedby="basic-addon2">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                 <div class="card h-100 mb-3" style="min-height: 150px">
                    <div class="card-body p-2">
                        <p class="text-uppercase fw-bold small">Devolución de materiales</p>
                        <div class="table-responsive">
                                    <table class="table table-striped w-100 table-sm">
                                        <thead class="text-white" style="background-color: #878D95">
                                            <tr class="small">
                                                <th class="fw-bold small text-uppercase">N°</th>
                                                <!--<th class="fw-bold small text-uppercase">Código</th>-->
                                                <th class="fw-bold small text-uppercase">Descripción</th>
                                                <th class="fw-bold small text-uppercase">U.M.</th>
                                                <th class="fw-bold small text-uppercase">Cantidad</th>
                                                <th class="fw-bold small text-uppercase">Condición</th>
                                                <th class="fw-bold small text-uppercase">V° B° SPCC</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $conteos_dtdevol = 1;
                                            $admin_dtlle_devol = \App\Models\DetalledvoTrabajo::where('orden_trabajo_id',$admin_ot_requerido->id)->get();
                                        @endphp
                                        <tbody>
                                            @foreach($admin_dtlle_devol as $admin_dtlle_devols)
                                            <tr>
                                                <td class="align-middle small text-uppercase text-center">{{$conteos_dtdevol}}</td>
                                                <!--<td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->codigo}}</td>-->
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->producto}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->umedida}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->cantidad}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->condicion}}</td>
                                                <td class="align-middle small text-uppercase text-center">{{$admin_dtlle_devols->v_b_spcc}}</td>
                                            </tr>
                                                @php
                                                    $conteos_dtdevol++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
                
                <p class="text-uppercase fw-bold small mb-0">Posteo de la labor</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-8 col-lg-8">
                        @php
                            $admin_sup_contratista = \App\Models\User::where('id',$admin_ot_requerido->sup_pla_cont)->first();
                        @endphp
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>SUPERVISOR PLANEAMIENTO CONTRATISTA</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido?$admin_ot_requerido->sup_pla_cont:''}}</div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Fecha</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->fecha_sup_pla_cont}}</div>
                    </div>
                </div>

                <p class="text-uppercase fw-bold small mb-0">Cierre de la O.T.</p>
                <div class="row g-3 mb-4">
                    @php
                        $admin_tec_supervisor = \App\Models\User::where('id',$admin_ot_requerido->tec_esp_spcc_supervisor)->first();
                    @endphp
                    <div class="col-12 col-md-3 col-lg-3">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>TECNICO ESPECIALISTA SPCC (SUPERVISOR)</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido?$admin_ot_requerido->tec_esp_spcc_supervisor:''}}</div>
                    </div>
                    
                    @php
                        $admin_tec_planeamiento = \App\Models\User::where('id',$admin_ot_requerido->tec_esp_spcc_planeamiento)->first();
                    @endphp
                    <div class="col-12 col-md-3 col-lg-3">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>TECNICO ESPECIALISTA SPCC (PLANEAMIENTO)</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido?$admin_ot_requerido->tec_esp_spcc_planeamiento:''}}</div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>ALMACEN CONTRATISTA</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido?$admin_ot_requerido->almacen_contratista:''}}</div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Fecha cierre O.T.</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_ot_requerido->fecha_cierre_ot}}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Observaciones</small></label>
                        <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 70px">{{$admin_ot_requerido->observaciones_cierre_ot}}</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="pt-3 text-end" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <a href="{{ route('admin-ot-requeridos.index') }}" class="btn btn-grey">Volver atrás</a>
        </div>
    </div>
{{-- Fin contenido --}}
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#departamento_id').change(function() {
            valor_departamento = $(this).val();
            $.get('/departamento_planificacion', {
                valor_departamentos: valor_departamento
            }, function(operaciones) {
                $("#equipo_id").empty('');
                $('#equipo_id').append(
                        "<option selected disabled>Selecciona una opcion</option>"
                        );
                $.each(operaciones, function(index, value) {
                    $('#equipo_id').append(
                        "<option value='" + value[0] +"'>" + value[0] + "</option>");
                });
            });
        });


        $('#supervisor_general_id').change(function() {
            valor_supervisor_g = document.getElementById('supervisor_general_id').value.split('_');
            $('#telefono_id').val(valor_supervisor_g[2]);
            $('#supervisor_general_value_id').val(valor_supervisor_g[1]);
        });

        


        var cont_mp = 1;
        $('#btnasignar').click(function() {
            var usuario_value = document.getElementById('opera_pulifuncional_id').value.split('_');

            if(usuario_value != ''){
                var fila = '<tr class="selected igv_carta" id="filarp' + cont_mp +
                        '"><td class="align-middle fw-normal text-center">' + cont_mp + '</td><td class="align-middle fw-normal">' +
                        usuario_value[1] + '</td><td class="align-middle fw-normal"><input type="text" class="form-control form-control-sm" name="reg[]"></td><td class="align-middle fw-normal"><input type="text" class="form-control form-control-sm" name="hp[]"></td><td class="align-middle fw-normal"><input type="text" class="form-control form-control-sm" name="hh[]"></td><input type="hidden" name="id_usuario[]" value="' + usuario_value[0] +
                        '"><input type="hidden" name="usuario_name[]" value="' + usuario_value[1] +
                        '"><td class="align-middle"><button class="btn btn-sm btn-outline-danger" onclick="eliminarp(' +
                        cont_mp + ');"><i class="bi bi-trash"></i></button></td></tr>';
                    cont_mp++;

                    $('#opera_pulifuncional_id').val('').trigger('change');

                    $('#dtlle_polifuncional').append(fila);
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al ingresar el detalle del ingreso, revise los datos del producto',
                })
            }
        });



        $('#productos_id').change(function() {
            valor_prod_almacen = document.getElementById('productos_id').value.split('_');
            $.get('/cantidad_almacen', {
                valor_prod_almacens: valor_prod_almacen
            }, function(operaciones) {
                $.each(operaciones, function(index, value) {
                    $('#basic-addon2').html(value[0]+' Unds');
                    $('#cantidad_almacenada').val(value[0]);
                });
            });
        });


        var cont_pla = 1;

        var programac_id = $('#id_programacion_value').val();
        $.get('/dtlle_programacion', {programac_ids: programac_id}, function(value_progr) {
            $.each(value_progr, function(index, value) {
                var fila = '<tr class="selected igv_carta" id="filapla' + cont_pla +
                        '"><td class="align-middle fw-normal">' + cont_pla + '</td><td class="align-middle fw-normal">' +
                        value[1] + '</td><td class="align-middle fw-normal">' + value[2] +
                        '</td><td class="align-middle fw-normal">' + value[3] +
                        '</td><td class="align-middle fw-normal">' + value[4] +
                        '</td><input type="hidden" name="id_producto[]" value="' + value[0] +
                        '"><input type="hidden" name="codigo_pro[]" value="' + value[1] +
                        '"><input type="hidden" name="name_producto[]" value="' + value[2] +
                        '"><input type="hidden" name="medida_producto[]" value="' + value[3] +
                        '"><input type="hidden" name="cantidad_producto[]" value="' + value[4] +
                        '"><td class="align-middle"><button type="button" class="btn btn-sm btn-danger" onclick="eliminaot(' +
                        cont_pla + ');"><i class="bi bi-trash"></i></button></td></tr>';
                    cont_pla++;

                    $('#dt_ot_pla').append(fila);
            });
        });


        $('#btnasignar_ot').click(function() {
            var productos_value = document.getElementById('productos_id').value.split('_');
            var cantidad_value = $('#cantidad_id').val();
            var cantidad_alma = $('#cantidad_almacenada').val();
            cantidad_value = parseInt(cantidad_value);
            cantidad_alma = parseInt(cantidad_alma);

            if(productos_value != '' && cantidad_value != '' && cantidad_value > 0 && cantidad_value < cantidad_alma){
                var fila = '<tr class="selected igv_carta" id="filapla' + cont_pla +
                        '"><td class="align-middle fw-normal">' + cont_pla + '</td><td class="align-middle fw-normal">' +
                        productos_value[1] + '</td><td class="align-middle fw-normal">' + productos_value[2] +
                        '</td><td class="align-middle fw-normal">' + productos_value[3] +
                        '</td><td class="align-middle fw-normal">' + cantidad_value +
                        '</td><input type="hidden" name="id_producto[]" value="' + productos_value[0] +
                        '"><input type="hidden" name="codigo_pro[]" value="' + productos_value[1] +
                        '"><input type="hidden" name="name_producto[]" value="' + productos_value[2] +
                        '"><input type="hidden" name="medida_producto[]" value="' + productos_value[3] +
                        '"><input type="hidden" name="tipo_producto[]" value="' + productos_value[4] +
                        '"><input type="hidden" name="cantidad_producto[]" value="' + cantidad_value +
                        '"><td class="align-middle"><button type="button" class="btn btn-sm btn-danger" onclick="eliminaot(' +
                        cont_pla + ');"><i class="bi bi-trash"></i></button></td></tr>';
                    cont_pla++;

                    $('#productos_id').val('').trigger('change');
                    $('#cantidad_id').val('');
                    $('#basic-addon2').html(' ');
                    $('#cantidad_almacenada').val('');

                    $('#dt_ot_pla').append(fila);
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al ingresar el detalle de lo requerido, revise los datos del producto',
                })
            }
        });
    });

    function eliminarp(indexmp) {
        $("#filarp" + indexmp).remove();
    }

    function eliminaot(indexpla) {
        $("#filapla" + indexpla).remove();
    }
</script>
@endsection