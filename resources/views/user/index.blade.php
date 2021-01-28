@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-sm-12">
        <h1 >Lista de usuarios</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td class="font-weight-bold">Usuario</td>
              <td class="font-weight-bold">Nombre y apellidos</td>
              <td class="font-weight-bold">Rol</td>
              <td class="font-weight-bold">Activo</td>
              <td class="font-weight-bold">Actions</td>
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
                      <input disable type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                    @endif
                    <label class="custom-control-label" for="userSwitch{{$user->id}}"></label>
                  </div>
                </td>
      
  
                <td>
                    <a href="{{ route('user.editView',$user->id)}}" value={{$user->id}} class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('user.destroy', $user->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/index.js') }}" type="text/javascript"></script> --}}
@endsection
