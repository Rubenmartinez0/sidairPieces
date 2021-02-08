@extends('layouts.app')
@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h3>Actualizar usuario</h3>
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
    <form method="post" action="{{ route('user.update', $user->id) }}">
        @method('PATCH') 
        @csrf
        <div class="form-group">
            <label for="username"><strong>Usuario:</strong></label>
            <input type="text" class="form-control" name="username" value="{{ old('username') ?? $user->username}}"/>
        </div>

        <div class="form-group">
            <label for="name"><strong>Nombre:</strong></label>
            <input type="text" class="form-control" name="name"value="{{ old('name') ?? $user->name}}"/>
        </div>

        <div class="form-group">
            <label for="surname"><strong>Apellido:</strong></label>
            <input type="text" class="form-control" name="surname" value="{{ old('surname') ?? $user->surname}}"/>
        </div>

        <div class="form-group">
            <label for="active"><strong>Activo:</strong></label>
            <div class="custom-control custom-switch switch-success">
                @if($user->active)
                    <input name="active" data-onstyle="success" checked  type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                @else
                    <input name="active" type="checkbox" class="custom-control-input" id="userSwitch{{$user->id}}">
                @endif
                <label class="custom-control-label" for="userSwitch{{$user->id}}"></label>
            </div>
        </div>

        

        <div class="form-group">
            <label for="role"><strong>Rol:</strong></label>
            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                @foreach($roles as $role)
                    @if($user->role_id == $role->id)
                    <option selected value="{{$role->id}}">{{$role->name}}</option>
                    @else
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label ><strong>Fecha de creación:</strong></label>
            <input disabled type="text" class="form-control" value="{{ $user->created_at }}"/>
        </div>
        <a class="btn btn-primary float-left" href="/users">Atrás</a>
        <button type="submit" class="btn btn-success float-right">Guardar cambios</button>
    </form>

    
    
</div>

@endsection