<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Nueva obra</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                
            </div>
            <form method="POST" action="{{ route('project.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        
                        <label for="name" class="col-md-4 col-form-label text-md-right"><strong>Nombre:</strong></label>
        
                        <div class="col-md-6">
                            <input id="nameInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus/>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><strong>Cliente:</strong></label>
                        <div class="col-md-6">
                            <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                                <option selected value=0>--Seleccionar cliente--</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Crear cliente">
                </div> 
            </form>
        </div>
    </div> 
</div>