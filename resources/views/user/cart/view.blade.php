@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <div class="col-md-12">
                <h3 >Resumen del carrito de <strong>{{$currentPreferences["material"]->name}}</strong> para <strong>{{$currentPreferences["project"]->name}}</strong></h3>

                <div class="tab-content" id="myTabContent">
                    <!-- All pieces !-->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        @if (count($currentPieces) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Cantidad</th>
                                    <th>Pieza</th>
                                    
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($currentPieces as $piece)
                                        <tr>
                                            {{-- <input value={{ $piece->id }} name="piece_{{ $piece->id }}"> --}}
                                            <td><input type="checkbox" value={{ $piece->id }}></td>
                                            <td><input id={{ $piece->id }} type="number" min="1" max="99" pattern="\d+" value="{{ $piece->quantity }}"></td>
                                            <td><label>{{ $piece->type->name }}</label></td>
                                            
                                            <td>
                                                <a class="btn btn-primary mb-3" href="{{ route('cart.showItem',$piece->id) }}">Detalle</a>
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
                <hr>
                {{-- <div class="mb-5">
                    <h4>Notas/piezas adicionales<h4>
                    <br>
                    <div class="row form-vertical">
                        <label>#1</label>
                        <textarea style="resize: none;"></textarea>
                        <a class="btn btn-success" href="{{ url('#') }}">Guardar</a>
                    </div>
                    <br>
                    <label>
                        <a class="btn btn-warning fas fa-plus-circle" href="{{ url('#') }}"></a>
                        Añadir nota
                    </label>
                </div> --}}
                <button type="submit" class="btn btn-primary mb-3">Hacer pedido</button>
                <a id="deleteSelected" class="float-right btn btn-danger mb-3">Eliminar seleccionados</a>
                
                <div class="row mt-3 p-1" style="display:flex; justify-content:center;">
                    @if ($message = Session::get('status_fail'))
                        <div id="status_message_fail" class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert" >×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/user/cart/cart.js') }}" type="text/javascript"></script>

@endsection