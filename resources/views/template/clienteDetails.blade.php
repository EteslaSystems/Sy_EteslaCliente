@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-auto">
                        <label for="inpNombreCliente">Nombre</label>
                        <input id="inpNombreCliente" class="form-control" type="text" name="nombre" value="{{ $ClienteInfo->vNombrePersona }}" disabled/>
                    </div>
                    <div class="form-group col-md-auto">
                        <label for="inpPApellidoCliente">1er. apellido</label>
                        <input id="inpPApellidoCliente" class="form-control" type="text" name="primerApellido" value="{{ $ClienteInfo->vPrimerApellido }}" disabled/>
                    </div>
                    <div class="form-group col-md-auto">
                        <label for="inpSApellidoCliente">2do. apellido</label>
                        <input id="inpSApellidoCliente" class="form-control" type="text" value="{{ $ClienteInfo->vSegundoApellido }}" disabled/>
                    </div>
                    <div class="form-group col-md-auto">
                        <label for="inpEmailCliente">Email</label>
                        <input id="inpEmailCliente" class="form-control" type="email" name="segundoApellido" value="{{ $ClienteInfo->vEmail }}" disabled/>
                    </div>
                    <div class="form-group col-sm">
                        <label for="inpTelefonoCliente">Telefono</label>
                        <input id="inpTelefonoCliente" class="form-control" type="number" value="{{ $ClienteInfo->vTelefono }}" disabled/>
                    </div>
                    <div class="form-group col-sm">
                        <label for="inpCelularCliente">Celular</label>
                        <input id="inpCelularCliente" class="form-control" type="number" value="{{ $ClienteInfo->vCelular }}" disabled/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-1">
                        <label for="inpCPCliente">C. P.</label>
                        <input id="inpCPCliente" class="form-control" type="number" value="{{ $ClienteInfo->cCodigoPostal }}" disabled/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inpCalleCliente">Calle</label>
                        <input id="inpCalleCliente" class="form-control" type="text" value="{{ $ClienteInfo->vCalle }}" disabled/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inpMunicipioCliente">Municipio</label>
                        <input id="inpMunicipioCliente" class="form-control" type="text" value="{{ $ClienteInfo->vMunicipio }}" disabled/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inpCiudadCliente">Ciudad</label>
                        <input id="inpCiudadCliente" class="form-control" type="text" value="{{ $ClienteInfo->vCiudad }}" disabled/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inpEstadoCliente">Estado</label>
                        <input id="inpEstadoCliente" class="form-control" type="text" value="{{ $ClienteInfo->vEstado }}" disabled/>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-warning pull-right" title="Editar">
                            <img src="{{ asset('img/icon/editar-icon.png') }}" height="19px"/>
                        </button>
                    </div>
                </div>
            </form>    
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @unless($_propuestas)
                <small>
                    <strong>Sin propuestas.</strong>
                </small>
            @else
                <div class="table-responsive my-custom-scrollbar table-wrapper-scroll-y" style="min-height:45vh;">
                    <table id="tblPropuestas" class="table table-sm table-bordered table-striped text-center">
                        <thead class="static-thead">
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Creacion</th>
                                <th scope="col">Expiracion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_propuestas as $Propuesta)
                                <tr>
                                    <td id="tdTipoPropuesta" title="Tipo de propuesta">
                                        <p>
                                            {{ $Propuesta->cTipoCotizacion }}
                                        </p>
                                    </td>
                                    <td id="tdFechaCreacion" title="Fecha de creacion">
                                        <p>
                                            {{ date('d-M-y', strtotime($Propuesta->created_at)) }}
                                        </p>
                                    </td>
                                    <td id="tdFechaExpiracion" title="Fecha de expiracion">
                                        <p>
                                            {{ date('d-M-y', strtotime($Propuesta->expired_at)) }}
                                        </p>
                                    </td>
                                    <td id="tdAcciones">
                                        <div class="btn-group" role="group">
                                            <a id="btnDetails" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-propuesta-details" title="Detalles">
                                                <img src="{{ asset('img/icon/details.png') }}" height="19px">
                                            </a>
                                            <a id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar">
                                                <img src="{{ asset('img/icon/papelera-icon.png') }}" height="19px"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endunless
        </div>            
    </div>

    <!-- Modal - PropuestaDetails -->
    <div class="modal fade modal-propuesta-details" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="nav nav-tabs" role="tablist">
                    <a class="nav-item nav-link active" href="#tab-propuesta-info" data-toggle="tab" role="tabpanel" aria-selected="true">
                        Propuesta
                    </a>
                    <a class="nav-item nav-link" href="#tab-propuesta-agregados" data-toggle="tab" role="tabpanel" aria-selected="false">
                        Agregados
                    </a>
                </div>
                <div class="tab-content">
                    <div id="tab-propuesta-info" class="tab-pane fade show active" role="tabpanel">
                        Propuesta info
                    </div>
                    <div id="tab-propuesta-agregados" class="tab-pane fade" role="tabpanel">
                        Agregados
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection