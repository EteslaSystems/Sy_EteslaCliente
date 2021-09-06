@extends('roles/admin')
    @section('contenidoAdmin')
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar panel</h6>

                <div class="card-body">
                	@foreach($panel as $details)
	                    <form method="POST" action="{{ url('editar-panel', $details->idPanel) }}">
						    @csrf
						    @method('PUT')

						    <div class="container">
			                    <div class="row row-cols-3">
			                        <div class="col">
			                            <div class="form-group">
			                                <label for="p_nombrematerial">{{ __('Nombre del material:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_nombrematerial" type="text" class="form-control @error('p_nombrematerial') is-invalid @enderror" name="p_nombrematerial" value="{{ $details->vNombreMaterialFot }}" autofocus>

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

			                                <input id="p_marca" type="text" class="form-control @error('p_marca') is-invalid @enderror" name="p_marca" value="{{ $details->vMarca }}" autofocus>

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

			                                <input id="p_potencia" type="number" step="any" class="form-control @error('p_potencia') is-invalid @enderror" name="p_potencia" value="{{ $details->fPotencia }}" autofocus>

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

			                                <input id="p_isc" type="number" step="any" class="form-control @error('p_isc') is-invalid @enderror" name="p_isc" value="{{ $details->fISC }}" autofocus>

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
			                                    <option @if($details->vTipoMoneda == "Peso") selected @endif value="Peso">($) Pesos méxicanos</option>
						                        <option @if($details->vTipoMoneda == "Dolar") selected @endif value="Dolar">($) Dolares</option>
						                        <option @if($details->vTipoMoneda == "Euro") selected @endif value="Euro">(€) Euros</option>
						                        <option @if($details->vTipoMoneda == "Libra") selected @endif value="Libra">(£) Libras</option>
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

			                                <input id="p_precio" type="number" step="any" class="form-control @error('p_precio') is-invalid @enderror" name="p_precio" value="{{ $details->fPrecio }}" autofocus>

			                                @error('p_precio')
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
			                                <label for="p_voc">{{ __('Voltaje en circuito abierto:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_voc" type="number" step="any" class="form-control @error('p_voc') is-invalid @enderror" name="p_voc" value="{{ $details->fVOC }}" autofocus>

			                                @error('p_voc')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
			                            </div>
									</div>
									<div class="col">
			                            <div class="form-group">
			                                <label for="p_garantia">{{ __('Garantia:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_garantia" type="number" step="any" class="form-control @error('p_garantia') is-invalid @enderror" name="p_garantia" value="{{ $details->vGarantia }}" autofocus>

			                                @error('p_garantia')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
			                            </div>
									</div>
									<div class="col">
			                            <div class="form-group">
			                                <label for="p_origen">{{ __('Origen:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="p_origen" type="text" step="any" class="form-control @error('p_origen') is-invalid @enderror" name="p_origen" value="{{ $details->vOrigen }}" autofocus>

			                                @error('p_origen')
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
											<label for="p_vmp">{{ __('Voltaje en máxima potencia:') }}</label>

											<small class="note-form darkred">* Campo requerido</small>

											<input id="p_vmp" type="number" step="any" class="form-control @error('p_vmp') is-invalid @enderror" name="p_vmp" value="{{ $details->fVMP }}" autofocus>

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
					@endforeach
                </div>
            </div>
        </div>
    @endsection