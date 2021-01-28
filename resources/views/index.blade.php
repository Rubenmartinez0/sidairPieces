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
            <a class="btn btn-warning mb-3" href="/myOrders">Mis pedidos.</a>
            <br>
            <a class="btn btn-success mb-3" href="/order/manufacture/i">Fabricar piezas.</a>
            <br>
            <a class="btn btn-info" href="/cms">CMS</a>
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
