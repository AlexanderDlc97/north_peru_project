
<div class="modal fade" id="edit_categoria{{$admin_categoria->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title text-uppercase small" id="staticBackdropLabel">Actualizar registro</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('admin-categorias.update', $admin_categoria->slug) }}" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>      
                @csrf    
                @method('put')
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
                            <label for="nro_cuenta__id">Nombre<span class="text-danger">*</span></label>
                            <input name="name" value="{{$admin_categoria->name}}" id="nro_cuenta__id" type="text" class="form-control" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="invalid-feedback">
                                El campo no puede estar vacío
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="medida_id">Rubro<span class="text-danger">*</span></label>
                            <select name="rubro_id" id="rubro_id{{$admin_categoria->slug}}" class="form-select select2_bootstrap_2" data-placeholder="Seleccione" required style="width:100%">
                                <option value="{{$admin_categoria->rubro_id}}" selected="selected" hidden="hidden">{{$admin_categoria->rubro->name}}</option>
                                    @foreach($admin_rubros as $admin_rubro)
                                        <option value="{{$admin_rubro->id }}">{{ $admin_rubro->name }}</option>
                                    @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-uppercase small px-5 text-white">Actualizar</button>   
                </div>
            </form>
        </div>
    </div>
</div>