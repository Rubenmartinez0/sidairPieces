@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="card">
            <!-- <div class="card-header d-flex"></div> -->
        <div class="card-body m-3 justify-content-center">
            <a class="btn btn-primary mb-3" href="/users">Gestionar usuarios.</a>            
            <br>
            {{-- <a class="btn btn-warning mb-3" href="#">Mis pedidos.</a> --}}
            <a class="btn btn-warning mb-3" href="#">Gestionar clientes</a>
            <br>
            <a class="btn btn-success mb-3" href="#">Gestionar obras</a>
            <br>
        </div>
    </div>

    
</div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/index.js') }}" type="text/javascript"></script>
@endsection
