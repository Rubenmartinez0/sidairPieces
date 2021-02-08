@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <div class="d-flex">
            <h1>Listado de obras del cliente '{{ $client->name }}'</h1>

            <div class="form-outline d-flex m-auto">
                <input type="search" id="searchbar" class="form-control" autofocus placeholder="Buscar"/>
                <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
      <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
                <td class="font-weight-bold">Nombre de obra</td>
                <td class="font-weight-bold">Piezas t. encargadas</td>
                <td class="font-weight-bold">Estado de la obra</td>
                <td class="font-weight-bold">Fecha de inicio</td>
                <td class="font-weight-bold">Fecha de finalización</td>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->pieces_count}}</td>
                <td>{{$project->state->state}}</td>
                <td>{{$project->created_at}}</td>
                @if($project->finished_at)
                    <td>{{$project->finished_at}}</td>
                @else
                    <td>-</td>
                @endif
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
    <a class="btn btn-primary float-left" href="/clients">Atrás</a>

</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/client/index.js') }}" type="text/javascript"></script>
@endsection
