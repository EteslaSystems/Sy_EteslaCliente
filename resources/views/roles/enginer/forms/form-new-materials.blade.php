<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar materiales a una categoría</h6>

        <div class="card-body">
            <form method="POST" action="{{ url('agregar-materiales') }}">
                @csrf

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="m_nombrematerial">{{ __('Nombre del material:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_nombrematerial" type="text" class="form-control @error('m_nombrematerial') is-invalid @enderror" name="m_nombrematerial" value="{{ old('m_nombrematerial') }}" autocomplete="m_nombrematerial" autofocus maxlength="50">

                                @error('m_nombrematerial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="m_agregarcategoria">{{ __('Categoría perteneciente:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <select class="form-control mr-sm-3" id="m_agregarcategoria" class="form-control @error('m_agregarcategoria') is-invalid @enderror" name="m_agregarcategoria" autofocus>
                                    <option selected disabled>Selecciona una opción:</option>

                                    @foreach($vCategorias as $details)
                                        <option value="{{ $details->idCategOtrosMateriales }}">{{ $details->vNombreCategoOtrosMats }}</option>
                                    @endforeach
                                </select>

                                @error('m_agregarcategoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="m_unidadmaterial">{{ __('Unidad del material:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_unidadmaterial" type="text" class="form-control @error('m_unidadmaterial') is-invalid @enderror" name="m_unidadmaterial" value="{{ old('m_unidadmaterial') }}" autocomplete="m_unidadmaterial" autofocus maxlength="50">

                                @error('m_unidadmaterial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="m_preciounitario">{{ __('Precio unitario:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="m_preciounitario" type="number" class="form-control @error('m_preciounitario') is-invalid @enderror" name="m_preciounitario" value="{{ old('m_preciounitario') }}" autocomplete="m_preciounitario" autofocus maxlength="50">

                                @error('m_preciounitario')
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