@extends('roles/admin')
    @section('contenidoAdmin')
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar inversor</h6>

                <div class="card-body">
                	@foreach($inversor as $details)
	                    <form method="POST" action="{{ url('editar-inversor', $details->idInversor) }}">
						    @csrf
						    @method('PUT')

						    <div class="container">
						        <div class="row row-cols-3">
						            <div class="col">
						                <div class="form-group">
						                    <label for="i_nombrematerial">{{ __('Nombre del material:') }}</label>

						                    <small class="note-form darkred">* Campo requerido</small>

						                    <input id="i_nombrematerial" type="text" class="form-control @error('i_nombrematerial') is-invalid @enderror" name="i_nombrematerial" value="{{ $details->vNombreMaterialFot }}" autofocus>

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

						                    <input id="i_marca" type="text" class="form-control @error('i_marca') is-invalid @enderror" name="i_marca" value="{{ $details->vMarca }}" autofocus>

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

						                    <input id="i_precio" type="number" step="any" class="form-control @error('i_precio') is-invalid @enderror" name="i_precio" value="{{ $details->fPrecio }}" autofocus>

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

						                    <input id="i_potencia" type="number" step="any" class="form-control @error('i_potencia') is-invalid @enderror" name="i_potencia" value="{{ $details->fPotencia }}" autofocus>

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

						                    <input id="i_isc" type="number" step="any" class="form-control @error('i_isc') is-invalid @enderror" name="i_isc" value="{{ $details->fISC }}" autofocus>

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
						                        <option disabled>Elige una opción:</option>
						                        <option @if($details->vTipoMoneda == "Peso") selected @endif value="Peso">($) Pesos méxicanos</option>
						                        <option @if($details->vTipoMoneda == "Dolar") selected @endif value="Dolar">($) Dolares</option>
						                        <option @if($details->vTipoMoneda == "Euro") selected @endif value="Euro">(€) Euros</option>
						                        <option @if($details->vTipoMoneda == "Libra") selected @endif value="Libra">(£) Libras</option>
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

						                    <input id="i_vmin" type="number" step="any" class="form-control @error('i_vmin') is-invalid @enderror" name="i_vmin" value="{{ $details->iVMIN }}" autofocus>

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

						                    <input id="i_vmax" type="number" step="any" class="form-control @error('i_vmax') is-invalid @enderror" name="i_vmax" value="{{ $details->iVMAX }}" autofocus>

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

						                    <input id="i_pmin" type="number" step="any" class="form-control @error('i_pmin') is-invalid @enderror" name="i_pmin" value="{{ $details->iPMIN }}" autofocus>

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

						                    <input id="i_pmax" type="number" step="any" class="form-control @error('i_pmax') is-invalid @enderror" name="i_pmax" value="{{ $details->iPMAX }}" autofocus>

						                    @error('i_pmax')
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
			                                <label for="i_garantia">{{ __('Garantia:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="i_garantia" type="number" step="any" class="form-control" value="{{ $details->vGarantia }}" autofocus>

			                                @error('i_garantia')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
			                            </div>
									</div>
									<div class="col">
			                            <div class="form-group">
			                                <label for="i_origen">{{ __('Origen:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="i_origen" type="number" step="any" class="form-control" value="{{ $details->vOrigen }}" autofocus>

			                                @error('i_origen')
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

						                <a href="{{ url('inversores') }}" class="btn btn-warning btn-lg">Cancelar</a>
						            </div>
						        </div>
						    </div>
						</form>
					@endforeach
                </div>
            </div>
        </div>
    @endsection