@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 >Encargar nueva pieza de <strong>{{$currentPreferences["material"]->name}}</strong> para <strong>{{$currentPreferences["project"]->name}}</strong> - <strong> {{ $pieceType->name }}</strong></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('piece.storeToCart') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            
                                <div class="row justify-content-center text-center" st0yle="display:inline-block">
                                    <!-- Piece Image -->
                                    <div class="col-6 col-sm-4 float-left text-center">
                                        @if($pieceType->image_path2)
                                            <img src="{{ $pieceType->image_path2 }}" class="pr-2" style="height:15em; width:15em;" alt="{{ $pieceType->name }}">

                                        @else
                                            <img src="{{ $pieceType->image_path }}" class="pr-2" style="height:15em; width:15em;" alt="{{ $pieceType->name }}">
                                        @endif
                                        <input hidden name="type_id" value="{{ $pieceType->id }}">
                                        <br>
                                        <a class="btn btn-warning mt-2" href="{{ url('/piece') }}">Elegir otra pieza</a>    
                                    </div>    
                                <!-- Quantity & Material -->
                                    
                                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 float-right">
                                        <div class="d-md-flex d-lg-flex d-xl-flex">
                                            <!-- Quantity -->
                                            <div class="d-flex mb-3">
                                                <label for="quantity" class="col-8 col-sm-4 col-md-6 col-lg-6 col-xl-6 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                                                <input id="quantity" maxLength="2" type="number" min="1" max="5000" required="required" class="col-md-6 col-lg-6 col-xl-6 form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}">
                                            </div>
                                            
                                            
                                            <!-- Material -->
                                            <div class="d-flex">
                                                <label for="material" class="col-form-label text-md-right">{{ __('Material') }}</label>
                                                <input disabled value="{{$currentPreferences["material"]->name}}" class="font-weight-bold text-primary" name="material_id">
                                                <input hidden name="material_id" value="{{$currentPreferences["material"]->id}}">

                                                {{-- <select id="material" class="col-md-6 col-lg-6 col-xl-6 form-control @error('material') is-invalid @enderror" name="material_id" value="{{ old('material_id') }}">
                                                    <option disabled selected value=""> -- </option>
                                                    @forelse($materials as $material)
                                                        <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>
                                                            {{ $material->name }}
                                                        </option>
                                                    @empty
                                                        <option>There are no available materials</option>       
                                                    @endforelse
                                                </select>
                                                @error('material')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror --}}
                                            </div>

                                            
                                        </div>

                                        <!-- Isolation Type -->
                                        <div class="border border-gray rounded p-3 mb-3 mt-3">
                                            <div class="d-flex">
                                                <label for="isolation-type" class="col-form-label text-md-right">{{ __('Tipo de aislamiento') }}</label>
                                                <select id="isolation-type" class="col-md-6 col-lg-6 col-xl-6 form-control @error('isolation-type') is-invalid @enderror" name="isolation-type_id" value="{{ old('isolation-type_id') }}">
                                                    <option disabled selected value=""> -- </option>
                                                    @forelse($isolationsTypeList as $type)
                                                        <option value="{{ $type->type }}">
                                                            {{ $type->type }}
                                                        </option>
                                                    @empty
                                                        <option>There are no available isolations</option>       
                                                    @endforelse
                                                </select>
                                                @error('material')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        

                                        <!-- Isolation thickness -->
                                        <div class="d-flex">
                                            <label for="isolation-type" class="col-form-label text-md-right">{{ __('Grosor') }}</label>
                                            <select id="isolation-side" name="isolation-type_id" disabled id="projects" class="form-control @error('projects') is-invalid @enderror" name="project_id" value="{{ old('project_id') }}">
                                                <option disabled selected value>-- Tipo --</option>
                                            </select>
                                        </div>

                                        <!-- Isolation side -->
                                        <div class="d-flex">
                                            <label for="isolation-type" class="col-form-label text-md-right">{{ __('Cara') }}</label>
                                            <select id="isolation-type" class="col-md-6 col-lg-6 col-xl-6 form-control @error('isolation-type') is-invalid @enderror" name="isolation-type_id" value="{{ old('isolation-type_id') }}">
                                                <option disabled selected value=""> -- </option>
                                                @forelse($isolationsList as $side)
                                                    <option value="{{ $side->side }}">
                                                        {{ $side->side }}
                                                    </option>
                                                @empty
                                                    <option>There are no available sides</option>       
                                                @endforelse
                                            </select>
                                            @error('material')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>

                                    
                                    
                                    <!-- Client -->
                                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 float-right mb-3">
                                        <div class="d-flex">
                                            <label for="client" class="col-md-2 col-form-label text-md-right">Cliente</label>
                                            <input disabled value="{{$currentPreferences["client"]->name}}" class="font-weight-bold text-primary">
                                            <input hidden name="client_id" value="{{$currentPreferences["client"]->id}}">
                                            {{-- <select id="client" type="text" class="col-md-6 form-control @error('client') is-invalid @enderror" name="client_id" value="{{ old('provider_id') }}">
                                                <option selected="true" disabled="disabled" value> -- </option>
                                                @forelse($clients as $client)
                                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                        {{ $client->name }}
                                                    </option>
                                                @empty
                                                    <option>There are no projects in the database</option>       
                                                @endforelse
                                            </select> 
                                            @error('client')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <!-- Project -->
                                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 float-right d-flex mb-3">
                                        <label for="project" class="col-md-2 col-form-label text-md-right">Obra</label>
                                        <input disabled value="{{$currentPreferences["project"]->name}}" class="font-weight-bold text-primary">
                                        <input hidden name="project_id" value="{{$currentPreferences["project"]->id}}">
                                        {{-- <select id="projects" type="text" class="col-md-6 form-control @error('projects') is-invalid @enderror" name="project_id" value="{{ old('provider_id') }}" autocomplete="provider_id" autofocus>
                                            <option disabled selected value>-- Seleccionar cliente --</option>
                                        </select>
                                        @error('projects')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    @foreach($measurements as $measurement)
                                        <div class="d-flex col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                                            <label for="{{ $measurement }}" class="col-md-6 col-form-label text-md-right ">{{ $measurement }}</label>
                                            <input required="required" id="{{ $measurement }}" type="number" min="0" max="5000" pattern="\d+" class="col-md-6 form-control @error('{{ $measurement }}') is-invalid @enderror" name="{{ $measurement }}" value="{{ old('.$measurement.')}}" autocomplete="{{ $measurement }}">
                                        </div>
                                    @endforeach
                                </div>
                            <div class="mb-3 mr-3 float-right">
                                <button type="submit" class="btn btn-primary">Añadir al pedido</button>
                            </div> 
                        </div>
                    </form>
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