@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
      <h1>Listado de obras del cliente '{{ $client->name }}'</h1>

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
        
      <table id="projectsByClientTable" class="table table-hover table-responsive-lg">
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
        </tbody>
    </table>
    <a class="btn btn-primary float-left" href="/clients">Atrás</a>

</div>


@endsection
@section('scripts')
    <!-- CDN datatables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js" defer></script>

  <!-- CDN datatables searchpanes-->
  <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js" defer></script>
  
  <!-- CDN datatables select-->
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js" defer></script>
  
  <!-- CDN buttons select-->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" defer></script>

  <script src="{{ asset('js/client/index.js') }}" type="text/javascript"></script>
@endsection
