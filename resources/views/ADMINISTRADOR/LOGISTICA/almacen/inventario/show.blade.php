<div class="modal fade" id="showprodi{{$almacenes->producto_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title text-uppercase small" id="staticBackdropLabel">Detalles de registro</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $producto_tipo = \App\Models\Producto::where('id',$almacenes->producto_id)->first();
                @endphp
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <img for="uploadImage1" id="uploadPreview1" alt="" class="img-fluid shadow-sm" style="object-fit: cover; background-color: #bfbfbf; border-radius: 20px" src="
                            @if($producto_tipo->imagen != "image.jpg")
                                /images/activomateriales/{{$producto_tipo->imagen}}
                            @else
                                /images/image.png
                            @endif
                            ">   
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-10 d-flex">
                        <div class="align-self-center">
                            <p class="text-uppercase small mb-0">{{$almacenes->producto}} - {{$almacenes->umedida}}</p>
                            <span class="border rounded px-2 fw-bold border-dark text-uppercase" style="font-size: 12px">{{$producto_tipo->tipo->name}}</span>
                            <p class="small text-uppercase text-primary fw-bold mb-0" style="font-size: 12px">{{$producto_tipo->tipo_costo}}</p>
                            <p class="float-start text-uppercase small">Stock: <span class="float-end badge bg-primary ms-2">{{$almacenes->cantidad}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style=" font-size: 13.5px">
                    <table class="display_2 table table-hover w-100 mt-3">
                        <thead>
                            <tr>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 5%">N°</th>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 15%">Movimiento</th>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 50%">Motivo</th>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 15%">Descipción</th>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 10%">Fecha</th>
                                <th class="align-middle fw-bold text-uppercase small text-center" style="width: 10%">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                                $mov_ingresos = DB::table('movimientos as ings')->join('detalle_movimientos as dtll','dtll.movimiento_id','=','ings.id')->select('ings.motivo','ings.vale_compra','ings.o_trabajo_entrada','ings.o_trabajo_salida','ings.created_at','ings.fecha_emision','ings.tipo_movimiento','dtll.cantidad')->where('producto_id',$almacenes->producto_id)->groupby('ings.motivo','ings.vale_compra','ings.o_trabajo_entrada','ings.o_trabajo_salida','ings.created_at','ings.fecha_emision','ings.tipo_movimiento','dtll.cantidad')->get();
                            @endphp
                            @foreach($mov_ingresos as $mov_ingreso)
                            <tr>
                                <td class="align-middle text-uppercase text-center">{{$contador}}</td>
                                @if($mov_ingreso->tipo_movimiento == 'INGRESO')
                                        <td class="align-middle text-uppercase text-center text-success">
                                        {{$mov_ingreso->tipo_movimiento}}</td>
                                        @else
                                            <td class="align-middle text-uppercase text-center text-danger">
                                        {{$mov_ingreso->tipo_movimiento}}</td>
                                    @endif
                                <td class="align-middle text-uppercase text-center">{{$mov_ingreso->motivo}}</td>
                                <td class="align-middle text-uppercase text-center">
                                    @if($mov_ingreso->vale_compra != '')
                                        <b>VC: </b> {{$mov_ingreso->vale_compra}}
                                    @elseif($mov_ingreso->o_trabajo_salida != '')
                                        <b>MI: </b>{{ $mov_ingreso->o_trabajo_salida}}
                                    @else
                                        <b>MS: </b> {{$mov_ingreso->o_trabajo_entrada}}
                                    @endif
                                </td>
                                <td class="align-middle text-uppercase text-center">{{$mov_ingreso->fecha_emision}}</td>
                                <td class="align-middle text-uppercase text-center text-sucess">{{$mov_ingreso->cantidad}}</td>
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
    </div>
</div>