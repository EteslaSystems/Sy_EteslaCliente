@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
<div class="row">
    <div class="col-6 col-md-4">
        <div class="card shadow mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <p class="d-block mn-1 p-titulos">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                            Cotización individual 
                        </p>
                    </div>
                    <div class="col-md-4">
                        <button id="btnModalConfig" class="btn pull-right" data-toggle="modal" data-target=".bd-example-modal-xs"><img src="https://img.icons8.com/material/16/000000/gearbox-selector.png"/></button>
                        <div class="modal fade bd-example-modal-xs" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xs" role="document">
                                <div class="modal-content">
                                    <div class="modal-body container-mt3 justify-content-center align-items-center">
                                        <div class="d-inline-flex p-3">
                                            <div class="p-2">
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="chbEstructuras"><span class="badge badge-warning">Estructuras</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <input id="inpCantidadEstruct" type="number" class="form-control" placeholder="Cantidad de estructuras" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="d-inline-flex p-3">
                                            <div class="p-2">
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="chbInstalacion" checked><span class="badge badge-warning">Instalacion</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="chbMonitoreo"><span class="badge badge-warning">Monitoreo</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <div class="form-row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="mn-1">Seleccionar Panel:</label>
                                    <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                        <option selected value="-1">Elige una opción:</option>
                                            @foreach($vPaneles as $details)
                                                <option value="{{ $details->idPanel }}">{{ $details->vNombreMaterialFot }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mn-1">Cantidad paneles:</label>
                                    <input class="form-control input-sm" type="number" id="inpCantPaneles" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="mn-1">Seleccionar Inversor:</label>
                                    <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                        <option selected value="-1">Elige una opción:</option>
                                            @foreach($vInversores as $details)
                                                <option value="{{ $details->idInversor }}" >{{ $details->vNombreMaterialFot }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mn-1">Cantidad inversores:</label>
                                    <input class="form-control input-sm" type="number" id="inpCantInversores" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <!-- <div class="col">
                        <div class="menu-content shadow" id="menuContent">
                            <div class="form-group row justify-content-center align-items-center">
                            <label for="inpCantidadEstructuras" class="col-xs-3 col-form-label mr-2">No. de estructuras</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="number" id="inpCantidadEstructuras">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center align-items-center">
                                <label class="col-xs-3 col-form-label mr-2"><strong>Cobrar instalacion</strong></label>
                                <div class="col-xs-9">
                                    <div class="checkbox">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="chbEstructuras" disabled>Estructuras
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inpCantidadEstructuras" class="col-xs-3 col-form-label mr-2">No. de estructuras</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" id="inpCantidadEstructuras">
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>Agregar</strong></label>
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="chbEstructuras" disabled>Estructuras
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col">
                        <button onclick="sendSingleQuotation()" class="btn btn-green text-uppercase shadow pull-right" id="btnCalcularIndividual">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header">
                <p class="d-block mn-1 p-titulos"><ins>Resultados</ins></p>
                <div class="col-md-6 col-sm-6 fx-1"> 
                    <div class="btn-group">
                        <button id="btnGuardarPIndiv" type="button" class="btn btn-primary btn-sm btn-green" onclick="btnsGenerarEntregablePropuesta(this);" disabled>Guardar</button>
                        <button id="btnGenerarPIndiv" type="button" class="btn btn-primary btn-sm btn-green"data-toggle="modal" data-target="#modalGenrPropuestaOptions" title="generar propuesta" onclick="generarEntregable()" disabled>Generar</button>
                    </div>
                    <!-- Modal 'Generar propuesta(PDF)' -->
                    <div id="modalGenrPropuestaOptions" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row text-center">
                                        <!-- Botones generan entregable -->
                                        <div class="col">
                                            <button id="btnGenerarQrCode" type="button" class="btn" data-toggle="modal" data-target="#modalQRCode" title="qr code generate" disabled><img src="https://img.icons8.com/cotton/48/000000/qr-code--v2.png"/></button>
                                            <p><strong>Codigo QR</strong></p>
                                        </div>
                                        <div class="col">
                                            <button id="btnGenerarPdfFileViewer" type="button" class="btn" title="pdf file viewer" onclick="generarEntregable();" disabled><img src="https://img.icons8.com/color/48/000000/pdf.png"/></button>
                                            <p><strong>Archivo PDF</strong></p>
                                        </div>
                                        <!-- Fin Botones generan entregable -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Fin Modal 'Generar propuesta(PDF)' -->
                    <!-- Modal Codigo Qr - Generado -->
                    <div id="modalQRCode" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body row text-center">
                                    <div id="divQrCodeViewer" class="col">
                                        <!-- Aqui se visualiza el codigo QR -->
                                    </div>
                                    <div id="divLeyendaIndicacionesCodigoQr" class="col">
                                        <p>Para poder descargar el archivo PDF de tu propuesta, deberas leer el iguiente <strong>Código QR</strong>, con un escaner/lector. Este lo puedes encontrar integrado en la camara de tu smarthphone o en dado caso de no contar con uno, descargarlo de la galeria de aplicaciones de tu convenencia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal Codigo Qr - Generado -->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="inpCostTotalPaneles">Costo total Paneles <small title="Cantidad de paneles" id="txtCantidadPanelesInd"></small></label>
                            <input id="inpCostTotalPaneles" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="">Costo total Inversores <small title="Cantidad de inversores" id="txtCantidadInversoresInd"></small></label>
                            <input id="inpCostTotalInversores" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpCostTotalEstructuras">Costo total Estructuras <small title="Cantidad de estructuras" id="txtCantidadEstructurasInd"></small></label>
                            <input id="inpCostTotalEstructuras" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpCostoTotalViaticos">Costo total Viaticos</label>
                            <input id="inpCostoTotalViaticos" class="form-control inpAnsw" readOnly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inpPrecio">Precio</label>
                            <input id="inpPrecio" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="inpPrecioIVA">Precio del proyecto + IVA</label>
                            <input id="inpPrecioIVA" class="form-control inpAnsw" readOnly>
                        </div>
                        <div class="form-group">
                            <label for="precioMXN">Precio del proyecto MXN</label>
                            <input id="precioMXN" class="form-control inpAnsw" readOnly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="loader" style="display:none;">
    <div class="row justify-content-center align-items-center minh-100">
        <img src="img/loader.svg">
    </div>
</div>  

<style>   
    .inpAnsw{
        border:0; 
        background: transparent !important; 
        border-bottom: 1px solid #888 !important;
    }
</style>
@endsection