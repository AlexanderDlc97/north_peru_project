<div class="modal fade" id="reporte_Excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Imprimir reporte en Excel</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{ route('inventario.resultadosEXCEL') }}" method="POST">
                @csrf        
                    <div class="my-3" id="">
                        <label for="">FECHA</label>
                        <input type="date" id="start-date"  name="fecha_ini" class="form-control form-control-sm disabled" required>
                    </div>
                    
                    <button type="submit" target=_blank  class="btn btn-dark w-100 mt-3">Generar Reporte</button>
                </form> --}}
                <a href="{{ route('lista-inv-general.xlsx') }}" class="border border-dark text-dark btn w-100 mt-3">Descargar Todo</a>
            </div>
        </div>
    </div>
</div>