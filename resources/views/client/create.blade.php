<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                
            </div>
            <form method="POST" action="{{ route('client.store') }}">
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
                    <div class="form-group">
                        <label for="visible" class="col-md-4 col-form-label text-md-right"><strong>Visible:</strong></label>
                        <input name="visible" type="checkbox" checked data-toggle="toggle">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Crear cliente">
                </div> 
            </form>
        </div>
    </div> 
</div>