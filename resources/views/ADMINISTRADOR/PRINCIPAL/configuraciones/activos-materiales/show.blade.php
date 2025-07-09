<div class="modal fade" id="show_activo_material{{$admin_activos_materiale->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title text-uppercase small" id="staticBackdropLabel">Detalle de registro</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="mb-3">
                            <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto" style="width: 100%; height: 165px; object-fit: cover;  border-radius: 20px" src="
                            @if($admin_activos_materiale->imagen == "NULL" || $admin_activos_materiale->imagen == NULL)
                                /images/image.png
                            @else
                                /images/activomateriales/{{$admin_activos_materiale->imagen}}
                            @endif
                            ">   
                        </div>
                        <div class="mb-3 mb-lg-0">
                            <label class="small text-uppercase bg-white px-1 ms-2"><small>Código</small></label>
                            <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->codigo}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="row g-3">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="" class="small text-uppercase bg-white px-1 ms-2"><small>Nombres</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->name}}</div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="small text-uppercase bg-white px-1 ms-2"><small>Tipo</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->tipo->name}}</div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="small text-uppercase bg-white px-1 ms-2"><small>Unidad de medida</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{-- $admin_activos_materiale->medida->name.' - '.$admin_activos_materiale->medida->codigo --}}</div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="small text-uppercase bg-white px-1 ms-2"><small>Marca</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->marca}}</div>
                            </div>
                            @if($admin_activos_materiale->tipo_id == '1')
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Tipo costo</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->tipo_costo}}</div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Precio Unitario</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->precio_unit}}</div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Fabricante/Nro. parte</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->fabricante_nparte}}</div>
                                </div>
                            @endif
                            @if($admin_activos_materiale->tipo_id == '2')
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Vida útil</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">{{$admin_activos_materiale->vida_util}}</div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Costo</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">S/ {{$admin_activos_materiale->costo}}</div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label class="small text-uppercase bg-white px-1 ms-2"><small>Depreciación</small></label>
                                    <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 31px">S/ {{$admin_activos_materiale->depreciacion}}</div>
                                </div>
                            @endif
                            <div class="col-12 col-md-12 col-lg-12">
                                <label class="small text-uppercase bg-white px-1 ms-2"><small>Descripción</small></label>
                                <div class="form-control bg-white pb-0 text-center" style="margin-top: -12px; min-height: 70px">{{$admin_activos_materiale->descripcion}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>