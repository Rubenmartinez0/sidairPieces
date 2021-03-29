@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
            <h1>Listado de obras</h1>
            <a class="btn btn-success mb-3" data-toggle="modal" data-target="#createModal" id="createProjectButton">Crear nueva obra</a>
            
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
      <table id="projectsTable" class="table table-hover table-responsive-lg">
        <thead>
            <tr>
                <th class="font-weight-bold">Nombre de obra</th>
                <th class="font-weight-bold">Piezas totales</th>
                <th class="font-weight-bold">Cliente</th>
                <th class="font-weight-bold">Estado de la obra</th>
                <th class="font-weight-bold">Fecha de inicio</th>
                <th class="font-weight-bold">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><a href="{{ route('project.show',$project->id)}}">{{$project->name}}</a></td>
                <td>{{$project->pieces_count}}</td>
                <td><a href="{{ route('client.projectsView', $project->client->id) }}">{{ $project->client->name}}</a></td>

                <td>{{$project->state->state}}</td>
                <td>{{$project->created_at}}</td>
                {{-- <td><a href="{{ route('project.show',$project->id)}}" class="btn btn-primary mr-5">Ver detalle</a></td> --}}
                <td><a href="{{ route('project.editView',$project->id)}}" class="btn btn-warning mr-5">Editar</a></td>
                {{-- <td>
                  @if($project->pieces_count == 0)
                      <form action="{{ route('project.destroy', $project->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar obra {{$project->name}}?')" >Eliminar</button>
                      </form>
                  @endif
                </td> --}}
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary float-left" href="/cms">Atrás</a>
    
    @include('project.create')

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
  
  <script src="{{ asset('js/project/index.js') }}" type="text/javascript"></script>
@endsection