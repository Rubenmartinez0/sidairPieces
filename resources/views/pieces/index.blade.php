@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex ">
                    <h4 class="mr-auto">{{ __('Encargar nueva pieza') }}</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('piece.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <label for="pieceType" class="col-md-2 col-form-label text-md-right">{{ __('Tipo de pieza') }}</label>
                            <div class="col-md-6">
                                <select id="pieceType" type="text" class="form-control @error('pieceType') is-invalid @enderror" name="pieceType_id" value="{{ old('pieceType') }}" autocomplete="pieceType" autofocus>
                                    <option disabled selected value> -- Selecciona tipo de pieza -- </option>
                                    @foreach($piecesTypes as $pieceType)
                                        <option value={{ $pieceType->id }}>
                                            {{ $pieceType->name }}
                                        </option>       
                                    @endforeach
                                </select>
                                @error('pieceType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="quantity" class="col-md-2 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                            <div class="col-md-2">
                                <input id="quantity" maxLength="2" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                            <label for="material" class="col-md-2 col-form-label text-md-right">{{ __('Material') }}</label>

                            <div class="col-md-2">
                                <select id="material" type="text" class="form-control @error('material') is-invalid @enderror" name="material_id" value="{{ old('material_id') }}" autocomplete="provider_id" autofocus>
                                    <option disabled selected value> -- Selecciona material de la/s pieza/s -- </option>
                                    @forelse($materials as $material)
                                        <option value={{ $material->id }}>
                                            {{ $material->material }}
                                        </option>
                                    @empty
                                        <option>There are no materials in the database</option>       
                                    @endforelse
                                </select>
                                @error('material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="project" class="col-md-2 col-form-label text-md-right">{{ __('Cliente | Obra') }}</label>

                            <div class="col-md-6">
                                <select id="project" type="text" class="form-control @error('project') is-invalid @enderror" name="project_id" value="{{ old('provider_id') }}" autocomplete="provider_id" autofocus>
                                    <option disabled selected value> -- Selecciona obra -- </option>
                                    @forelse($projects as $project)
                                        <option value={{ $project->id }}>
                                            {{ $project->client->name }} | {{ $project->name }}
                                        </option>
                                    @empty
                                        <option>There are no projects in the database</option>       
                                    @endforelse
                                </select>
                                @error('project')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4 mb-3">
                            <button type="submit" class="btn btn-primary">Introducir medidas</button>
                        </div>
                    </form>
                    
                </div>

                
                <!--
                <hr style="width: 75%; margin: auto">
                
                <br>
                 @foreach($piecesTypes as $pieceType)
                    @foreach($pieceType->measurements as $measurement)
                        <div class="form-group row">
                            <label for="material" class="col-md-2 col-form-label text-md-right">{{ $measurement }}</label>
                            <input id="name" type="name" class="col-md-2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
                        </div>
                    @endforeach
                @endforeach -->
        </div>
    </div>
</div>
<div class="container">
        <div class="row justify-content-center">
@foreach($piecesImages as $pieceImage)
    <div class="col-4">
        <div class="card mb-4">
            <div class="card-header d-flex">
                <h4 class="mr-auto">{{ $pieceImage->name }}</h4>
            </div>
            <div class="card-body">
                <a href="{{ $pieceImage->id }}">
                    <img src="{{ $pieceImage->path }}" class="pr-2" style="height:8em; width:8em;" alt="ddds">
                </a>
            </div>
        </div>
    </div>

@endforeach
</div>
    </div>
@endsection