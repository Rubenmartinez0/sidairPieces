@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">

      <h1>Lista de clientes</h1>
      <a class="btn btn-success mb-3" data-toggle="modal" data-target="#createModal" id="createClientButton">Crear nuevo cliente</a>
      
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

      <table id="clientsTable" class="table table-hover table-responsive-lg">
        <thead>
            <tr>
              <th class="font-weight-bold">Cliente</th>
              <th class="font-weight-bold">Numero de obras</th>
              <th class="font-weight-bold">Visible</th>
              <th class="font-weight-bold">Creación</th>
              <th class="font-weight-bold">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
              <tr>
                  <td>{{$client->name}}</td>
                  <td><a href="{{ route('client.projectsView', $client->id) }}" class="btn btn-primary">{{$client->project_count}}</a></td>
                  <td>
                    <div class="custom-control custom-switch switch-success">
                      @if($client->visible)
                        <input data-onstyle="success"checked disabled  type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                      @else
                        <input  disabled type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                      @endif
                      <label class="custom-control-label" for="clientSwitch{{$client->id}}"></label>
                    </div>
                  </td>
                  <td>{{$client->created_at}}</td>
                  <td><a href="{{ route('client.editView',$client->id)}}" class="btn btn-warning">Editar</a></td>
                  {{-- <td>
                      @if($client->project_count == 0)
                          <form action="{{ route('client.destroy', $client->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar cliente {{$client->name}}?')" >Eliminar</button>
                          </form>
                      @endif
                  </td> --}}
              </tr>
            
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary float-left" href="/cms">Atrás</a>
    
    @include('client.create')
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
