@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="">Encargar nueva pieza - <span class="font-weight-bold"> {{ $pieceType->name }}</span></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('piece.store') }}">
                        @csrf
                        @method('POST')
                        <div class="row">   
                            <!-- Above -->
                        </div>
                        <div class="container">
                            <div class="row d-sm-block">
                                <div class="col-8 col-sm-8 float-right mb-3">
                                    <div class="d-flex">
                                        <!-- Quantity -->
                                        <label for="quantity" class="col-md-2 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                                        <input id="quantity" maxLength="2" type="text" class="col-md-2 form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                        <!-- Material -->
                                        <label for="material" id="test" class="col-md-2 col-form-label text-md-right">{{ __('Material') }}</label>
                                        <select id="material" type="text" class="col-md-2 form-control @error('material') is-invalid @enderror" name="material_id" value="{{ old('material_id') }}" autocomplete="provider_id" autofocus>
                                            <option disabled selected value> -- </option>
                                            @forelse($materials as $material)
                                                <option value={{ $material->id }}>
                                                    {{ $material->material }}
                                                </option>
                                            @empty
                                                <option>There are no materials in the database</option>       
                                            @endforelse
                                        </select>
                                        @error('material')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 float-left text-center">
                                    <img src="{{ $pieceType->image_path }}" class="pr-2" style="height:10em; width:10em;" alt="{{ $pieceType->name }}">
                                    <br>
                                    <a class="btn btn-warning mt-2" href="{{ url('/piece') }}">Elegir otra pieza</a>    
                                </div>
                                <div class="col-8 col-sm-8 float-right mb-3">
                                    <div class="d-flex">
                                        <!-- Client -->
                                        <label for="client" class="col-md-2 col-form-label text-md-right">Cliente</label>
                                        <select id="client" type="text" class="col-md-6 form-control @error('client') is-invalid @enderror" name="project_id" value="{{ old('provider_id') }}" autocomplete="provider_id" autofocus>
                                            <option disabled selected value> -- </option>
                                            @forelse($clients as $client)
                                                <option value={{ $client->id }}>
                                                    {{ $client->name }}
                                                </option>
                                            @empty
                                                <option>There are no projects in the database</option>       
                                            @endforelse
                                        </select>
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-8 col-sm-8 float-right d-flex mb-3">
                                    <!-- Project -->
                                    <label for="project" class="col-md-2 col-form-label text-md-right">Obra</label>
                                    <select id="projects" type="text" class="col-md-6 form-control @error('project') is-invalid @enderror" name="project_id" value="{{ old('provider_id') }}" autocomplete="provider_id" autofocus>
                                        <option disabled selected value> -- Seleccionar cliente -- </option>
                                        <option> TEST</option>
                                    </select>
                                    @error('project')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="container">
                        <div class="row p-3">
                            @foreach($measurements as $measurement)
                                <div class="d-flex col-sm-2 col-md-4 mb-3">
                                    <label for="{{ $measurement }}" class="col-md-9 col-form-label text-md-right ">{{ $measurement }}</label>
                                    <input id="{{ $measurement }}" maxLength="4" type="text" class="col-md-3 form-control @error('{{ $measurement }}') is-invalid @enderror" name="{{ $measurement }}" value="{{ old('quantity') }}" autocomplete="{{ $measurement }}">
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mb-3 mr-3 float-right">
                            <button type="submit" class="btn btn-primary">Encargar pieza</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

        
        // var countryID = $(this).val();
        // if(countryID) {
        // $.ajax({
        //     url: '/admin/user_register/ajax/'+encodeURI(countryID),
        //     type: "GET",
        //     dataType: "json",
        //     success:function(data) {
        //     $('select[name="state"]').empty();
        //     $.each(data, function(key, value) {
        //         $('select[name="state"]').append('<option value="'+ value +'">'+ value +'</option>');
        //         });
        //     }
        // });
        // }else{
        // $('select[name="state"]').empty();
        //     }
        // });

$(document).ready(function() {
    $('#client').change(function() {
        $.ajax({
            url: '/projects/'+encodeURI($(this).val()),
            type: "GET",
            dataType: "json",
            success:function(data) {
                console.log(data);
                $('#projects').empty();
                $.each(data, function(key, project){
                    $('#projects').append('<option value="'+project.id+'">'+project.name+'</option>')
                });
  
            }
        });
    });
});
</script>
@endsection