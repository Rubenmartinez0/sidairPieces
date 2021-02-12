@extends('layouts.app')
@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h3>Editar obra</h3>
    <hr>
    @if ($errors->any())
        <div class="col-12 alert alert-danger" style="justify-content:center;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/> 
    @endif

    @if($message = Session::get('fail'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    <form method="post" action="{{ route('project.update', $project->id) }}">
        @method('PATCH') 
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-right"><strong>Nombre:</strong></label>
            <div class="col-md-6">
                <input id="nameInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $project->name }}" autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="client" class="col-md-5 col-form-label text-md-right"><strong>Cliente:</strong></label>
            <div class="col-md-6">
                <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                    @foreach($clients as $client)
                        @if($project->client_id == $client->id)
                        <option selected value="{{$client->id}}">{{$client->name}}</option>
                        @else
                            @if($client->visible == 1)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            @error('client')
                <span class="invalid-feedback" client="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group row">
            <label for="state" class="col-md-5 col-form-label text-md-right"><strong>Estado de la obra:</strong></label>
            <div class="col-md-6">
                <select name="state_id" class="form-control @error('state_id') is-invalid @enderror">
                    @foreach($states as $states)
                        @if($project->state_id == $states->id)
                        <option selected value="{{$states->id}}">{{$states->state}}</option>
                        @else
                            <option value="{{$states->id}}">{{$states->state}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right"><strong>Fecha de creación:</strong></label>
            <div class="col-md-6">
                <input disabled type="text" class="form-control" value="{{ $project->created_at }}"/>
            </div>
        </div>
        @if($project->finished_at)
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right"><strong>Fecha de finalización:</strong></label>
                <div class="col-md-6">
                    <input disabled type="text" class="form-control" value="{{ $project->finished_at }}"/>
                </div>
            </div>
        @endif
        <hr>
        <a class="btn btn-primary float-left" href="/projects">Atrás</a>
        <button type="submit" class="btn btn-success float-right">Guardar cambios</button>
    </form>
</div>

@endsection