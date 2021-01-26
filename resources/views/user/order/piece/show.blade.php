@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 >Pieza perteneciente al pedido: <strong> <a href="/order/{{ $piece->order->order_id }}">{{ $piece->order->order_id }} </a></strong> </h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        
                            <div class="row justify-content-center text-center">
                                <!-- Piece Image -->
                                <div class="col-6 col-sm-4 float-left text-center">
                                    @if($piece->type->image_path2)
                                        <img src="{{ $piece->type->image_path2 }}" class="pr-2" style="height:15em; width:15em;" alt="{{  $piece->type->name }}">
                                    @else
                                        <img src="{{ $piece->type->image_path }}" class="pr-2" style="height:15em; width:15em;" alt="{{  $piece->type->name }}">
                                    @endif
                                    <br>    
                                </div>    
                            <!-- Quantity & Material -->
                                
                                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 float-right">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-2">
                                        <label class="col-form-label text-md-right"><strong>{{ __('Cantidad: ') }}</strong> {{ $piece->quantity }} unidades </label>
                                    </div>
                                    
                                    <!-- Material -->
                                    <div class="d-flex mb-2">
                                        <label class="col-form-label text-md-right"><strong>{{ __('Material:') }}</strong> {{ $piece->material->name }}</label>
                                    </div>
                        
                                
                                    <!-- Client -->
                                
                                    <div class="d-flex mb-2">
                                        <label class=" col-form-label text-md-right"><strong>Cliente:</strong> {{ $piece->client->name }}</label>
                                    </div>
                                
                                    <!-- Project -->
                                    <div class="d-flex mb-2">
                                        <label class="col-form-label text-md-right"><strong>Obra:</strong> {{ $piece->project->name }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                @foreach($measurements as $measurement)
                                    <div class="d-flex col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                                        <label class="col-md-6 col-form-label text-md-right" style="font-size: 24px;">{{ $measurement }} mm.</label>
                                    </div>
                                @endforeach
                            </div>
                        <div class="mb-3 mr-3 float-left">
                            <a class="btn btn-primary mb-3 d-flex" href="/myCart"><div>Atrás</div></a>
                        </div> 
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/pieces/create.js') }}" type="text/javascript"></script>

@endsection