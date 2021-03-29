@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <a class="btn btn-primary m-auto float-right" onclick="history.back()">Atrás</a>
            <h3>Resumen de la obra: <strong id="projectName">{{ $project->name }}</strong></h3>
            <label hidden id="projectId">{{ $project->id }}</label>
            
            <div class="border border-gray rounded p-3 mb-3 mt-3">
                <label><strong>Estado de la obra: </strong></label>

                
                <select id="projectStateSelect" class="rounded-lg p-1 bg-white font-weight-bold">
                    @foreach($projectStates as $state)
                        @if($project->state->id == $state->id)
                            <option class="font-weight-bold" selected projectId='{{$project->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                        @else
                            <option class="font-weight-bold" projectId='{{$project->id}}' stateId='{{ $state->id }}'>{{ $state->state }}</option>
                        @endif
                    @endforeach
                </select>
        
                <br>
                <label hidden id="clientId">{{ $project->client_id }}</label>
                <label><strong>Cliente: </strong><a href="{{ route('client.projectsView', $project->client->id) }}">{{ $project->client->name}}</a></label>

                
                <br>
                <label><strong>Obra creada el: </strong>{{ $project->created_at }}</label>
                <br>
                <label><strong>Número total de piezas: </strong>{{$project->piecesCount}} piezas y {{$project->notesCount}} nota/s.</label>
            </div>
            <div class="border border-gray rounded p-3 mb-3">
                
                <h4><strong>Pedidos de la obra:</strong></h4>
                <!-- All pieces !-->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <table id="ordersTable" class="table table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Número de pedido</th>
                                <th>Nº de piezas</th>
                                <th>Material</th>
                                <th>Pedido por</th>
                                <th>Fecha del pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project->orders as $order)
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
                                    <td><label>{{ $order->piecesCount }} piezas y {{ $order->notesCount }} nota/s</label></td>
                                    <td><label>{{ $order->material->name }}</label></td>
                                    <td><label>{{ $order->created_by->username }}</label></td>
                                    <td><label>{{ $order->created_at }}</label></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- CDN datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js" defer></script>

    <!-- CDN datatables searchpanes-->
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js" defer></script>

    <!-- CDN datatables select-->
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js" defer></script>

    <!-- CDN buttons select-->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" defer></script>


    <script src="{{ asset('js/project/show.js') }}" type="text/javascript"></script>

@endsection