@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header d-flex ">
            <h4 class="mr-auto">{{ __('Settings') }}</h4>
        </div>
        <div class="card-body">
            <!-- Client -->
            <div class="d-flex mb-3">
                <label for="client" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label text-md-right">Cliente</label>
                <select id="client" class="col-md-6 col-lg-6 col-xl-6 form-control @error('client') is-invalid @enderror" name="client_id" value="{{ old('client_id') }}">
                    <option disabled selected value=""> -- </option>
                    @forelse($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @empty
                        <option>There are no available clients</option>       
                    @endforelse
                </select>
                @error('client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Project -->
            <div class="d-flex mb-3">
                <label for="project" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label text-md-right">Obra</label>
                <select disabled id="projects" class="col-md-6 col-lg-6 col-xl-6 form-control @error('projects') is-invalid @enderror" name="projects_id" value="{{ old('project_id') }}">
                <option disabled selected value>Cliente</option>
                </select>
                @error('projects')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <!-- Material -->
            <div class="d-flex mb-3">
                <label for="material" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label text-md-right">{{ __('Material') }}</label>
                <select id="material" class="col-md-6 col-lg-6 col-xl-6 form-control @error('material') is-invalid @enderror" name="material_id" value="{{ old('material_id') }}">
                    <option disabled selected value=""> -- </option>
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

            <div class="mt-3 float-right">
                <button type="submit" class="btn btn-success">Guardar opciones</button>
            </div> 
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/user/settings/options.js') }}" type="text/javascript"></script>
@endsection