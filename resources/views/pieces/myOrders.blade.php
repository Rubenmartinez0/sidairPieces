@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Piezas encargadas por {{ $user->username }}</h4>
            <ul class="nav nav-tabs" id="orderTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Todas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pendientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="manufacturing-tab" data-toggle="tab" href="#manufacturing" role="tab" aria-controls="manufacturing" aria-selected="false">En fabricación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="manufactured-tab" data-toggle="tab" href="#manufactured" role="tab" aria-controls="manufactured" aria-selected="false">Fabricadas</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="denied-tab" data-toggle="tab" href="#denied" role="tab" aria-controls="denied" aria-selected="false">Denegadas</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- All pieces !-->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @if (count($allOrders) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Pieza</th>
                                <th>Material</th>
                                <th>Obra</th>
                                <th>Fecha pedida</th>
                                <th>Fecha fabricada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allOrders as $piece)
                                    <tr>
                                        <td>
                                            @switch($piece->state_id)
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
                                        <td><label>{{ $piece->material->material }}</label></td>
                                        <td><label>{{ $piece->project->name }}</label></td>
                                        <td><label>{{ $piece->ordered_at }}</label></td>
                                        @if ( $piece->manufactured_at )
                                            <td><label>{{ $piece->manufactured_at }}</label></td>
                                        @else
                                            <td><label>---</label></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="mt-3">Este usuario aún no ha encargado ninguna pieza.</h4>
                    @endif
                </div>
                <!-- Pending pieces !-->
                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Pieza</th>
                            <th>Material</th>
                            <th>Obra</th>
                            <th>Fecha pedida</th>
                            <th>Fecha fabricada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $piece)
                                @if($piece->state->id === 1)
                                    <tr>
                                        <td><label class="bg-warning font-weight-bold rounded-lg p-1">{{ $piece->state->state }}</label></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{ $piece->material->material }}</label></td>
                                        <td><label>{{ $piece->project->name }}</label></td>
                                        <td><label>{{ $piece->ordered_at }}</label></td>
                                        @if ( $piece->manufactured_at )
                                            <td><label>{{ $piece->manufactured_at }}</label></td>
                                        @else
                                            <td><label>---</label></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Manufacturing pieces !-->
                <div class="tab-pane fade" id="manufacturing" role="tabpanel" aria-labelledby="manufacturing-tab">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Pieza</th>
                            <th>Material</th>
                            <th>Obra</th>
                            <th>Fecha pedida</th>
                            <th>Fecha fabricada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $piece)
                                @if($piece->state->id === 2)
                                    <tr>
                                        <td><label class="bg-primary font-weight-bold rounded-lg p-1 text-white">{{ $piece->state->state }}</label></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{ $piece->material->material }}</label></td>
                                        <td><label>{{ $piece->project->name }}</label></td>
                                        <td><label>{{ $piece->ordered_at }}</label></td>
                                        @if ( $piece->manufactured_at )
                                            <td><label>{{ $piece->manufactured_at }}</label></td>
                                        @else
                                            <td><label>---</label></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Manufactured pieces !-->
                <div class="tab-pane fade" id="manufactured" role="tabpanel" aria-labelledby="manufactured-tab">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Pieza</th>
                            <th>Material</th>
                            <th>Obra</th>
                            <th>Fecha pedida</th>
                            <th>Fecha fabricada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $piece)
                                @if($piece->state->id === 3)
                                    <tr>
                                        <td><label class="bg-success font-weight-bold rounded-lg p-1">{{ $piece->state->state }}</label></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{ $piece->material->material }}</label></td>
                                        <td><label>{{ $piece->project->name }}</label></td>
                                        <td><label>{{ $piece->ordered_at }}</label></td>
                                        @if ( $piece->manufactured_at )
                                            <td><label>{{ $piece->manufactured_at }}</label></td>
                                        @else
                                            <td><label>---</label></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Denied pieces !-->
                <div class="tab-pane fade" id="denied" role="tabpanel" aria-labelledby="denied-tab">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Pieza</th>
                            <th>Material</th>
                            <th>Obra</th>
                            <th>Fecha pedida</th>
                            <th>Fecha rechazada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $piece)
                                @if($piece->state->id === 4)
                                    <tr>
                                        <td><label class="bg-danger text-white rounded-lg p-1 font-weight-bold">{{ $piece->state->state }}</label></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{ $piece->material->material }}</label></td>
                                        <td><label>{{ $piece->project->name }}</label></td>
                                        <td><label>{{ $piece->ordered_at }}</label></td>
                                        @if ( $piece->manufactured_at )
                                            <td><label>{{ $piece->manufactured_at }}</label></td>
                                        @else
                                            <td><label>---</label></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection