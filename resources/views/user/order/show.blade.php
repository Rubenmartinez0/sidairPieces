@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <a class="btn btn-primary m-auto float-right" onclick="history.back()">Atras</a>
            <h3>Resumen del pedido: <strong>{{ $order->order_id }}</strong></h3>
            
            
            <div class="border border-gray rounded p-3 mb-3 mt-3">
                <label><strong>Estado del pedido: </strong></label>

                @switch($order->state_id)
                    @case(1)
                        <label class="bg-warning rounded-lg p-1 font-weight-bold">{{ $order->state->state }}</label>
                        @break
                    @case(2)
                        <label class="bg-primary text-white rounded-lg p-1 font-weight-bold">{{ $order->state->state }}</label>
                        @break
                    @case(3)
                        <label class="bg-success rounded-lg p-1 font-weight-bold">{{ $order->state->state }}</label>
                        @break
                    @case(4)
                        <label class="bg-danger text-white rounded-lg p-1 font-weight-bold">{{ $order->state->state }}</label>
                        @break
                    @default
                        <label class="bg-dark rounded-lg p-1 font-weight-bold">Desconocido</label>
                @endswitch

                <br>
                <label><strong>Pedido realizado por: </strong>{{ $order->ordered_by }}</label>
                <br>
                <label><strong>Fecha de encargo: </strong>{{ $order->created_at }}</label>
                <br>
                <label><strong>Cliente: </strong>{{ $order->client->name}}</label>
                <br>
                <label><strong>Obra: </strong>{{ $order->project->name}}</label>
                <br>
                <label><strong>Material de las piezas: </strong>{{ $order->material->name}}</label>
                <br>
                <label><strong>Número total de piezas: </strong>{{ $order->totalPieces }} piezas y {{ $order->totalNotes }} nota/s.</label>
            </div>
            <div class="border border-gray rounded p-3 mb-3">
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
                                        <td>
                                            @switch($piece->state->id)
                                                @case(1)
                                                    <label class="bg-warning rounded-lg p-1 font-weight-bold">{{ $piece->state->state }}</label>
                                                    @break
                                                @case(2)
                                                    <label class="bg-primary text-white rounded-lg p-1 font-weight-bold">{{ $piece->state->state }}</label>
                                                    @break
                                                @case(3)
                                                    <label class="bg-success rounded-lg p-1 font-weight-bold">{{ $piece->state->state }}</label>
                                                    @break
                                                @case(4)
                                                    <label class="bg-danger text-white rounded-lg p-1 font-weight-bold">{{ $piece->state->state }}</label>
                                                    @break
                                                @default
                                                    <label class="bg-dark rounded-lg p-1 font-weight-bold">Desconocido</label>
                                            @endswitch
                                        </td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><a class="btn btn-primary" href="/order/piece/{{ $piece->id }}">Detalle</a></td>
                                        {{-- <td><a class="btn btn-primary" href="{{ route('cart.showItem',$piece->id) }}">Detalle</a></td> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div>
                    @if ($order->totalNotes > 0)
                        <h4>Notas del pedido:</h4>

                        @foreach($orderNotes as $note)
                                <h5>{{ $loop->index+1 }}. {{ $note->content }}</h5>
                        @endforeach
                    @else
                        <h5 class=""><i class="far fa-comment-alt text-primary"></i> Este pedido no tiene ningúna nota.</h5>
                    @endif
                </div>
            </div>
            
            
            
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