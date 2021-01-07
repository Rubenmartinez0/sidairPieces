@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 >Resumen del encargo de piezas de <strong>{{$currentPreferences["material"]->name}}</strong> para <strong>{{$currentPreferences["project"]->name}}</strong></h4>

            <div class="tab-content" id="myTabContent">
                <!-- All pieces !-->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @if (count($currentPieces) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th><input type="checkbox" id="select-all"> Seleccionar</th>
                                <th>Cantidad</th>
                                <th>Pieza</th>
                                <th>Material</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentPieces as $piece)
                                    <tr>
                                        <td><input type="checkbox" value={{ $piece->id }}></td>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{$currentPreferences["material"]->name}}</label></td>
                                        <td>
                                            <a class="btn btn-primary mb-3" href="{{ url('/piece') }}">Ver detalle</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="mt-5">Aún no tienes ninguna pieza en el carrito.</h4>
                    @endif
                </div>
            </div>
            
            <a class="btn btn-primary mb-3" href="{{ url('/#') }}">Hacer pedido</a>
            <a class="btn btn-danger mb-3" href="{{ url('/#') }}">Eliminar seleccionados</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/user/cart.js') }}" type="text/javascript"></script>

@endsection