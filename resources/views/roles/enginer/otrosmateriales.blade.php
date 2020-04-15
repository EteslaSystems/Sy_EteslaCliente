@extends('roles/enginer')
@section('enginerContent')
	@include('roles.enginer.forms.form-new-category')

	<hr>

	<div class="content">
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th style="width: 85%;">Categoría del material</th>
                        <th style="width: 15%;" colspan="3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
					@foreach($vCategorias as $details)
                		<tr>
                            <td>{{ $details->vNombreCategoOtrosMats }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info" title="Agregar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/plus-math.png"/>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('editar-categoria', [$details->idCategOtrosMateriales]) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('eliminar-categoria', [$details->idCategOtrosMateriales]) }}" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>

       <div class="row">
        	<div class="col-4">
	        	<form class="form-inline">
	        		<select class="form-control mr-sm-3" id="search">
	        			<option selected disabled>Selecciona una opción:</option>
	        			<option value="0">TODOS</option>

	        			@foreach($vCategorias as $categorias)
	        					<option value="{{ $categorias->idCategOtrosMateriales }}">{{ $categorias->vNombreCategoOtrosMats }}</option>
	        			@endforeach
	        		</select>

	        		<button class="btn btn-outline-success my-3 my-sm-0" type="button" id="search-btn" disabled>Buscar</button>
	        	</form>
	        </div>
        </div>

        <br>

        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-sm text-center">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 45%;">Partida</th>
                        <th style="width: 25%;">Categoría perteneciente</th>
                        <th style="width: 10%;">Unidad</th>
                        <th style="width: 10%;">Precio unitario</th>
                        <th style="width: 10%;" colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody id="table-results">
                	@foreach($vMateriales as $materiales)
                		<tr id="{{ $materiales->idCategOtrosMateriales }}">
                            <td>{{ $materiales->vPartida }}</td>
                            <td>{{ $materiales->vNombreCategoOtrosMats }}</td>
                            <td>{{ $materiales->vUnidad }}</td>
                            <td>
                            	<b>$ {{ $materiales->fPrecioUnitario }}</b>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning" title="Editar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/multi-edit.png">
                                </a>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-danger" title="Eliminar">
                                    <img src="https://img.icons8.com/material-outlined/18/FFFFFF/delete-trash.png">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript">
		// Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
        $("#search").change(function () {
        	$("#search option:selected").each(function () {
        		$("#search-btn").removeAttr("disabled", "disabled");
        	});
        });

        $("#search-btn").click(function () {
        	var searching = $("#search").val();

        	if(searching == 0) {
        		$("#table-results tr").css("display", "");
        	} else {
        		$("#table-results tr").css("display", "none");
        		$("#table-results #" + searching).css("display", "");
        	}
        });
	</script>
@endsection