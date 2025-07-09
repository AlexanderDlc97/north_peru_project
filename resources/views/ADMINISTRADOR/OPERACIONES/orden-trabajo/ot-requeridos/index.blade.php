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
                        <li class="breadcrumb-item link" aria-current="page">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

{{-- Contenido --}}
    <div class="container-fluid">   
        <div class="card border-4 borde-top-primary shadow-sm h-100" style="border-radius: 20px; min-height: 500px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-header bg-transparent">
                <div class="row g-2 justify-content-between">
                    @if(Auth::user()->hasAnyCargo(['Supervisor de Planeamiento','Tecnico Planer','Logistica', 'Supervisor General']))
                        <div class="col-9 col-md-3 col-xl-2 mb-2 mb-lg-0 order-1 order-md-1 order-lg-1 order-xl-1">
                            <a href="{{ route('admin-ot-requeridos.create') }}" class="btn btn-primary btn-sm text-uppercase text-white w-100" style="border-radius: 20px">
                                <i class="bi bi-plus-circle me-2"></i>
                                Nuevo registro
                            </a>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 col-xl-4 mb-2 mb-lg-0 order-3 order-md-2 order-lg-2 order-xl-2">
                        <div class="input-group input-group-sm W-100">
                            <input type="date" id="fecha_inicio" class="form-control" style="border-radius: 20px 0 0 20px">
                            <input type="date" id="fecha_fin" class="form-control">
                            <button class="btn btn-primary" id="button_search" style="border-radius: 0 20px 20px 0">FILTRAR</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 col-xl-2 mb-2 mb-lg-0 order-2 order-md-3 order-lg-3 order-xl-3">
                        <!--<button type="button" class="btn btn-dark btn-sm w-100" style="border-radius: 20px" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-download"></i></button>-->
                        <!--<ul class="dropdown-menu">      -->
                        <!--    <li class="dropdown-item">-->
                        <!--        <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#reporte_Excel"><i class="bi bi-file-excel me-2"></i><small>EXCEL</small></button>-->
                        <!--    </li>                                            -->
                        <!--    <li class="dropdown-item">-->
                        <!--        <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#reporte_PDF"><i class="bi bi-file-pdf me-2"></i><small>PDF</small></button>-->
                        <!--    </li>                                                    -->
                        <!--</ul>-->
                        <input type="text" id="buscar_ots" class="form-control form-control-sm" placeholder="Buscar por Codigo">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 col-12 col-md-6">
                    <span class="text-uppercase">Total de registros encontrados: <span class="fw-bold" id="contador_lista">{{$admin_ot_requeridos->count()}}</span></span>
                </div>
                <table id="datos" class="table table-hover nowrap" cellspacing="0" style="width:100%">
                    <thead class="border-0">
                        <tr>
                            <th class="h6 small text-center text-uppercase fw-bold">N°</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Código</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Departamento</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Fecha</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Equipo</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Avance</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Estado</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tble_index_requeridos">
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($admin_ot_requeridos as $admin_ot_requerido)
                            @php
                                $depart = \App\Models\Departamento::where('id',$admin_ot_requerido->departamento_id)->first();
                            @endphp
                            <tr>
                                <td class="fw-normal text-center align-middle">{{$contador}}</td>
                                <td class="fw-normal text-center align-middle">{{$admin_ot_requerido->codigo}}</td>
                                <td class="fw-normal text-center align-middle">{{$admin_ot_requerido->ubicacion_tecnica}}</td>
                                <td class="fw-normal text-center align-middle">{{$admin_ot_requerido->fecha_emision}}</td>
                                <td class="fw-normal text-center align-middle">{{$admin_ot_requerido->equipo}}</td>
                                <td class="fw-normal text-center align-middle">
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar overflow-visible" style="width: {{$admin_ot_requerido->porcentaje}}%">{{$admin_ot_requerido->porcentaje}}%</div>
                                    </div>
                                </td>
                                <td class="fw-normal text-center align-middle small">
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
                                    @elseif($admin_ot_requerido->estado == "Por Atender")
                                        bg-dark
                                    @endif
                                    small border-0">{{$admin_ot_requerido->estado}}</span>
                                </td>  
                                <td class="text-center align-middle">                                        
                                    <div class="text-start text-md-center">
                                        <div class="dropstart">
                                            <button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">                                                
                                                <li class="dropdown-item">
                                                <a href="/admin-ot-requeridos/{{$admin_ot_requerido->slug}}" class="text-decoration-none" style="color: #000;"><i class="bi bi-eye-fill me-2"></i>Ver detalles</a>
                                                </li>   
                                                @if(Auth::user()->hasAnyCargo(['Supervisor de Planeamiento','Tecnico Planer','Logistica', 'Supervisor General']))
                                                    @if($admin_ot_requerido->estado == 'FINALIZADO')
                                                    @else
                                                        <li class="dropdown-item">
                                                            <a href="{{route('admin-ot-requeridos.edit',$admin_ot_requerido->slug)}}" class="text-decoration-none" style="color: #000;"><i class="bi bi-pencil-square me-2"></i>Editar</a>
                                                        </li>  
                                                    @endif  
                                                @endif
                                                <!--<li class="dropdown-item">
                                                    <form method="POST" action="{{ route('admin-ot-requeridos.destroy',$admin_ot_requerido->slug) }}" class="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-transparent mx-0 px-0 border-0"><i class="bi bi-trash-fill me-2"></i>Eliminar</button>        
                                                    </form>
                                                </li>-->                                          
                                            </ul>
                                        </div>
                                    </div>      
                                </td>
                            </tr>
                            @php
                                $contador++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{-- Fin contenido --}}
