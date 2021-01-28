@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-sm-12">
        <h1 >Lista de usuarios</h1>    
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Usuario</td>
              <td>Nombre y apellidos</td>
              <td>Rol</td>
              <td>Activo</td>
              <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->name}} {{$user->surname}}</td>
                <td>{{$user->role_id}}</td>
                <td>{{$user->active}}</td>
                <td>
                    <a href="{{ route('user.update',$user->id)}}" class="btn btn-primary">Editar</a>
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
