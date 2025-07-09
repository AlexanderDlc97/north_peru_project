<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORTH PERÚ | ADMIN | @yield('title')</title>
    <link rel="icon" href="/images/icon.jpg">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/panel.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/select2.min.css"/>
    <link rel="stylesheet" href="/css/select2-bootstrap-5-theme.min.css"/>
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="/css/responsive.bootstrap5.css"/>
    @yield('css')
    @stack('meta')
    <style>
        .bg-sidebar
        {
            background: #AB0C12;
            background: linear-gradient(180deg, rgba(171, 12, 18, 1) 0%, rgba(221, 20, 34, 1) 50%);
        }
        
        .bg-indigo
        {
          background-color: #6610f2 !important;
        }
        
        .bg-grey
        {
          background-color: #6c757d !important;
        }

    </style>
</head>
<body class="bg-light">
    <!-- sidebar -->      
        <div class="offcanvas offcanvas-start shadow-sm bg-sidebar sidebar-nav border-0" tabindex="-1" id="offcanvasmenu">
            <div class="card content_user">
                <img src="/images/header_control.jpg" class="header_user" alt="">
                <div class="card-body text-center">
                    <div class="avatar">
                        <img src="
                        @if(Auth::user()->imagen == "NULL")
                            /images/user.jpg
                        @else
                            /images/Usuarios/{{ Auth::user()->imagen }}
                        @endif
                        " alt="">
                    </div>
                    <div class="info_user">
                        <p class="fw-bold text-white fs-5 mb-0">{{Auth::user()->name.' '.Auth::user()->lastname_apellidos}}</p>
                        <p class="fw-light text-light mb-0">{{Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body pb-2 p-0">
                <div class="navbar-white">
                    <ul class="navbar-nav">
                        <div class="">
                            
                            <li>
                                <div class="text-white small fw-bold text-uppercase px-3">principal</div>
                            </li>
                            <li class="mx-2 my-1">
                                <a href="{{ url('admin-dashboard') }}" class="nav-link px-3 menu text-white {{ request()->is(['admin-dashboard*'])? 'active-item' : null }}">
                                    <span class="fw-bold">
                                        <i class="bi bi-pie-chart me-2"></i>
                                    </span>
                                    <span>
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li class="mx-2 my-1">
                                <a href="{{ url('admin-configuraciones') }}" class="nav-link px-3 menu text-white {{ request()->is(['admin-configuraciones*', 'admin-roles*', 'admin-costos-hh*', 'admin-sectores*', 'admin-perfil*', 'admin-rubros*', 'admin-categorias*', 'admin-inmuebles*', 'admin-spcc*', 'admin-usuarios*', 'admin-centro-costos*', 'admin-activos-materiales*', 'admin-departamentos*', 'admin-equipos*', 'admin-residentes*', 'admin-medidas*', 'admin-marcas*', 'admin-programaciones*'])? 'active-item' : null }}">
                                    <span class="fw-bold">
                                        <i class="bi bi-gear me-2"></i>
                                    </span>
                                    <span>
                                        Configuraciones
                                    </span>
                                </a>
                            </li>
                            
                            <li>
                                <div class="text-white small fw-bold text-uppercase px-3">Operaciones</div>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{ url('admin-ot-requeridos') }}" class="nav-link px-3 menu text-white {{ request()->is(['admin-ot-requeridos*'])? 'active-item' : null }}">
                                    <span class="fw-bold">
                                        <i class="bi bi-suitcase-lg me-2"></i>
                                    </span>
                                    <span>
                                        Orden de trabajo
                                    </span>
                                </a>
                            </li>
                           
                            <li>
                                <div class="text-white small fw-bold text-uppercase px-3">Logística</div>
                            </li>

                            <li class="mx-2 my-1">
                                <a href="{{ url('admin-inventario') }}" class="nav-link px-3 menu text-white {{ request()->is(['admin-inventario*'])? 'active-item' : null }}">
                                    <span class="fw-bold">
                                        <i class="bi bi-boxes me-2"></i>
                                    </span>
                                    <span>
                                        Inventario
                                    </span>
                                </a>
                            </li>
                        </div> 
                    </ul>
                </div>
            </div>
            <div class="offcanvas-footer border-top">
                <div class="text-white py-2">
                    <p class="mb-0" style="font-size: 12px" align="center">Copyright © <?php echo date("Y");?> <a href="#" style="text-decoration: none;" class="text-white fw-bold">NORTH PERU S.A.C.</a> - Todos los derechos Reservados</p>
                </div>
            </div>
        </div>
    <!-- fin sidebar -->
    
    <!-- contenido -->
    <main>
        <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-3 mb-2">
                <div class="container-fluid mt-1">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="ms-auto d-flex">
                        <div class="dropdown align-self-center">
                            <a class="dropdown-toggle text-decoration-none" href="#" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name.' '.Auth::user()->lastname_apellidos}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 py-0" aria-labelledby="dropdownMenuButton2" style="width: 285px; font-size: 15px; border-radius: 20px; overflow: hidden">
                                <img src="/images/header_control.jpg" class="header_user" style="border-radius: 20px 20px 0 0" alt="">
                                <div class="contenido">
                                    <div class="avatar_dropdown ps-3">
                                        <img src="
                                            @if(Auth::user()->imagen == "NULL")
                                                /images/user.jpg
                                            @else
                                                /images/Usuarios/{{Auth::user()->imagen}}
                                            @endif
                                        " alt="">
                                    </div>
                                    <div class="info_user ps-3">
                                        <p class="fw-bold mb-0">{{Auth::user()->name.' '.Auth::user()->lastname_apellidos}}</p>
                                        <p class="fw-light small text-muted mb-0">{{Auth::user()->email}}</p>
                                    </div>
                                </div>                                
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </nav>
        <!-- fin navbar -->

        <div class="mb-3">
            @yield('content')
        </div>
    </main>
    <!-- fin contenido -->
        
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/select2.full.min.js"></script>
    <script src="/js/dataTables.js"></script>
    <script src="/js/dataTables.bootstrap5.js"></script>
    <script src="/js/dataTables.responsive.js"></script>
    <script src="/js/responsive.bootstrap5.js"></script>
    <script>
        $( '.select2_bootstrap' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>

    <script>
        $( '.select2_bootstrap_multiple' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    </script>
    <script>
        $( '.select2_bootstrap_2' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
    </script>
    <script>
        AOS.init();
    </script>
    <script>
        var nav = document.querySelector('nav');
        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 30){
                nav.classList.add('bg-nav');
                nav.classList.add('shadow');
            }else{
                nav.classList.remove('bg-nav');
                nav.classList.remove('shadow');
            }
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
          $(document).ready(function() {
            setInterval(() => {
                $.get('/admin_vigencia_permiso', {
                    envio_mensaje: 'Vigentes'
                }, function(operaciones) {
                    $.each(operaciones, function(index, value) {
                        console.log(operaciones)
                    });
                });
            }, 5000);
        });
    </script>

    <script>
        new DataTable('#datos', {
            responsive: true,
            fixedHeader: true,
            order: [[0, "desc"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontró nada, lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:"
            }
        });
    </script>

<script>
    $(document).ready(function() {
        $('table.display').DataTable( {
            responsive: true,
            fixedHeader: true,
            order: [[0, "desc"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontró nada, lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
            }
        } );
    new $.fn.dataTable.FixedHeader( table );
    } );
</script>

    



<script>
    $(document).ready(function() {
        $('table.noresponsive').DataTable( {
            scrollX: true,
            rowsGroup: [2],
            order: [[0, "desc"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontró nada, lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                // "paginate":{
                //     "next": "&raquo;",
                //     "previous": "&laquo;"
                // } 
            }
        } );
        new $.fn.dataTable.FixedHeader( table );
    } );
</script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

    <script>
        $('.select_location').on('change', function(){
            window.location = $(this).val();
        });
    </script>

    <!--sweet alert agregar-->
    @if(session('new_registration') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#1C3146',
        title: '¡Éxito!',
        text: 'Nuevo registro guardado correctamente',
        })
    </script>
    @endif

    @if(session('error') == 'ok')
    <script>
        Swal.fire({
        icon: 'error',
        confirmButtonColor: '#1C3146',
        title: '¡Error!',
        text: 'No se puede eliminar este registro. Asegurese de que no esté relacionado con un artículo',
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
    $('.select_location').on('change', function(){
        window.location = $(this).val();
    });
</script>
    @yield('js')
    @stack('scripts')
</body>
</html>