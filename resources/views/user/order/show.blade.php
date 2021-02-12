@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <a class="btn btn-primary m-auto float-right" onclick="history.back()">Atras</a>
            <h3>Resumen del pedido: <strong>{{ $order->order_id }}</strong></h3>
            
            
            <div class="border border-gray rounded p-3 mb-3 mt-3">
                <label><strong>Estado del pedido: </strong></label>

                @if($modifyPermissions == true)
                    <select id="orderStateSelect" class="rounded-lg p-1 bg-white font-weight-bold">
                        @foreach($orderStates as $state)
                            @if($order->state->id == $state->id)
                                <option class="font-weight-bold" selected orderId='{{$order->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                            @else
                                <option class="font-weight-bold" orderId='{{$order->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    @switch($order->state->id)
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
                @endif


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

                @if($order->manufactured_at)
                    <hr>
                    <label class="float-right">Último cambio con fecha <strong>{{ $order->manufactured_at}}.</strong></label>
                    <br>
                @endif
            </div>
            <div class="border border-gray rounded p-3 mb-3">
                @if ($order->totalPieces > 0)
                    <h4><strong>Piezas del pedido:</strong></h4>
                    <!-- All pieces !-->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
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
                                            @if($modifyPermissions == true)
                                                {{-- @switch($piece->state->id)
                                                    @case(1)
                                                        <option class="">{{ $piece->state->state }}</option>
                                                        @break
                                                    @case(2)
                                                        <select class="bg-primary text-white rounded-lg p-1 font-weight-bold">
                                                        @break
                                                    @case(3)
                                                        <select class="bg-success rounded-lg p-1 font-weight-bold">
                                                        @break
                                                    @case(4)
                                                        <select class="bg-danger text-white rounded-lg p-1 font-weight-bold">
                                                        @break
                                                    @default
                                                        <select class="bg-dark rounded-lg p-1 font-weight-bold">
                                                @endswitch --}}
                                                
                                                <select id="pieceStateSelect" class="rounded-lg p-1 bg-white font-weight-bold">
                                                    @foreach($pieceStates as $state)
                                                        @if($piece->state->id == $state->id)
                                                            <option class="font-weight-bold" selected pieceId='{{$piece->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                                                        @else
                                                            <option class="font-weight-bold" pieceId='{{$piece->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @else
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
                                            @endif
                                        </td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><a class="btn btn-primary" href="/piece/show/{{ $piece->id }}">Detalle</a></td>
                                        {{-- <td><a class="btn btn-primary" href="{{ route('cart.showItem',$piece->id) }}">Detalle</a></td> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h5 class=""><i class="far fa-comment-alt text-primary"></i> Este pedido no tiene ningúna pieza.</h5>
                @endif

                <div>
                    @if ($order->totalNotes > 0)
                        <h4><strong>Notas del pedido:</strong></h4>

                        @foreach($orderNotes as $note)
                                <h5><strong>{{ $loop->index+1 }}.</strong> {{ $note->content }}</h5>
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
<script src="{{ asset('js/order/show.js') }}" type="text/javascript"></script>

@endsection