@endsection
@section('js')

    @if(session('addrequeridos') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#1C3146',
        title: '¡Éxito!',
        text: 'Registro generado correctamente',
        })
    </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#1C3146',
        title: '¡Actualizado!',
        text: 'Registro actualizado correctamente',
        })
    </script>
    @endif

    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
    <script>
    Swal.fire({
        icon: 'success',
        confirmButtonColor: '#1C3146',
        title: '¡Eliminado!',
        text: 'Registro eliminado correctamente',
        })
    </script>
    @endif
    <script>
    $('.form-delete').submit(function(e){
        e.preventDefault();

        Swal.fire({
        title: '¿Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1C3146',
        cancelButtonColor: '#FF9C00',
        confirmButtonText: '¡Sí, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            
        this.submit();
        }
        })

    });
    </script>

    @if(session('error_relacion') == 'ok')
        <script>
        Swal.fire({
            icon: 'error',
            confirmButtonColor: '#1C3146',
            title: 'Error!',
            text: 'Verifique que este registro no este siendo utilizado en otra seccion',
            })
        </script>
    @endif
    
    
    
    <script>
    $(document).ready(function() {
        var contador_mps = 1;
        $('#button_search').on('click', function(){
            var fecha_inicio = $('#fecha_inicio').val();
            var fecha_fin = $('#fecha_fin').val();
            var sede_id = $('#lista_sedes').val();
            console.log(fecha_inicio,fecha_fin);
            $.get('/lista_index_requeridos',{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin}, function(busqueda){
                $('#tble_index_requeridos').empty("");
                contador_mps = 1;
                $.each(busqueda, function(index, value){
                    var contador_lista = contador_mps;
                    console.log(contador_lista);
                    if(value[0] == 'Sin datos'){
                        $('#contador_lista').html(0);
                        $('#tble_index_compras').empty("");
                    }else{
                        $('#contador_lista').html(contador_lista);
                        if(value[5] == 'PENDIENTE'){
                            estados_requeri = '<span class="text-uppercase badge bg-danger small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'APROBADO'){
                            estados_requeri = '<span class="text-uppercase badge bg-warning small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'ORGANIZACION'){
                            estados_requeri = '<span class="text-uppercase badge bg-indigo small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'REVISION'){
                            estados_requeri = '<span class="text-uppercase badge bg-info small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'EN PROCESO'){
                            estados_requeri = '<span class="text-uppercase badge bg-grey small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'FINALIZADO'){
                            estados_requeri = '<span class="text-uppercase badge bg-primary small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'Por Atender'){
                            estados_requeri = '<span class="text-uppercase badge bg-dark small border-0">'+value[5]+'</span>';
                        }else{
                            estados_requeri = '';
                        }
                        
                            if(value[5] == 'FINALIZADO'){
                                valor_editar = '';
                            }else{
                                valor_editar = '<li class="dropdown-item"><a href="admin-ot-requeridos_edit/'+value[6]+'" class="text-decoration-none" style="color: #000;"><i class="bi bi-pencil-square me-2"></i>Editar</a></li>  ';
                            }
                        
                        var fila = '<tr id="filamp' + contador_mps +'"><td class="fw-normal text-center align-middle">'+contador_mps+'</td><td class="fw-normal text-center align-middle">'+value[0]+'</td><td class="fw-normal text-center align-middle">'+value[1]+'</td><td class="fw-normal text-center align-middle">'+value[2]+'</td><td class="fw-normal text-center align-middle">'+value[3]+'</td><td class="fw-normal text-center align-middle"><div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar overflow-visible" style="width: '+value[4]+'%">'+value[4]+'%</div></div></td><td class="fw-normal text-center align-middle small">'+estados_requeri+'</td><td class="text-center align-middle"><div class="text-start text-md-center"><div class="dropstart"><button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button><ul class="dropdown-menu">                                                <li class="dropdown-item"><a href="/admin-ot-requeridos/'+value[6]+'" class="text-decoration-none" style="color: #000;"><i class="bi bi-eye-fill me-2"></i>Ver detalles</a></li>'+valor_editar+'</ul></div></div></td></tr>';
                        contador_mps++;
                        $('#tble_index_requeridos').append(fila);
                    }
                });
            });
        });
        
        
        $( "#buscar_ots" ).on( "keyup", function() {
            valor_ots = $('#buscar_ots').val();
            $.get('/lista_index_requeridos_codigo_requer',{valor_ots:valor_ots}, function(busqueda){
                $('#tble_index_requeridos').empty("");
                contador_mps = 1;
                $.each(busqueda, function(index, value){
                    var contador_lista = contador_mps;
                    console.log(contador_lista);
                    if(value[0] == 'Sin datos'){
                        $('#contador_lista').html(0);
                        $('#tble_index_compras').empty("");
                    }else{
                        $('#contador_lista').html(contador_lista);
                        if(value[5] == 'PENDIENTE'){
                            estados_requeri = '<span class="text-uppercase badge bg-danger small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'APROBADO'){
                            estados_requeri = '<span class="text-uppercase badge bg-warning small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'ORGANIZACION'){
                            estados_requeri = '<span class="text-uppercase badge bg-indigo small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'REVISION'){
                            estados_requeri = '<span class="text-uppercase badge bg-info small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'EN PROCESO'){
                            estados_requeri = '<span class="text-uppercase badge bg-grey small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'FINALIZADO'){
                            estados_requeri = '<span class="text-uppercase badge bg-primary small border-0">'+value[5]+'</span>';
                        }else if(value[5] == 'Por Atender'){
                            estados_requeri = '<span class="text-uppercase badge bg-dark small border-0">'+value[5]+'</span>';
                        }else{
                            estados_requeri = '';
                        }
                        
                            if(value[5] == 'FINALIZADO'){
                                valor_editar = '';
                            }else{
                                valor_editar = '<li class="dropdown-item"><a href="admin-ot-requeridos_edit/'+value[6]+'" class="text-decoration-none" style="color: #000;"><i class="bi bi-pencil-square me-2"></i>Editar</a></li>  ';
                            }
                        
                        var fila = '<tr id="filamp' + contador_mps +'"><td class="fw-normal text-center align-middle">'+contador_mps+'</td><td class="fw-normal text-center align-middle">'+value[0]+'</td><td class="fw-normal text-center align-middle">'+value[1]+'</td><td class="fw-normal text-center align-middle">'+value[2]+'</td><td class="fw-normal text-center align-middle">'+value[3]+'</td><td class="fw-normal text-center align-middle"><div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar overflow-visible" style="width: '+value[4]+'%">'+value[4]+'%</div></div></td><td class="fw-normal text-center align-middle small">'+estados_requeri+'</td><td class="text-center align-middle"><div class="text-start text-md-center"><div class="dropstart"><button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button><ul class="dropdown-menu">                                                <li class="dropdown-item"><a href="/admin-ot-requeridos/'+value[6]+'" class="text-decoration-none" style="color: #000;"><i class="bi bi-eye-fill me-2"></i>Ver detalles</a></li>'+valor_editar+'</ul></div></div></td></tr>';
                        contador_mps++;
                        $('#tble_index_requeridos').append(fila);
                    }
                });
            });
        } );

    });
    </script>
@endsection