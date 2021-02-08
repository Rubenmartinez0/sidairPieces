@extends('layouts.app')
@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h3>Editar cliente</h3>
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
    @if($message = Session::get('success'))
        <div class="col-12" style="justify-content:center;"> 
          <div class="alert alert-success">
            <strong>{{ $message }}</strong> 
          </div>
        </div>
    @endif
    <form method="post" action="{{ route('client.update', $client->id) }}">
        @method('PATCH') 
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right"><strong>Nombre:</strong></label>
            <div class="col-md-6">
                <input id="nameInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client->name }}" autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right"><strong>Numero de obras:</strong></label>
            <div class="col-md-6">
                <label for="name" class="col-form-label text-md-right"><strong>{{$client->project_count}}</strong></label>
            </div>
        </div>


        
        <div class="form-group">
            <label for="visible" class="col-md-4 col-form-label text-md-right"><strong>Visible:</strong></label>
            @if($client->visible)
                <input name="visible" type="checkbox" checked data-toggle="toggle">
            @else
                <input name="visible" type="checkbox" data-toggle="toggle">
            @endif
        </div>
        <a class="btn btn-primary float-left" href="/clients">Atrás</a>
        <button type="submit" class="btn btn-success float-right">Guardar cambios</button>
    </form>

    
    
</div>

@endsection