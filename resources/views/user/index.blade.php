@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <div class="d-flex">
          <h1>Lista de usuarios</h1>    
          <a class="btn btn-success m-auto" href="/user/create">Crear nuevo usuario</a>
        </div>
      <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
              <td class="font-weight-bold">Usuario</td>
              <td class="font-weight-bold">Nombre y apellidos</td>
              <td class="font-weight-bold">Rol</td>
              <td class="font-weight-bold">Activo</td>
              <td class="font-weight-bold" colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->name}} {{$user->surname}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                  <div class="custom-control custom-switch switch-success" >
                    @if($user->active)
                      <input data-onstyle="success"checked disabled  type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                    @else
                      <input disabled type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                    @endif
                    <label class="custom-control-label" for="userSwitch{{$user->id}}"></label>
                  </div>
                </td>
      
  
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
    <div>
</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/index.js') }}" type="text/javascript"></script> --}}
@endsection
