@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <div class="d-flex">
            <h1>Lista de clientes</h1>

            <div class="form-outline d-flex m-auto">
                <input type="search" id="searchbar" class="form-control" autofocus placeholder="Buscar"/>
                <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
                </button>
            </div>
            

            <a class="btn btn-success m-auto" data-toggle="modal" data-target="#createModal" id="createClientButton">Crear nuevo cliente</a>
            {{-- <a id="createUserButton" class="btn btn-success m-auto" href="/client/create">Crear nuevo cliente</a> --}}
        </div>
      <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
              <td class="font-weight-bold">Cliente</td>
              <td class="font-weight-bold">Numero de obras</td>
              <td class="font-weight-bold">Visible</td>
              <td class="font-weight-bold">Fecha de creación</td>
              <td class="font-weight-bold">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td><a href="#" class="btn btn-primary">{{$client->project_count}}</a></td>
                <td>
                  <div class="custom-control custom-switch switch-success">
                    @if($client->visible)
                      <input data-onstyle="success"checked disabled  type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                    @else
                      <input disable type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                    @endif
                    <label class="custom-control-label" for="clientSwitch{{$client->id}}"></label>
                  </div>
                </td>
                <td>{{$client->created_at}}</td>
  
                {{-- <td><a class="btn btn-warning" data-toggle="modal" data-target="#editModal">Editar</a></td> --}}
                <td><a href="{{ route('client.editView',$client->id)}}" class="btn btn-warning">Editar</a></td>
                <td>
                    @if($client->project_count == 0)
                        <form action="{{ route('client.destroy', $client->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar cliente {{$client->name}}?')" >Eliminar</button>
                        </form>
                    @endif
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
    
    @include('client.create')
    {{-- @include('client.edit') --}}

</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/client/index.js') }}" type="text/javascript"></script>
@endsection
