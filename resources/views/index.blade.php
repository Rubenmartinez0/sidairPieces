@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="card">
            <!-- <div class="card-header d-flex"></div> -->
        <div class="card-body m-3 justify-content-center">
            <a class="btn btn-primary mb-3" href="{{ url('/piece') }}">Encargar nueva pieza.</a>            
            <br>
            {{-- <a class="btn btn-warning mb-3" href="{{ Auth::user()->id }}/order">Mis pedidos.</a> --}}
            <a class="btn mb-3" style="background-color: #bf00ff; color: white" href="/myOrders">Mis pedidos.</a>
            <br>
            <a class="btn mb-3" style="background-color: #ff00bf; color: white" href="/preferences">Mis preferencias.</a>
            <br>
            <a class="btn mb-3" style="background-color: #ffff00; color: black" href="/order/manufacture/i">Fabricar piezas.</a>
            <br>
            <a class="btn" style="background-color: #80ff00; color: black" href="/cms">CMS</a>
        </div>
    </div>

    
</div>
<div class="row mt-3 p-1" style="display:flex; justify-content:center;">
    @if ($message = Session::get('status'))
        <div id="status_message" class="alert alert-success alert-block">
            <!-- <button type="button" class="close" data-dismiss="alert" >×</button>     -->
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('fail_status'))
        <div id="status_message" class="alert alert-danger alert-block">
            <!-- <button type="button" class="close" data-dismiss="alert" >×</button>     -->
            <strong>{{ $message }}</strong>
        </div>
    @endif
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/index.js') }}" type="text/javascript"></script>
@endsection
