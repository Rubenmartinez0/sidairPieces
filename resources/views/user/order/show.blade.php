@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h3>Resumen del pedido: <strong>{{ $order->order_id }}</strong></h3>


            <div class="border border-gray rounded p-3 mb-3">
                <label><strong>Estado del pedido: </strong>{{ $order->state->state}}</label>
                <br>
                <label><strong>Fecha de encargo: </strong>{{ $order->created_at }}</label>
                <br>
                <label><strong>Cliente: </strong>{{ $order->client->name}}</label>
                <br>
                <label><strong>Obra: </strong>{{ $order->project->name}}</label>
                <br>
                <label><strong>Material de las piezas: </strong>{{ $order->material->name}}</label>
                <br>
                <label><strong>Número total de piezas: </strong>{{ $order->totalPieces }} y ZZZ notas.</label>
            </div>
            <div>
                <h4>Piezas del pedido:</h4>
                <!-- All pieces !-->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @if (count($orderPieces) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                    <th>Pieza</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderPieces as $piece)
                                    <tr>
                                        <td><label>{{ $piece->state->state }}</label></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><a class="btn btn-primary" href="#">Detalle</a></td>
                                        {{-- <td><a class="btn btn-primary" href="{{ route('cart.showItem',$piece->id) }}">Detalle</a></td> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <hr>
            
            
            <div class="row mt-3 p-1" style="display:flex; justify-content:center;">
                @if ($message = Session::get('status_fail'))
                    <div id="status_message_fail" class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert" >×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/user/cart/cart.js') }}" type="text/javascript"></script>

@endsection