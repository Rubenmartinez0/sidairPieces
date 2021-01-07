@extends('layouts.app')

@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h2>Preferencias</h2>
    <hr>

    <form action="" method="post" action="{{ route('preferences.store') }}">

        @csrf
        <!-- Client -->
        <div class="form-group p-1">
            <label for="client">Cliente</label>
            <select id="client" class="form-control @error('client') is-invalid @enderror" name="client_id" value="{{ old('client_id') }}">
                <option disabled selected value=""></option>
                @forelse($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @empty
                    <option>There are no available clients</option>       
                @endforelse
            </select>
        </div>

        <!-- Project -->
        <div class="form-group p-1">
            <label for="project">Obra</label>
            <select disabled id="projects" class="form-control @error('projects') is-invalid @enderror" name="project_id" value="{{ old('project_id') }}">
                <option disabled selected value>-- Seleccionar cliente --</option>
            </select>
            @error('projects')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        
        <!-- Material -->
        <div class="form-group p-1">
            <label for="material">Material</label>
            <select id="material" class="form-control @error('material') is-invalid @enderror" name="material_id" value="{{ old('material_id') }}">
                <option disabled selected value=""></option>
                @forelse($materials as $material)
                    <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @empty
                    <option>There are no available materials</option>       
                @endforelse
            </select>
            @error('material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        

        <input hidden name="redirect_to" value="{{ session('redirectTo') ?? '' }}">
        
        <br>
        <input type="submit" value="Guardar opciones" class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 btn btn-success btn-block ml-auto">
    </form>
</div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/user/settings/options.js') }}" type="text/javascript"></script>
@endsection