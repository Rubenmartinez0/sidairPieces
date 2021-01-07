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
                                <th>Cantidad</th>
                                <th>Pieza</th>
                                <th>Material</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentPieces as $piece)
                                    <tr>
                                        <td><label>{{ $piece->quantity }}</label></td>
                                        <td><label>{{ $piece->type->name }}</label></td>
                                        <td><label>{{$currentPreferences["material"]->name}}</label></td>
                                        <td>
                                            <a class="btn btn-primary mb-3 fas fa-eye" href="{{ url('/piece') }}"></a>
                                            <a class="btn btn-danger mb-3 fas fa-trash-alt" href="{{ route('cartItem.destroy', $piece) }}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="mt-3">Aún no tienes ninguna pieza en el carrito.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection