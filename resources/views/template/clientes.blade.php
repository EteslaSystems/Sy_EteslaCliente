@extends('roles/seller')
@section('content')
@section('agregarClientes')
@show
    <div class="container-fluid">
        @if(@isset($consultarClientes))
            @unless($consultarClientes)
                <h1>No cuenta con clientes registrados!</h1>
            @else
                <table class="table table-sm table-striped table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col" style="text-align:center;">Cliente</th>
                            <th scope="col" style="text-align:center;">Creacion</th>
                            <th scope="col" style="text-align:center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultarClientes as $cliente)
                            <tr>
                                <td>{{ $cliente->vNombrePersona }} {{ $cliente->vPrimerApellido }} {{ $cliente->vSegundoApellido }}</td>
                                <td>{{ $cliente->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnDetails" type="button" class="btn btn-primary btn-sm" title="Detalles" data-toggle="modal" data-target="#modalDetailsClient" onclick="mostrarClienteDetails('{{ $cliente->idCliente }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                                    <g fill="#ffffff"><path d="M136.16667,21.5h-100.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v100.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h71.66667l43,-43v-71.66667c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM136.16667,100.33333h-35.83333v35.83333h-64.5v-100.33333h100.33333z"></path></g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button id="btnEliminar" type="button" class="btn btn-danger btn-sm" title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                                    <g fill="#ffffff"><path d="M75.25,21.5c-6.22962,0 -10.75,4.52038 -10.75,10.75v5.375h-32.25v10.75h5.375v86c0,8.89025 7.23475,16.125 16.125,16.125h52.52173l10.75,-10.75h-63.27173c-2.96162,0 -5.375,-2.408 -5.375,-5.375v-86h75.25v51.98633l10.75,10.75v-62.73633h5.375v-10.75h-32.25v-5.375c0,-6.22962 -4.52038,-10.75 -10.75,-10.75zM75.25,32.25h21.5v5.375h-21.5zM59.125,64.5v59.125h10.75v-59.125zM80.625,64.5v59.125h10.75v-59.125zM102.125,64.5v40.16553l10.75,-10.75v-29.41553zM115.0271,106.9646l-7.5271,7.5271l24.99585,24.98535l-24.99585,24.99585l7.5271,7.5271l24.99585,-24.99585l24.44995,24.46045l7.5271,-7.5271l-24.46045,-24.46045l24.46045,-24.44995l-7.5271,-7.5271l-24.44995,24.46045z"></path></g>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal - Detalles Cliente -->
                <div id="modalDetailsClient" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarTablaPropuestas()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <!-- Cliente - Info - Details  -->
                                <nav>
                                    <div class="form-row">
                                        <div class="col">
                                            <div id="cabezales-nav" class="nav nav-tabs" role="tablist">
                                                <a id="ciente-info-tab" class="nav-item nav-link active"  data-toggle="tab" href="#cliente-info" role="tab" aria-controls="cliente-info" aria-selected="true" onclick="editarClienteDetails(3)">Cliente</a>
                                                <a id="propuestas-info-tab" class="nav-item nav-link" data-toggle="tab" href="#propuestas-info" role="tab" aria-controls="propuestas-info" aria-selected="false">Propuestas</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button id="editClienteDetails" type="button" class="btn btn-xs btn-warning pull-right" title="Editar" onclick="editarClienteDetails(0)">
                                                <img src="https://img.icons8.com/material-rounded/16/000000/edit--v1.png"/>
                                            </button>
                                            <div id="grBttnsDetails" class="btn-group pull-right" role="group" aria-label="Basic example" style="display: none;">
                                                <button id="guardarClienteDetails" type="button" class="btn btn-xs btn-success" title="Guardar cambios" onclick="editarClienteDetails(1)">
                                                    <img src="https://img.icons8.com/ios-glyphs/16/000000/save--v1.png"/>
                                                </button>
                                                <button id="cancelClienteDetails" type="button" class="btn btn-xs btn-danger" title="Cancelar" onclick="editarClienteDetails(2)">
                                                    <img src="https://img.icons8.com/external-becris-lineal-becris/16/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png"/>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div id="cliente-info" class="tab-pane fade show active" role="tabpanel" aria-labelledby="ciente-info-tab">
                                        <div class="row text-center">
                                            <div id="infoCliente" class="col">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Nombre</div>
                                                        </div>
                                                        <input id="inpDetailsClienteNombre" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">1er. Apellido</div>
                                                        </div>
                                                        <input id="inpDetailsCliente1erAp" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">2do. Apellido</div>
                                                        </div>
                                                        <input id="inpDetailsCliente2doAp" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Telefono</div>
                                                        </div>
                                                        <input id="inpDetailsClienteTel" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Celular</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCel" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoDireccion" class="col">
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">C.P.</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCP" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Calle</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCalle" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Municipio</div>
                                                        </div>
                                                        <input id="inpDetailsClienteMunic" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Ciudad</div>
                                                        </div>
                                                        <input id="inpDetailsClienteCiud" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Estado</div>
                                                        </div>
                                                        <input id="inpDetailsClienteEstado" type="text" class="form-control inpDetailsCliente" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="propuestas-info" class="tab-pane fade" role="tabpanel" aria-labelledby="propuestas-tab">
                                        <div class="table-responsive">
                                            <table id="tblPropuestas" class="table table-sm table-bordered table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Creacion</th>
                                                        <th scope="col">Expiracion</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal - Propuestas Data -->
                <div id="modalPropstFromClient" class="modal fade  bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Propuestas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Aqui vienen un listado de las propuestas</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
        @endif
    </div>
@endsection
