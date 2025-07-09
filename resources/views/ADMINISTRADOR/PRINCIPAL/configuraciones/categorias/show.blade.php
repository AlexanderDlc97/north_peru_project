
    <div class="modal fade" id="show_centro{{$admin_centro_costo->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white py-2">
                    <span class="modal-title text-uppercase small" id="staticBackdropLabel">Detalle del registro</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                    <div class="">
                        <div class="mb-2">
                            <label for="nro_cuenta__id">Nro de cuenta<span class="text-danger">*</span></label>
                            <input name="nro_cuenta" disabled value="{{$admin_centro_costo->n_cuenta}}" id="nro_cuenta__id" type="number" class="form-control bg-white">
                            @error('nro_cuenta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="invalid-feedback">
                                El campo no puede estar vacío
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="descripcion__id">Descripción<span class="text-danger">*</span></label>
                            <textarea name="descripcion" disabled id="descripcion__id" class="form-control bg-white" rows="3">{{$admin_centro_costo->descripcion}}</textarea>
                            @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="invalid-feedback">
                                El campo no puede estar vacío
                            </div>
                        </div>
                        <!-- <div class="mb-2">
                            <label for="estado_id">Estado<span class="text-danger">*</span></label>
                            <select name="estado" id="estado_id" class="form-select text-uppercase" required>
                                <option value="{{-- $admin_categoria->estado --}}" selected="selected" hidden="hidden">{{-- $admin_categoria->estado --}}</option>
                                <option value="Activo">ACTIVO</option>
                                <option value="Inactivo">INACTIVO</option>
                            </select>
                            @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="invalid-feedback">
                                El campo no puede estar vacío
                            </div>
                        </div>    -->
                    </div>
                </div>
            </div>
        </div>
    </div>
