<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar categoría</h6>

        <div class="card-body">
            <form method="POST" action="{{ url('agregar-categoria') }}">
                @csrf

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="c_categorianueva">{{ __('Nombre de la categoría:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="c_categorianueva" type="text" class="form-control @error('c_categorianueva') is-invalid @enderror" name="c_categorianueva" value="{{ old('c_categorianueva') }}" autocomplete="c_categorianueva" autofocus maxlength="50">

                                @error('c_categorianueva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>