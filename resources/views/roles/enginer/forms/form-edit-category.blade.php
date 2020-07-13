@extends('roles/enginer')
	@section('enginerContent')
		<div class="content">
            <div class="card">
                <h6 class="card-header">Editar categoria</h6>

                <div class="card-body">
                	@foreach($categoria as $details)
	                    <form method="POST" action="{{ url('editar-categoria', $details->idCategOtrosMateriales) }}">
						    @csrf
						    @method('PUT')

						    <div class="container">
			                    <div class="row row-cols-3">
			                        <div class="col">
			                            <div class="form-group">
			                                <label for="c_categorianueva">{{ __('Nombre de la categoria:') }}</label>

			                                <small class="note-form darkred">* Campo requerido</small>

			                                <input id="c_categorianueva" type="text" class="form-control @error('c_categorianueva') is-invalid @enderror" name="c_categorianueva" value="{{ $details->vNombreCategoOtrosMats }}" autofocus>

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
					@endforeach
                </div>
            </div>
        </div>
    @endsection