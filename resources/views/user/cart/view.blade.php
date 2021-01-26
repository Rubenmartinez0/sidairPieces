@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <div class="col-md-12">
                <h3 >Resumen del pedido de <strong>{{$currentPreferences["material"]->name}}</strong> para <strong>{{$currentPreferences["project"]->name}}</strong></h3>

                <div class="tab-content" id="myTabContent">
                    <!-- All pieces !-->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        @if (count($currentPieces) > 0 || count($currentNotes) > 0)
                            
                            <div class="border border-gray rounded pt-3 pl-3 pr-3 mb-3 mt-3">
                                <h4><strong>Piezas</strong></h4>
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
                                                    <td><input type="checkbox" class="pieceCheckbox" value={{ $piece->id }}></td>
                                                    <td><input id={{ $piece->id }} type="number" min="1" max="99" pattern="\d+" value="{{ $piece->quantity }}"></td>
                                                    <td><label>{{ $piece->type->name }}</label></td>
                                                    
                                                    <td>
                                                        <a class="btn btn-primary" href="{{ route('cart.showItem',$piece->id) }}">Detalle</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h4 class="mt-5"><i class="far fa-comment-alt text-primary"></i> Aún no tienes ninguna pieza en el carrito.</h4>
                                @endif
                            </div>
                            <div class="border border-gray rounded pt-3 pl-3 pr-3 mb-3 mt-3">
                                <h4><strong>Notas adicionales</strong></h4>
                                    @foreach($currentNotes as $note)
                                        <div class="row form-vertical m-3">
                                            <input class="noteCheckbox" type="checkbox" class="mt-2 mr-2" value={{ $note->id }}>
                                            <input type="text" class="m-auto" style="width: 80%" value="{{ $note->content }}">
                                            <a class="btn btn-success m-auto float-left" href="{{ url('#') }}">Guardar</a>
                                        {{-- <a class="btn btn-success m-auto" href="{{ url('cartNote/save/{{$note->id}}') }}">Guardar</a> --}}
                                        </div>
                                    @endforeach

                                <div class="mb-2">
                                    <a class="btn btn-warning fas fa-plus-circle" href="{{ url('#') }}"></a>
                                    <strong >Añadir nota</strong>
                                </div>
                            </div>
                        @else
                            <h4 class="mt-5"><i class="fas fa-exclamation-triangle text-danger"></i> Aún no tienes ninguna pieza o nota en el carrito.</h4>
                            <div class="mb-2">
                                <a class="btn btn-warning fas fa-plus-circle mt-3" href="{{ url('#') }}"></a>
                                <strong >Añadir nota</strong>
                            </div>
                        @endif
                    </div>
                </div>
                
                @if (count($currentPieces) > 0 || count($currentNotes) > 0 )
                    <button type="submit" class="btn btn-primary mb-3">Hacer pedido</button>
                    <a id="deleteSelected" class="float-right btn btn-danger mb-3">Eliminar seleccionados</a>
                @endif
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