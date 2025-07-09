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
                        <li class="breadcrumb-item link" aria-current="page">Nuevo registro</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

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
                        </ul>
                    </div>
                </div>
                <div class="card mb-3 rounded-3">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="text-center" style="font-size: 13px">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Código
                                    </p>
                                    <span class="text-uppercase">OT25000001</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="text-center" style="font-size: 13px">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Responsable
                                    </p>
                                    <span class="text-uppercase">Alexander De La Cruz</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2" style="font-size: 13px">
                                <div class="text-center">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Fecha
                                    </p>
                                    <span class="text-uppercase">10-09-2025</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2" style="font-size: 13px">
                                <div class="text-center">
                                    <p class="text-uppercase fw-bold mb-0">
                                        Sector
                                    </p>
                                    <span class="text-uppercase">INICIAR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-uppercase fw-bold small mb-0 mt-3">Reporte de trabajo contratista</p>

                <div class="row g-2 mb-4">
                    <div class="col-12 col-md-4">
                        <label for="name_id">Departamento<span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6 col-md-4">
                        <label for="name_id">Equipo<span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6 col-md-4">
                        <label for="name_id">Porcentaje<span class="text-danger">*</span></label>
                        <input type="text" name="porcentaje" value="0" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="name_id">Rubro<span class="text-danger">*</span></label>
                        <select name="rubro" id="rubro_id" class="form-select select2_bootstrap_2" required>
                            <option value="" selected="selected" hidden="hidden" disabled="disabled">Elejir una opcion</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="name_id">Categoría<span class="text-danger">*</span></label>
                        <select name="categoria" id="categoria_id" class="form-select select2_bootstrap_2" required>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="name_id">Fecha inicio<span class="text-danger">*</span></label>
                        <input type="date" name="fecha_inicio" id="" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="name_id">Fecha fin<span class="text-danger">*</span></label>
                        <input type="date" name="fecha_fin" id="" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="name_id">Importancia<span class="text-danger">*</span></label>
                        <select name="nivel_importancia" class="form-select" required>
                            <option value="" selected="selected" hidden="hidden" disabled="disabled">-- Seleccione --</option>
                            <option value="1">1 - Muy alto</option>
                            <option value="2">2 - Alto</option>
                            <option value="3">3 - Media</option>
                            <option value="4">4 - Bajo</option>
                        </select>
                    </div>
                </div>
                <div class="row g-2 mb-4">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="row g-2 mb-4">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="name_id">Descripción de la orden<span class="text-danger">*</span></label>
                                <textarea name="descripcion_orden" class="form-control" rows="4"></textarea>
                                <div class="invalid-feedback">
                                    El campo no puede estar vacío
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="row g-2">
                            <div class="col-12">
                                <label for="name_id">Beneficiario</label>
                                <input type="text" name="beneficiario" id="telefono_id" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="name_id">Teléfono<span class="text-danger">*</span></label>
                                <input type="text" name="telefono" id="telefono_id" class="form-control">
                            </div>
                        </div>
                    </div>   
                </div>                          

                <p class="text-uppercase fw-bold small mb-0 mt-3">Requerimiento de materiales</p>
                <div class="row g-2">
                    <div class="col-12 col-md-6 col-lg-7">
                        <label for="name_id">Materiales</label>
                        <select class="form-select select2_bootstrap" id="productos_id" data-placeholder="Seleccione">
                            <option selected="selected" hidden="hidden">-- Seleccione --</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <label for="name_id">Cantidad</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" id="cantidad_id" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 col-lg-2">
                        <label for="agre" class="d-block text-white">..</label>
                        <button type="button" id="btnasignar_ot" class="btn btn-grey w-100 align-bottom mt-2 mt-md-0">
                            <i class="bi bi-plus-circle me-2"></i>
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="table-responsive mt-3" style="min-height: 150px">
                    <table class="table table-sm table-hover w-100">
                        <thead class="bg-light">
                            <tr>
                                <th class="align-middle fw-bold text-uppercase small text-center">N°</th>
                                <th class="align-middle fw-bold text-uppercase small text-center">Código</th>
                                <th class="align-middle fw-bold text-uppercase small text-center">Descripción</th>
                                <th class="align-middle fw-bold text-uppercase small text-center">Tipo</th>
                                <th class="align-middle fw-bold text-uppercase small text-center">Und.</th>
                                <th class="align-middle fw-bold text-uppercase small text-center">Cantidad</th>
                                <th class="align-middle fw-bold text-uppercase small text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="dt_ot_pla" class="text-center">
                            
                        </tbody>
                    </table>
                </div>
                <div class="row g-2 mb-4">
                    <div class="col-12 col-md-12 col-xl-12">
                        <div class="card h-100">
                            <div class="card-body p-2">
                                <div class="row g-2 mb-2">
                                    <div class="col-6 col-md-4 col-lg-11">
                                        <label for="name_id">Operario polifuncional<span class="text-danger">*</span></label>
                                        <select class="form-select w-100 select2_bootstrap_2" id="opera_pulifuncional_id" >
                                            <option value="" selected="selected" hidden="hidden" disabled="disabled">-- Seleccione --</option>  
                                        </select> 
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-1">
                                        <label for="agre" class=" d-block text-white">..</label>
                                        <button type="button" id="btnasignar" class="btn btn-primary w-100 align-bottom mt-2 mt-md-0">
                                            <i class="bi bi-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row g-2 mt-3" id="card_product">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-3 text-end" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <a href="{{ route('admin-ot-requeridos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Guardar</button>
        </div>
    </div>
</form>
{{-- Fin contenido --}}
@endsection
@section('js')
@endsection