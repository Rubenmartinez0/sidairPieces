@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <div class="d-flex">
          <h1>Lista de clientes</h1>    
          <a class="btn btn-success m-auto" href="/client/create">Crear nuevo cliente</a>
        </div>
      <table class="table table-striped">
        <thead>
            <tr>
              <td class="font-weight-bold">Cliente</td>
              <td class="font-weight-bold">Visible</td>
              <td class="font-weight-bold">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td>
                  <div class="custom-control custom-switch switch-success" >
                    @if($client->visible)
                      <input data-onstyle="success"checked disabled  type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                    @else
                      <input disable type="checkbox" class="custom-control-input" id="clientSwitch{{$client->id}}">
                    @endif
                    <label class="custom-control-label" for="clientSwitch{{$client->id}}"></label>
                  </div>
                </td>
      
  
                <td>
                    <a href="{{ route('client.editView',$client->id)}}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('client.destroy', $client->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar cliente {{$client->name}}?')" >Eliminar</button>
      
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
    <div>
</div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/index.js') }}" type="text/javascript"></script> --}}
@endsection
