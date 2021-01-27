@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <h4 class="float-left">Historico de pedidos</h4>
                <a class="btn btn-primary float-right mb-2" onclick="history.back()">Atrás</a>
            </div>
            <div>
                <!-- All pieces !-->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @if (count($orders) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Estado</th>
                                <th>Número de pedido</th>
                                <th>Cliente</th>
                                <th>Obra</th>
                                <th>Material</th>
                                <th>Pedido por</th>
                                <th>Fecha pedido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
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
                                        </td>
                                        <td><a class="btn btn-primary" href="/order/{{ $order->order_id }}">{{ $order->order_id }}</a></td>
                                        <td><label>{{ $order->client->name }}</label></td>
                                        <td><label>{{ $order->project->name }}</label></td>
                                        <td><label>{{ $order->material->name }}</label></td>
                                        <td><label>{{ $order->username }}</label></td>
                                        <td><label>{{ $order->created_at }}</label></td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="mt-3">Este usuario aún no ha realizado ningún pedido.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection