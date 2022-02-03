@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <style>
        .cabezales-info-propuesta{
            background-color: #F9B100;
            color:#FFFF;
        }
    </style>

    <div class="card">
        <div class="card-header text-center" style="height:35px;">
            <p class="font-weight-bold">Datos cliente</p>
        </div>
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

    <br>

    <div class="card">
        <div class="card-header text-center" style="height:35px;">
            <p class="font-weight-bold">Propuestas</p>
        </div>
        <div class="card-body">
            @unless($_propuestas)
                <small>
                    <strong>Sin propuestas.</strong>
                </small>
            @else
                <div class="table-responsive my-custom-scrollbar table-wrapper-scroll-y" style="min-height:45vh;">
                    <table id="tblPropuestas" class="table table-sm table-bordered table-striped">
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
                <div class="modal-header">
                    <h5 id="tlTipoCotizacion" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead class="cabezales-info-propuesta">
                                    <th class="text-center">Equipos</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Panel
                                        </td>
                                        <td id="tdModeloPanel">2</td>
                                        <td class="font-weight-bold">
                                            Cantidad
                                        </td>
                                        <td id="tdCantidadInversor">4</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Inversor
                                        </td>
                                        <td id="tdModeloInversor">2</td>
                                        <td class="font-weight-bold">
                                            Cantidad
                                        </td>
                                        <td id="tdCantidadInversor">4</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Estructura
                                        </td>
                                        <td id="tdModeloEstructura">2</td>
                                        <td class="font-weight-bold">
                                            Cantidad
                                        </td>
                                        <td id="tdCantidadEstructura">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead class="cabezales-info-propuesta">
                                    <th class="text-center">Energia</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Vieja tarifa
                                        </td>
                                        <td id="tdViejaTarifa">DAC</td>
                                        <td class="font-weight-bold">
                                            Nueva tarifa
                                        </td>
                                        <td id="tdNuevaTarifa">1c</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Consumo anterior (mes)
                                        </td>
                                        <td id="tdConsumoAnteriorMes">2</td>
                                        <td class="font-weight-bold">
                                            Consumo nuevo (mes)
                                        </td>
                                        <td id="tdConsumoNuevoMes">4</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Consumo anterior (bim)
                                        </td>
                                        <td id="tdConsumoAnteriorBim">2</td>
                                        <td class="font-weight-bold">
                                            Consumo nuevo (bim)
                                        </td>
                                        <td id="tdConsumoNuevoBim">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead class="cabezales-info-propuesta">
                                    <th class="text-center">Totales</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">
                                            % propuesta
                                        </td>
                                        <td id="tdViejaTarifa">DAC</td>
                                        <td class="font-weight-bold">
                                            % descuento
                                        </td>
                                        <td id="tdNuevaTarifa">1c</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Total s/IVA (USD)
                                        </td>
                                        <td id="tdConsumoAnteriorMes">2</td>
                                        <td class="font-weight-bold">
                                            Total c/IVA (USD)
                                        </td>
                                        <td id="tdConsumoNuevoMes">4</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Total s/IVA (MXN)
                                        </td>
                                        <td id="tdConsumoAnteriorBim">2</td>
                                        <td class="font-weight-bold">
                                            Total c/IVA (MXN)
                                        </td>
                                        <td id="tdConsumoNuevoBim">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection