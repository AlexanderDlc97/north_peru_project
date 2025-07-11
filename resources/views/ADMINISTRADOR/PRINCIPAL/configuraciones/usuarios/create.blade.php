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
                        <li class="breadcrumb-item link" aria-current="page">Nuevo registro</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

{{-- Contenido --}}
<form method="POST" action="" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
    @csrf
    <div class="container-fluid"> 
        <div class="card border-4 borde-top-primary shadow-sm h-100" style="border-radius: 20px; min-height: 420px" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
                <div class="card border-0 rounded-0 border-start border-3 border-info mb-4" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px; background-color: #f6f6f6">
                    <div class="card-body py-2">
                        <i class="bi bi-info-circle text-info me-2"></i>Importante:
                        <ul class="list-unstyled mb-0 pb-0">
                            <li class="mb-0 pb-0">
                                <small class="text-muted py-0 my-0 text-start"> Se consideran campos obligatorios los campos que tengan este simbolo: <span class="text-danger">*</small></span>
                            </li>
                            <li class="mb-0 pb-0">
                                <small class="text-muted">Se recomienda tener en cuenta las siguientes medidas para la imágen: <span class="fw-bold">1200 x 1200 px.</span> Peso máximo de imagen:<span class="fw-bold"> 3 MB.</span></small>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-2">
                                <div class="mb-3">
                                    <div class="card text-center imagecard rounded mb-0" style="width: 100%; height: 165px; object-fit: cover; overflow: hidden">  
                                        <label for="uploadImage1" class=" my-auto text-center">
                                            <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto" style="width: 100%; height: 165px; object-fit: cover" src="/images/icon-photo.png">   
                                        </label>
                                    </div>
                                    <input id="uploadImage1" class="form-control-file" type="file" name="imagen" accept="image/*" onchange="previewImage(1);" hidden/>
                                    <div class="invalid-feedback">
                                        El campo no puede estar vacío
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-10">
                                <div class="row g-3">
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <label for="role_id">Roles<span class="text-danger">*</span></label>
                                        <select id="role_id" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required>
                                            <option value="" selected="selected" hidden="hidden">--Seleccione--</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Operario">Operario</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <label for="name_id">Nombres<span class="text-danger">*</span></label>
                                        <input name="name" id="name_id" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <label for="surnames_id">Apellidos<span class="text-danger">*</span></label>
                                        <input name="lastname_apellidos" id="surnames_id" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <label for="tipo_identificacion_id">Tipo de identificación<span class="text-danger">*</span></label>
                                        <select name="tipo_documento" id="tipo_identificacion_id" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required>
                                            <option value="" selected="selected" hidden="hidden">--Seleccione--</option>
                                            <option value="RUC">RUC</option>
                                            <option value="DNI">DNI</option>
                                            <option value="Carnet de extranjería">Carnet de extranjería</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <label for="nro_documento_id">Nro. de identificación<span class="text-danger">*</span></label>
                                        <input name="nro_documento" id="nro_documento_id" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <label for="nro_contacto_id">Nro. de contacto<span class="text-danger">*</span></label>
                                        <input name="nro_contacto" id="nro_contacto_id" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        <label for="fecha_nacimiento_id">Fecha de Nacimiento</label>
                                        <input name="fecha_nacimiento" id="fecha_nacimiento_id" type="date" class="form-control">
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="ubigeo_id">Procedencia<span class="text-danger">*</span></label>
                                        <select name="ubigeo_id" id="ubigeo_id" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required>
                                            <option value="{{ old('ubigeo_id') }}" selected="selected" hidden="hidden">{{ old('ubigeo_id') }}</option>
                                            @foreach($ubigeos as $ubigeo)
                                                <option value="{{ $ubigeo->id}}">{{ $ubigeo->departamento.'/'.$ubigeo->provincia.'/'.$ubigeo->distrito}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="tipo_cargos_id" class="">Cargo</label>
                                        <select class="select2_bootstrap_2 form-select" id="tipo_cargos_id" name="cargo" data-placeholder="Seleccione">
                                            <option value="" selected="selected" hidden="hidden">--Seleccione--</option>
                                            <option value="Planeamiento">Planeamiento</option>
                                            <option value="Logistica">Logistica</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <label for="direccion_id">Dirección<span class="text-danger">*</span></label>
                                        <input name="direccion" id="direccion_id" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-check mb-2 mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="check_credenciales">
                                    <label class="form-check-label text-muted small text-uppercase fw-bold" for="check_credenciales">
                                    Datos de usuario
                                    </label>
                                </div>
        
                                <div class="row g-3" id="credenciales">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="email">Correo electrónico<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" id="email" class="form-control">
                                            <button class="border rounded-end px-2" style="background-color: #f6f6f6; color:#535353" type="button" id="btn_copiar_email"><i class="bi bi-clipboard-fill icono_copy_email"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label for="password">Contraseña<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" id="password" class="form-control" maxlength="16">
                                            <span class="input-group-text border px-2" style="background-color: #f6f6f6; color:#535353"><i class="bi bi-lock-fill icono" style="cursor: pointer"></i></span>
                                            <button class="border rounded-end px-2" style="background-color: #f6f6f6; color:#535353" type="button" id="btn_copiar_pass"><i class="bi bi-clipboard-fill icono_copy_pass"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            El campo no puede estar vacío
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>  
        <div class="pt-3 text-end">
            <a href="{{ route('admin-usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Guardar</button>
        </div>
    </div>
</form>
{{-- Fin contenido --}}
@endsection
@section('js')
<script>
    function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview'+nb).src = e.target.result;         
    };     
    }
</script>
<script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
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
<script>
    const   pass = document.getElementById("password"),
            icon = document.querySelector(".icono");
    icon.addEventListener("click", e => {
        if (password.type === "password"){
            password.type = "text";
            icon.classList.remove('bi-lock-fill');
            icon.classList.add('bi-unlock-fill');
        }else{
            password.type = "password";
            icon.classList.add('bi-lock-fill');
            icon.classList.remove('bi-unlock-fill');
        }
    })
</script>
<script>
    const btn_copy_pass = document.querySelector('#btn_copiar_pass');
    const pass_copy = document.querySelector('#password');
    const icon_copy_pass = document.querySelector('.icono_copy_pass'); 

    btn_copy_pass.addEventListener( 'click', copyPass);

    function copyPass(e){
        e.preventDefault();
        navigator.clipboard.writeText(pass_copy.value).then( () => {
            icon_copy_pass.classList.remove('bi-clipboard-fill');
            icon_copy_pass.classList.add('bi-clipboard-check-fill');

            setTimeout(() => {
                icon_copy_pass.classList.remove('bi-clipboard-check-fill');
                icon_copy_pass.classList.add('bi-clipboard-fill');
            }, 3000);
        })
    }
</script>
<script>
    const btn_copy_email = document.querySelector('#btn_copiar_email');
    const email_copy = document.querySelector('#email');
    const icon_copy_email = document.querySelector('.icono_copy_email'); 

    btn_copy_email.addEventListener( 'click', copyEmail);

    function copyEmail(e){
        e.preventDefault();
        navigator.clipboard.writeText(email_copy.value).then( () => {
            icon_copy_email.classList.remove('bi-clipboard-fill');
            icon_copy_email.classList.add('bi-clipboard-check-fill');

            setTimeout(() => {
                icon_copy_email.classList.remove('bi-clipboard-check-fill');
                icon_copy_email.classList.add('bi-clipboard-fill');
            }, 3000);
        })
    }
</script>
@endsection