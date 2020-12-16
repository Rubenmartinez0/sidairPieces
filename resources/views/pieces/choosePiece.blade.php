@extends('layouts.app')

@section('content')
<div class="col-md-12 row justify-content-center">
    <div class="card">
        <div class="card-header d-flex ">
            <h4 class="mr-auto">{{ __('Encargar nueva pieza') }}</h4>
        </div>
        <div class="card-body">


            <div class="container">
                <div class="row justify-content-center text-center">
                    @foreach($pieceTypes as $pieceType)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <a href="piece/{{ $pieceType->id }}">
                                <div class="card mb-4">
                                    <div class="card-header d-flex">
                                        <span class="mr-auto">{{ $pieceType->name }}</span>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{ $pieceType->image_path }}" class="pr-2" style="height:8em; width:8em;" alt="ddds">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection