@extends('TEMPLATE.administrador')

@section('title', 'CATEGORIAS')

@section('css')
@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0">CATEGORIAS</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Principal</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-configuraciones') }}">Configuraciones</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-categorias') }}">Categorias</a></li>
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
                <div class="row justify-content-between">
                    <div class="col-12 col-md-3 col-xl-2 d-flex">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createcategorias" class="btn btn-primary btn-sm text-uppercase text-white w-100" style="border-radius: 20px">
                            <i class="bi bi-plus-circle me-2"></i>
                            Nuevo registro
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 col-12 col-md-6">
                    <span class="text-uppercase">Total de registros encontrados: <span class="fw-bold">{{$admin_categorias->count()}}</span></span>
                </div>
                <table id="datos" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="border-0">
                        <tr>
                            <th class="h6 small text-center text-uppercase fw-bold">N°</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Nombre</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Estado</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($admin_categorias as $admin_categoria)
                            <tr>
                                <td class="fw-normal text-center align-middle">{{$contador}}</td>
                                <td class="fw-normal text-center align-middle">{{$admin_categoria->name}}</td>
                                <td class="fw-normal text-center align-middle small">
                                    <form method="POST" action="/admin-categorias/estado/{{ $admin_categoria->slug }}" class="form-update">
                                        @csrf
                                        @method('PUT')
                                            @if($admin_categoria->estado == 'Activo')
                                                <button type="submit" class="badge text-uppercase small bg-success border-0">Activo</button>
                                            @else
                                                <button type="submit" class="badge text-uppercase small bg-danger border-0">Inactivo</button>
                                            @endif
                                    </form>
                                </td>  
                                @if(Auth::user()->hasAnyCargo(['Supervisor de Planeamiento','Tecnico Planer','Logistica', 'Supervisor General']))
                                    <td class="text-center align-middle">                                        
                                        <div class="text-start text-md-center">
                                            <div class="dropstart">
                                                <button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">                                                
                                                    <li class="dropdown-item">
                                                    <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-id="{{$admin_categoria->slug}}" id="edit_button" data-bs-target="#edit_categoria{{$admin_categoria->slug}}"><i class="bi bi-pencil-square me-2"></i>Editar</button>
                                                    </li>  
                                                    <li class="dropdown-item">
                                                        <form method="POST" action="{{ route('admin-categorias.destroy',$admin_categoria->slug) }}" class="form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-transparent mx-0 px-0 border-0"><i class="bi bi-trash-fill me-2"></i>Eliminar</button>        
                                                        </form>
                                                    </li>                                          
                                                </ul>
                                            </div>
                                        </div>      
                                    </td>
                                @endif
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
    @include('ADMINISTRADOR.PRINCIPAL.configuraciones.categorias.create')
    @foreach ($admin_categorias as $admin_categoria)
        @include('ADMINISTRADOR.PRINCIPAL.configuraciones.categorias.edit')
    @endforeach
{{-- Fin contenido --}}
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#rubro_ids').select2({
            dropdownParent: $('#createcategorias')
        });
            
        $('button[id=edit_button]').on('click', function(){
            var valor_slug_cat = $(this).data("id");
            console.log(valor_slug_cat);
            $('#rubro_id'+valor_slug_cat).select2({
                dropdownParent: $('#edit_categoria'+valor_slug_cat)
            });
        });
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>

    @if(session('addcategorias') == 'ok')
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
@endsection