@extends('TEMPLATE.administrador')

@section('title', 'USUARIOS')

@section('css')
@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0">USUARIOS</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Principal</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-configuraciones') }}">Configuraciones</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-usuarios') }}">Usuarios</a></li>
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
                    <div class="col-9 col-md-3 col-xl-2">
                        <a href="{{ route('admin-usuarios.create') }}" class="btn btn-primary btn-sm text-uppercase text-white w-100" style="border-radius: 20px">
                            <i class="bi bi-plus-circle me-2"></i>
                            Nuevo registro
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 col-12 col-md-6">
                    <span class="text-uppercase">Total de registros encontrados: <span class="fw-bold">0</span></span>
                </div>
                <table id="datos" class="table table-hover nowrap" cellspacing="0" style="width:100%">
                    <thead class="border-0">
                        <tr class="">
                            <th class="h6 small text-center text-uppercase fw-bold">N°</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Foto</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Usuario</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Cargo</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Procedencia</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Estado</th>
                            <th class="h6 small text-center text-uppercase fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-normal align-middle">1</td>
                            <td class="text-center align-middle">
                                    <img src="/images/user.jpg" class="img-fluid" style="width: 40px; height: 40px; objet-fit:cover" alt="">
                            </td>
                            <td class="fw-normal align-middle text-capitalize">Alexander De La Cruz</td>
                            <td class="fw-normal text-center align-middle">
                                <span class="badge bg-grey text-uppercase small">
                                    Logística
                                </span>
                            </td>
                            
                            <td class="fw-normal text-center align-middle">Ica</td>
                            <td class="fw-normal text-center align-middle small">
                                <span class="badge text-uppercase small bg-success border-0">Activo</span>
                            </td>  
                            <td class="text-center align-middle">                                        
                                <div class="text-start text-md-center">
                                    <div class="dropstart">
                                        <button type="button" class="btn btn-grey btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">                                                
                                            <li class="dropdown-item">
                                                <button class="bg-transparent border-0 px-0 mx-0" data-bs-toggle="modal" data-bs-target="#showusuario"><i class="bi bi-eye-fill me-2"></i>Ver detalles</button>
                                            </li>      
                                            <li class="dropdown-item">
                                                <a href="" class="text-decoration-none" style="color: #000;"><i class="bi bi-pencil-square me-2"></i>Editar</a>
                                            </li>   
                                            <li class="dropdown-item">
                                                    <button type="submit" class="bg-transparent mx-0 px-0 border-0"><i class="bi bi-trash-fill me-2"></i>Eliminar</button>        
                                            </li>    
                                        </ul>
                                    </div>
                                </div>      
                            </td>
                        </tr>                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('ADMINISTRADOR.PRINCIPAL.configuraciones.usuarios.show')   
{{-- Fin contenido --}}
@endsection
@section('js')

    @if(session('addpermisos') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#1C3146',
        title: '¡Éxito!',
        text: 'Permiso generado correctamente',
        })
    </script>
    @endif

    @if(session('addusuario') == 'ok')
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

    <script>
        $('button[id=click_permiso]').click(function() {
            var cont_asist_fecha = 1;
            var valor_slug = $(this).data("id");
            console.log(valor_slug);
            $('#btnasignardes'+valor_slug).click(function() {
                console.log(cont_asist_fecha);
                var fecha_iniciando = $('#fecha_inic'+valor_slug).val();
                var fecha_terminando = $('#fecha_fi'+valor_slug).val();
                var tipo_permiso = $('#tipo_permiso'+valor_slug).val();
                
                
                $('#dt_fecha_des'+valor_slug).append("");
                if(fecha_iniciando != '' && fecha_terminando != '' && cont_asist_fecha < 2){
    
      
                        var fila = '<tr class="text-center" id="filarfecha' + cont_asist_fecha +
                            '"><td class="align-middle fw-normal"><input class="form-control" type="text" hidden name="count_permisios[]" value="' + cont_asist_fecha +
                            '">' + cont_asist_fecha + '</td><td class="align-middle fw-normal"><input class="form-control" type="text" hidden name="fecha_inicio[]" value="' + fecha_iniciando +
                            '">' + fecha_iniciando +'</td><td class="align-middle fw-normal"><input class="form-control" type="text" hidden name="fecha_fin[]" value="' + fecha_terminando +
                            '">' + fecha_terminando +'</td><td class="align-middle fw-normal"><input class="form-control" type="text" hidden name="tipo_permiso[]" value="' + tipo_permiso +
                            '">' + tipo_permiso +'</td><td class="align-middle text-uppercase text-center"><span class="badge text-uppercase small bg-success border-0"><input class="form-control" type="text" hidden name="estado[]" value="Vigente">VIGENTE</span></td><td class="align-middle"><button type="button" class="bg-transparent border-0 text-danger" id="eliminad_descanso" data-id="'+cont_asist_fecha+'"><i class="bi bi-trash"></i></button></td></tr>';
                        cont_asist_fecha++;
    
                        $('#fecha_inic'+valor_slug).val('').trigger('change');
                        $('#fecha_fi'+valor_slug).val('').trigger('change');
                        
    
                        $('#dt_fecha_des'+valor_slug).append(fila);

                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error al ingresar las fechas, revise los datos en los desplegables seleccionados',
                    })
                }
                $('button[id=eliminad_descanso]').click(function() {
                    console.log($(this).data("id"));
                    var valor_index = $(this).data("id");
                    $("#filarfecha" + valor_index).remove();
                    cont_asist_fecha = 1;
                });
            });
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