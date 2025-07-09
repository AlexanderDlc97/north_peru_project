@extends('TEMPLATE.administrador')

@section('title', 'ACTIVOS Y MATERIALES')

@section('css')
@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0">ACTIVOS Y MATERIALES</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Principal</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-configuraciones') }}">Configuraciones</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-activos-materiales') }}">Activos y materiales</a></li>
                        <li class="breadcrumb-item link" aria-current="page">Nuevo registro</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

{{-- Contenido --}}
<form method="POST" action="{{ route('admin-activos-materiales.store') }}" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
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
                        <div class="mb-3 mb-lg-0">
                            <label for="codigo_id">Código<span class="text-danger">*</span></label>
                            <input name="codigo" id="codigo_id" type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                El campo no puede estar vacío
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="row g-3">
                            <div class="col-12 col-md-4 col-lg-2">
                                <label for="tipo_id">Tipo<span class="text-danger">*</span></label>
                                <select class="form-select select2_bootstrap" id="tipo_id" data-placeholder="Seleccione" required>
                                    <option value="" selected="selected" hidden="hidden"></option>
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{ $tipo->name }}</option>
                                        @endforeach 
                                </select>
                                <input name="tipo_id"  id="tipo_id_value" hidden>
                                <div class="invalid-feedback">
                                    El campo no puede estar vacío
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-8 col-lg-8">
                                <label for="name_id">Nombres<span class="text-danger">*</span></label>
                                <input name="name" id="name_id" type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    El campo no puede estar vacío
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-2">
                                <label for="medida_id">Unidad de medida<span class="text-danger">*</span></label>
                                <select name="medida_id" id="medida_id" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required>
                                    <option value="" selected="selected" hidden="hidden"></option>
                                        @foreach($medidas as $medida)
                                            <option value="{{$medida->id }}">{{ $medida->name }}</option>
                                        @endforeach 
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="name_id">Marca<span class="text-danger">*</span></label>
                                <select class="form-select select2_bootstrap" name="marca_id" id="marca_id" data-placeholder="Seleccione" required>
                                    <option value="" selected="selected" hidden="hidden"></option>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{ $marca->name }}</option>
                                        @endforeach 
                                </select>
                                <div class="invalid-feedback">
                                    El campo no puede estar vacío
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-3" id="tipo_costo_general">
                                <label for="tipo_costo_id">Tipo costo<span class="text-danger">*</span></label>
                                <select name="tipo_costo" id="tipo_costo_id" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required>
                                    <option value="" selected="selected" hidden="hidden"></option>
                                    <option value="COSTO FIJO">COSTO FIJO</option>
                                    <option value="COSTO UNITARIO">COSTO UNITARIO</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3" id="precio_unit_general">
                                <label for="precio_unit_id">Precio unitario<span class="text-danger">*</span></label>
                                <input name="precio_unit" id="precio_unit_id" type="decimal" class="form-control">
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-3" id="fabricante_nparte_general">
                                <label for="fabricante_nparte_id">Fabricante/Nro. parte<span class="text-danger">*</span></label>
                                <input name="fabricante_nparte" id="fabricante_nparte_id" type="text" class="form-control">
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-3" id="costo_general">
                                <label for="costo_id">Costo<span class="text-danger">*</span></label>
                                <input name="costo" id="costo_id" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3" id="depreciacion_general">
                                <label for="depreciacion_id">Depreciación<span class="text-danger">*</span></label>
                                <input name="depreciacion" id="depreciacion_id" type="text" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="descripcion_id">Descripción</label>
                                <textarea name="descripcion" id="descripcion_id" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="pt-3 text-end" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <a href="{{ route('admin-activos-materiales.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Guardar</button>
        </div>
    </div>
</form>
{{-- Fin contenido --}}
@endsection
@section('js')
<script>
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
    $(document).ready(function() {
        $("#vida_util_general").hide();
        $("#costo_general").hide();
        $("#depreciacion_general").hide();
        $("#vida_util_id").hide();
        $("#costo_id").hide();
        $("#depreciacion_id").hide();
        $('#tipo_id').on('change', function() {
            var valor_bienes = $(this).val();
            $('#tipo_id').attr("disabled","disabled");
            $('#tipo_id_value').val(valor_bienes);
            var __tipo = valor_bienes;
            console.log(__tipo);
                if (__tipo == 1)
                {
                    $("#vida_util_general").hide();
                    $("#costo_general").hide();
                    $("#depreciacion_general").hide();
                    $("#vida_util_id").hide();
                    $("#costo_id").hide();
                    $("#depreciacion_id").hide();
                    $("#vida_util_id").val("");
                    $("#costo_id").val("");
                    $("#depreciacion_id").val("");
                }
                if (__tipo == 2)
                {
                    $("#vida_util_general").show();
                    $("#costo_general").show();
                    $("#depreciacion_general").show();
                    $("#vida_util_id").show();
                    $("#costo_id").show();
                    $("#depreciacion_id").show();
                }
        });
    });

</script>
@endsection