@extends('roles/enginer')
	@section('enginerContent')
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar material</h6>

                <div class="card-body">
                	@foreach($materiales as $details)
                		<form method="POST" action="{{ url('editar-materiales', $details->idOtrosMateriales) }}">
						    @csrf
						    @method('PUT')

						    <div class="container">
			                    <div class="row">
			                        <div class="col-8">
			                            <div class="form-group">
			                                <label for="m_nombrematerialedit">{{ __('Nombre del material:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_nombrematerialedit" type="text" class="form-control @error('m_nombrematerialedit') is-invalid @enderror" name="m_nombrematerialedit" value="{{ $details->vPartida }}" autofocus>

			                                @error('m_nombrematerialedit')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
			                                @enderror
			                            </div>
			                        </div>

			                        <div class="col-4">
			                            <div class="form-group">
			                                <label for="m_agregarcategoriaedit">{{ __('Categoría perteneciente:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <select class="form-control mr-sm-3" id="m_agregarcategoriaedit" class="form-control @error('m_agregarcategoriaedit') is-invalid @enderror" name="m_agregarcategoriaedit" autofocus>
			                                    <option disabled>Selecciona una opción:</option>

			                                    @foreach($vCategorias as $categoria)
			                                    	@if ($categoria->idCategOtrosMateriales == $details->idCategOtrosMateriales)
			                                        	<option value="{{ $categoria->idCategOtrosMateriales }}" selected>{{ $categoria->vNombreCategoOtrosMats }}</option>
			                                        @else
			                                        	<option value="{{ $categoria->idCategOtrosMateriales }}">{{ $categoria->vNombreCategoOtrosMats }}</option>
			                                        @endif
			                                    @endforeach
			                                </select>

			                                @error('m_agregarcategoriaedit')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
			                            </div>
			                        </div>

			                        <div class="col-6">
			                            <div class="form-group">
			                                <label for="m_unidadmaterialedit">{{ __('Unidad del material:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_unidadmaterialedit" type="text" class="form-control @error('m_unidadmaterialedit') is-invalid @enderror" name="m_unidadmaterialedit" value="{{ $details->vUnidad }}" autofocus>

			                                @error('m_unidadmaterialedit')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
			                            </div>
			                        </div>

			                        <div class="col-6">
			                            <div class="form-group">
			                                <label for="m_preciounitarioedit">{{ __('Precio unitario:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="m_preciounitarioedit" type="number" class="form-control @error('m_preciounitarioedit') is-invalid @enderror" name="m_preciounitarioedit" value="{{ $details->fPrecioUnitario }}" autocomplete="m_preciounitarioedit" autofocus maxlength="50">

			                                @error('m_preciounitarioedit')
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
					@endforeach
                </div>
            </div>
        </div>
    @endsection