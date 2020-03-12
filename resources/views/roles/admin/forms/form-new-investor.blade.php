<div class="content">
    <div class="card">
        <h6 class="card-header">Agregar inversor</h6>

        <div class="card-body">
            <form method="POST" action="{{ url('agregar-inversor') }}">
                @csrf

                <div class="container">
                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="i_nombrematerial">{{ __('Nombre del material:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_nombrematerial" type="text" class="form-control @error('i_nombrematerial') is-invalid @enderror" name="i_nombrematerial" value="{{ old('i_nombrematerial') }}" autocomplete="i_nombrematerial" autofocus maxlength="50">

                                @error('i_nombrematerial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_marca">{{ __('Marca:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_marca" type="text" class="form-control @error('i_marca') is-invalid @enderror" name="i_marca" value="{{ old('i_marca') }}" autocomplete="i_marca" autofocus maxlength="50">

                                @error('i_marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_precio">{{ __('Precio:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_precio" type="number" step="any" class="form-control @error('i_precio') is-invalid @enderror" name="i_precio" value="{{ old('i_precio') }}" autocomplete="i_precio" autofocus>

                                @error('i_precio')
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
                                <label for="i_potencia">{{ __('Potencia:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_potencia" type="number" step="any" class="form-control @error('i_potencia') is-invalid @enderror" name="i_potencia" value="{{ old('i_potencia') }}" autocomplete="i_potencia" autofocus>

                                @error('i_potencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_isc">{{ __('Intensidad de cortocircuito:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_isc" type="number" step="any" class="form-control @error('i_isc') is-invalid @enderror" name="i_isc" value="{{ old('i_isc') }}" autocomplete="i_isc" autofocus>

                                @error('i_isc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_tipomoneda">{{ __('Tipo de moneda:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <select class="form-control @error('i_tipomoneda') is-invalid @enderror" name="i_tipomoneda" autofocus>
                                    <option selected disabled>Elige una opción:</option>
                                    <option value="Peso">($) Pesos méxicanos</option>
                                    <option value="Dolar">($) Dolares</option>
                                    <option value="Euro">(€) Euros</option>
                                    <option value="Libra">(£) Libras</option>
                                </select>

                                @error('i_tipomoneda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="i_vmin">{{ __('Voltaje mínimo:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_vmin" type="number" step="any" class="form-control @error('i_vmin') is-invalid @enderror" name="i_vmin" value="{{ old('i_vmin') }}" autocomplete="i_vmin" autofocus>

                                @error('i_vmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_vmax">{{ __('Voltaje máximo:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_vmax" type="number" step="any" class="form-control @error('i_vmax') is-invalid @enderror" name="i_vmax" value="{{ old('i_vmax') }}" autocomplete="i_vmax" autofocus>

                                @error('i_vmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_pmin">{{ __('Potencia mínimo:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_pmin" type="number" step="any" class="form-control @error('i_pmin') is-invalid @enderror" name="i_pmin" value="{{ old('i_pmin') }}" autocomplete="i_pmin" autofocus>

                                @error('i_pmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="i_pmax">{{ __('Potencia máximo:') }}</label>

                                <small class="note-form darkred">* Campo requerido</small>

                                <input id="i_pmax" type="number" step="any" class="form-control @error('i_pmax') is-invalid @enderror" name="i_pmax" value="{{ old('i_pmax') }}" autocomplete="i_pmax" autofocus>

                                @error('i_pmax')
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