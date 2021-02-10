@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <h1>Lista de usuarios</h1>
        <a class="btn btn-success mb-3" href="/user/create">Crear nuevo usuario</a>
        
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
        
        <table id="usersTable" class="table table-hover table-responsive-lg">
          <thead>
              <tr>
                <th class="font-weight-bold">Usuario</th>
                <th class="font-weight-bold">Nombre y apellidos</th>
                <th class="font-weight-bold">Rol</th>
                <th class="font-weight-bold">Activo</th>
                <th class="font-weight-bold">Creación</th>
                <th class="font-weight-bold">Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}} {{$user->surname}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                      <div class="custom-control custom-switch switch-success">
                        @if($user->active)
                          <input data-onstyle="success"checked disabled  type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                        @else
                          <input disabled type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                        @endif
                        <label class="custom-control-label" for="userSwitch{{$user->id}}"></label>
                      </div>
                    </td>
                    <td>{{$user->created_at}}</td>

                    <td class="row">
                        <a href="{{ route('user.editView',$user->id)}}" class="btn btn-warning mr-5">Editar</a>
                        <form action="{{ route('user.destroy', $user->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar usuario {{$user->username}}?')" >Eliminar</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    
      <a class="btn btn-primary float-left" href="/cms">Atrás</a>
    <div>
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
  
  <script src="{{ asset('js/user/index.js') }}" type="text/javascript"></script>
@endsection
