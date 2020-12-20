@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row col-md-10 justify-content-center">
        <div class="card">
            <!-- <div class="card-header d-flex"></div> -->
        <div class="card-body m-3 justify-content-center">
            <a class="btn btn-primary mb-3" href="{{ url('/piece') }}">Encargar nueva pieza.</a>            
            <br>
            <a class="btn btn-warning mb-3" href="#">Mis piezas.</a>
            <br>
            <a class="btn btn-success" href="#">Fabricar piezas.</a>
        </div>
    </div>
</div>
@endsection
