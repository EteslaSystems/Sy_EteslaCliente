<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar panel</h6>

        <div class="card-body">
            <form method="POST" action="{{ url('agregar-panel') }}">
                @csrf

                <div class="container">
                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="p_nombrematerial">{{ __('Nombre del material:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_nombrematerial" type="text" class="form-control @error('p_nombrematerial') is-invalid @enderror" name="p_nombrematerial" value="{{ old('p_nombrematerial') }}" autocomplete="p_nombrematerial" autofocus maxlength="50">

                                @error('p_nombrematerial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="p_marca">{{ __('Marca:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_marca" type="text" class="form-control @error('p_marca') is-invalid @enderror" name="p_marca" value="{{ old('p_marca') }}" autocomplete="p_marca" autofocus maxlength="50">

                                @error('p_marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="p_potencia">{{ __('Potencia:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_potencia" type="number" step="any" class="form-control @error('p_potencia') is-invalid @enderror" name="p_potencia" value="{{ old('p_potencia') }}" autocomplete="p_potencia" autofocus>

                                @error('p_potencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="p_isc">{{ __('Intensidad por cortocircuito:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_isc" type="number" step="any" class="form-control @error('p_isc') is-invalid @enderror" name="p_isc" value="{{ old('p_isc') }}" autocomplete="p_isc" autofocus>

                                @error('p_isc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="p_tipomoneda">{{ __('Tipo de moneda:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <select class="form-control @error('p_tipomoneda') is-invalid @enderror" name="p_tipomoneda" autofocus>
                                    <option selected disabled>Elige una opción:</option>
                                    <option value="Peso">($) Pesos méxicanos</option>
                                    <option value="Dolar">($) Dolares</option>
                                    <option value="Euro">(€) Euros</option>
                                    <option value="Libra">(£) Libras</option>
                                </select>

                                @error('p_tipomoneda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="p_precio">{{ __('Precio:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_precio" type="number" step="any" class="form-control @error('p_precio') is-invalid @enderror" name="p_precio" value="{{ old('p_precio') }}" autocomplete="p_precio" autofocus>

                                @error('p_precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="p_voc">{{ __('Voltaje en circuito abierto:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_voc" type="number" step="any" class="form-control @error('p_voc') is-invalid @enderror" name="p_voc" value="{{ old('p_voc') }}" autocomplete="p_voc" autofocus>

                                @error('p_voc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="p_vmp">{{ __('Voltaje en máxima potencia:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="p_vmp" type="number" step="any" class="form-control @error('p_vmp') is-invalid @enderror" name="p_vmp" value="{{ old('p_vmp') }}" autocomplete="p_vmp" autofocus>

                                @error('p_vmp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>