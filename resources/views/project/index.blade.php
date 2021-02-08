@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <div class="d-flex">
            <h1>Listado de obras</h1>

            <div class="form-outline d-flex m-auto">
                <input type="search" id="searchbar" class="form-control" autofocus placeholder="Buscar"/>
                <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
                </button>
            </div>

            <a class="btn btn-success m-auto" data-toggle="modal" data-target="#createModal" id="createClientButton">Crear nueva obra</a>
            {{-- <a id="createUserButton" class="btn btn-success m-auto" href="/client/create">Crear nuevo cliente</a> --}}
        </div>
      <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
                <td class="font-weight-bold">Nombre de obra</td>
                <td class="font-weight-bold">Cliente</td>

                <td class="font-weight-bold">Estado de la obra</td>
                <td class="font-weight-bold">Fecha de inicio</td>
                <td class="font-weight-bold">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->client->name}}</td>
                <td>{{$project->state->state}}</td>
                <td>{{$project->created_at}}</td>
                <td><a href="{{ route('project.editView',$project->id)}}" class="btn btn-warning mr-5">Editar</a></td>
            </tr>
            
            @endforeach

            <div class="col-4" style="justify-content:center;"> 
              @if($message = Session::get('success'))
                <div class="alert alert-success">
                  <strong>{{ $message }}</strong> 
                </div>
              @endif
                
              @if($message = Session::get('fail'))
                <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
                </div>
              @endif
            </div>
        </tbody>
    </table>
    <a class="btn btn-primary float-left" href="/cms">Atrás</a>
    
    @include('project.create')
    {{-- @include('client.edit') --}}

</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/client/index.js') }}" type="text/javascript"></script>
@endsection
