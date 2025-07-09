@extends('TEMPLATE.administrador')

@section('title', 'CONFIGURACIONES')

@section('css')
@endsection
 
@section('content')
<!-- Encabezado -->
<div class="header_section">
    <div class="bg-transparent mb-3" style="height: 67px"></div>
    <div class="container-fluid">
        <div class="" data-aos="fade-right">
            <h1 class="titulo h2 text-uppercase fw-bold mb-0"> CONFIGURACIONES</h1>
            <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Principal</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-configuraciones') }}">Configuraciones</a></li>
                    <li class="breadcrumb-item link" aria-current="page">Inicio</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Fin encabezado-->

{{-- Contenido --}}
<div class="container-fluid">
    <div class="row"> 
        @if(Auth::user()->role_id == '1')
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card border-4 borde-top-primary box-shadow h-100" style="border-radius: 20px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <div class="card-header bg-transparent">
                    <span class="text-uppercase fw-bold" style="color: #515151">Persona</span>
                </div>
                <div class="card-body pb-0">
                    <p class="fw-normal" align="justify">Configura la información de usuarios del sistema.</p>
                    <ul class="list-unstyled">                        
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-people me-2"></i>
                            <a href="{{ url('admin-usuarios') }}" class="link-dark text-decoration-none">Usuarios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        
       
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card border-4 borde-top-primary box-shadow h-100" style="border-radius: 20px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <div class="card-header bg-transparent">
                    <span class="text-uppercase fw-bold" style="color: #515151">Servicios</span>
                </div>
                <div class="card-body pb-0">
                    <p class="fw-normal" align="justify">Gestiona información de atributos de los módulos del sistema.</p>
                    <ul class="list-unstyled">
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-bookmarks me-2"></i>
                            <a href="{{ url('admin-rubros') }}" class="link-dark text-decoration-none">Rubros</a>
                        </li>
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-diagram-3 me-2"></i>
                            <a href="{{ url('admin-categorias') }}" class="link-dark text-decoration-none">Categorías</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card border-4 borde-top-primary box-shadow h-100" style="border-radius: 20px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <div class="card-header bg-transparent">
                    <span class="text-uppercase fw-bold" style="color: #515151">Logistica</span>
                </div>
                <div class="card-body pb-0">
                    <p class="fw-normal" align="justify">Gestiona información de atributos de los bienes de la empresa.</p>
                    <ul class="list-unstyled">
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-rulers me-2"></i>
                            <a href="{{ url('admin-medidas') }}" class="link-dark text-decoration-none">Unidad de medida</a>
                        </li>
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-tags me-2"></i>
                            <a href="{{ url('admin-marcas') }}" class="link-dark text-decoration-none">Marcas</a>
                        </li>
                        <li class="text-dark mb-2 menu_item">
                            <i class="bi bi-ui-checks-grid me-2"></i>
                            <a href="{{ url('admin-activos-materiales') }}" class="link-dark text-decoration-none">Activos y materiales</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       
    </div>
</div>
{{-- Fin contenido --}}
@endsection
@section('js')

@endsection