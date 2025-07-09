@extends('TEMPLATE.administrador')

@section('title', 'INVENTARIO')

@section('css')
@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0">INVENTARIO</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Logística</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-inventario') }}">Inventario</a></li>
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
                    <div class="col-9 col-md-6 col-xl-6 mb-2 mb-lg-0">
                        
                    </div>
                    <div class="col-3 col-md-2 col-xl-1 mb-2 mb-lg-0">
                        <button type="button" class="btn btn-dark btn-sm w-100" style="border-radius: 20px" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-download"></i></button>
                        <ul class="dropdown-menu">      
                            <li class="dropdown-item">
                                <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#reporte_Excel"><i class="bi bi-file-excel me-2"></i><small>EXCEL</small></button>
                            </li>                                            
                            <!--<li class="dropdown-item">
                                <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#reporte_PDF"><i class="bi bi-file-pdf me-2"></i><small>PDF</small></button>
                            </li>-->                                                       
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 col-12 col-md-6">
                    <span class="text-uppercase">Total de registros encontrados: <span class="fw-bold" id="contador_lista">{{$almacen->count()}}</span></span>
                </div>
                <table id="datos" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="border-0">
                        <tr>
                            <th class="h6 small text-center text-uppercase fw-bold">N°</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Tipo</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Descripción</th>
                            <th class="h6 small text-center text-uppercase fw-bold">U.M.</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Stock</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tble_index_inventarios">
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($almacen as $almacenes)
                            @php
                                $producto_tipo = \App\Models\Producto::where('id',$almacenes->producto_id)->first();
                            @endphp
                            <tr>
                                <td class="fw-normal text-center align-middle">{{$contador}}</td>
                                <td class="fw-normal text-center align-middle">{{$producto_tipo->tipo->name}}</td>
                                <td class="fw-normal text-center align-middle">{{$almacenes->producto}}</td>
                                <td class="fw-normal text-center align-middle">{{$almacenes->umedida}}</td>
                                <td class="fw-normal text-center align-middle small">
                                    <span class="text-uppercase badge 
                                    @if($almacenes->cantidad >=30)
                                        bg-primary
                                    @elseif($almacenes->cantidad < 30)
                                        bg-warning
                                    @elseif($almacenes->cantidad <=15)
                                        bg-danger
                                    @endif
                                    small border-0">{{$almacenes->cantidad}}</span>
                                </td>  
                                <td class="text-center align-middle">                                        
                                    <div class="text-start text-md-center">
                                        <div class="dropstart">
                                            <button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">                                                
                                                <li class="dropdown-item">
                                                    <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#showprodi{{$almacenes->producto_id}}"><i class="bi bi-eye-fill me-2"></i>Ver detalles</button>
                                                </li>                                             
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
@foreach ($almacen as $almacenes)
    @include('ADMINISTRADOR.LOGISTICA.almacen.inventario.show')
@endforeach
@endsection
@section('js')


<script>
    $(document).ready(function() {
        var contador_mps = 1;
        $('#button_search').on('click', function(){
            var inventario_value_list = $('#select_inventario').val();
            $.get('/lista_index_inventarios',{inventario_value_list:inventario_value_list}, function(busqueda){
                $('#tble_index_inventarios').empty("");
                contador_mps = 1;
                $.each(busqueda, function(index, value){
                    var contador_lista = contador_mps;
                    console.log(contador_lista);
                    if(value[0] == 'Sin datos'){
                        $('#contador_lista').html(0);
                        $('#tble_index_inventarios').empty("");
                    }else{
                        $('#contador_lista').html(contador_lista);
                        if(value[3] >= '30'){
                            estados_cantidad = '<span class="text-uppercase badge bg-primary small border-0">'+value[3]+'</span>';
                        }else if(value[3] < '30'){
                            estados_cantidad = '<span class="text-uppercase badge bg-warning small border-0">'+value[3]+'</span>';
                        }else if(value[3] <= '15'){
                            estados_cantidad = '<span class="text-uppercase badge bg-danger small border-0">'+value[3]+'</span>';
                        }else{
                            estados_cantidad = '';
                        }
                        
                        
                        var fila = '<tr id="filamp' + contador_mps +'"><td class="fw-normal text-center align-middle">'+contador_mps+'</td><td class="fw-normal text-center align-middle">'+value[0]+'</td><td class="fw-normal text-center align-middle">'+value[1]+'</td><td class="fw-normal text-center align-middle">'+value[2]+'</td><td class="fw-normal text-center align-middle">'+estados_cantidad+'</td><td class="text-center align-middle"><div class="text-start text-md-center"><div class="dropstart"><button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button><ul class="dropdown-menu"><li class="dropdown-item"><button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#showprodi'+value[4]+'"><i class="bi bi-eye-fill me-2"></i>Ver detalles</button></li></ul></div></div></td></tr>';
                        contador_mps++;
                        $('#tble_index_inventarios').append(fila);
                    }
                });
            });
        });
    });
    </script>
    
@endsection