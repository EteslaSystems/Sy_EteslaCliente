<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p class="d-block mn-1 p-titulos" id="lblConvEquip">Combinaciones</p>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-switch text-center pull-right">
                                        <input type="checkbox" class="custom-control-input" id="switchConvEquip">
                                        <label class="custom-control-label" for="switchConvEquip" id="lblSwitchConvEquip">Elegir equipo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <!-- Sección combinaciones -->
                            <div class="col form-group" id="divConvinaciones">
                                <div class="form-row">
                                    <label>Combinacion</label>
                                    <select class="form-control" id="listConvinaciones" disabled>
                                        <option selected value="-1">Elige una opción:</option>
                                        <option value="optConvinacionOptima">Óptima</option>
                                        <option value="optConvinacionMediana">Mediana</option>
                                        <option value="optConvinacionEconomica">Económica</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-check pull-right" id="checkSalvarCombinacion" style="display:none;">
                                            <input type="checkbox" class="form-check-input" id="salvarCombinacion">
                                            <label for="salvarCombinacion">Salvar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Sección combinaciones -->
                            <!-- Seccion "Elegir un equipo" -->
                            <div class="col form-group" id="divElegirEquipo" style="display:none;">
                                <div class="form-row">
                                    <label>Panel</label>
                                    <select class="form-control" id="listPaneles">
                                        <option selected value="-1">Elige una opción:</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <label>Inversor</label>
                                    <select class="form-control" id="listInversores" disabled>
                                        <option selected value="-1">Elige una opción:</option>
                                    </select>
                                </div>
                                <button id="btnModalAjustePropuesta" class="btn btn-xs pull-right" data-toggle="modal" data-target=".bd-modal-ej" disabled><img src="https://img.icons8.com/ios-glyphs/24/000000/administrative-tools.png"/></button>
                            </div>
                            <!--Fin Seccion "Elegir un equipo" -->
                        </div>
                        <!-- Botones GuardaPropuesta_GenerarPDF -->
                        <div class="btn-group btn-group-sm pull-right" role="group" aria-label="Basic example">
                            <button id="btnGuardarPropuesta" type="button" class="btn btn-secondary" title="guardar propuesta" disabled>GUARDAR</button>
                            <button id="btnGenerarEntregable" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalGenrPropuestaOptions" title="generar propuesta" disabled>GENERAR</button>
                        </div>
                        <!-- Fin Botones GuardaPropuesta_GenerarPDF -->
                        <!-- Modal Opciones de generar propuesta -->
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
                                            <button id="btnGenerarPdfFileViewer" type="button" class="btn" title="pdf file viewer" disabled><img src="https://img.icons8.com/color/48/000000/pdf.png"/></button>
                                            <p><strong>Archivo PDF</strong></p>
                                        </div>
                                        <!-- Fin Botones generan entregable -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal Opciones de generar propuesta -->
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
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <p class="d-block mn-1 p-titulos"><ins>Resultados</ins></p>
                            </div>
                            <div class="col-8 d-flex justify-content-center">
                                <button id="btnDivCombinaciones" class="btn btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg" style="padding: 4px;" title="comparativa combinaciones" disabled><img src="https://img.icons8.com/ios/24/000000/eye-checked.png"/></button>
                            </div>
                            <div class="col-xs">
                                <button id="btnDetails" type="button" class="btn btn-xs pull-rigth" style="padding: 4px;" onclick="buttonDetails(this)" title="detalles de la propuesta"><img src="https://img.icons8.com/material-outlined/24/000000/details.png"/></button>
                            </div>
                        </div>
                        <!-- #ModalsZone -->
                        <!-- Modal_AjustePropuesta -->
                        <div class="modal fade bd-modal-ej" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-center">Ajuste propuesta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Panel de ajuste de cotizacion -->
                                        <div class="slidecontainer">
                                            <div class="form-group">
                                                <label>Propuesta </label>
                                                <input id="inpSliderPropuesta" type="range" min="0" max="200" class="slider" oninput="rangeValuePropuesta.value=inpSliderPropuesta.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValuePropuesta"></output>%
                                            </div>
                                            <div class="form-group">
                                                <label>Descuento </label>
                                                <input id="inpSliderDescuento" type="range" min="0" max="100" class="slider" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValueDescuento"></output>%
                                            </div>
                                        </div>
                                        <!-- Fin  del Panel de ajuste de cotizacion -->
                                        <button id="btnModificarPropuesta" class="btn btn-sm btn-warning pull-right" onclick="modificarPropuesta();" data-dismiss="modal" disabled><strong>Modificar</strong></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #End - Modal_combinaciones -->
                        <!-- Modal_combinaciones -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header row">
                                        <div class="col">
                                            <button id="btnDetailsModal" class="btn btn-xs details-propuesta-modal" onclick="buttonDetails(this)" title="Detalles propuesta"><img src="https://img.icons8.com/material-outlined/24/000000/details.png"/></button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal-body row">
                                        @for($i=1; $i<=3; $i++)
                                            <div class="col" id="divCombinacion{{ $i }}">
                                                <input id="inpTipoCombinacion{{ $i }}" class="d-none">
                                                <h5 id="combinacionTitle{{ $i }}" class="title-combination" ></h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <img id="imgLogoPanel{{ $i }}" height="35" weight="100">
                                                        <img id="imgPanel{{ $i }}" height="100" weight="80">
                                                    </div> 
                                                    <div class="col">
                                                        <img id="imgLogoInversor{{ $i }}" height="35" weight="100">
                                                        <img id="imgInversor{{ $i }}" height="100" weight="80">
                                                    </div>
                                                </div>
                                                <ul id="modalResultPageX{{$i}}" class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Potencia
                                                        <span class="badge badge-primary badge-pill" id="plPotenciaNecesaria{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Cantidad paneles
                                                        <span class="badge badge-primary badge-pill" id="plCantidadPaneles{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Cantidad inversores 
                                                        <span class="badge badge-primary badge-pill" id="plCantidadInversores{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo proyecto s/IVA
                                                        <span class="badge badge-primary badge-pill" id="plCostoProyectoSIVA{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo proyecto c/IVA
                                                        <span class="badge badge-primary badge-pill" id="plCostoProyectoCIVA{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo por watt
                                                        <span class="badge badge-primary badge-pill" id="plCostoWatt{{ $i }}"></span>
                                                    </li>
                                                </ul>
                                                <ul id="modalResultPageY{{$i}}" class="list-group" style="display:none;">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Modelo panel
                                                        <span class="badge badge-primary badge-pill" id="plModeloPanel{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Modelo inversor
                                                        <span class="badge badge-primary badge-pill" id="plModeloInversor{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Consumo mensual
                                                        <span class="badge badge-primary badge-pill" id="plConsumoMensual{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Generacion mensual
                                                        <span class="badge badge-primary badge-pill" id="plGeneracionMensual{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Nuevo consumo mensual
                                                        <span class="badge badge-primary badge-pill" id="plNuevoConsumoMensual{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        % de generación
                                                        <span class="badge badge-primary badge-pill" id="plPorcentajeGeneracion{{ $i }}"></span>
                                                    </li>
                                                </ul>
                                                <ul id="modalResultPageZ{{$i}}" class="list-group" style="display:none;">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Pago promedio(anterior)
                                                        <span class="badge badge-primary badge-pill" id="plPagoPromedioAnterior{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Pago promedio(nuevo)
                                                        <span class="badge badge-primary badge-pill" id="plPagoPromedioNuevo{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Ahorro mensual
                                                        <span class="badge badge-primary badge-pill" id="plAhorroMensual{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Ahorro anual
                                                        <span class="badge badge-primary badge-pill" id="plAhorroAnual{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        ROI Bruto
                                                        <span class="badge badge-primary badge-pill" id="plROIBruto{{ $i }}"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        ROI con deducción
                                                        <span class="badge badge-primary badge-pill" id="plROIDeduccion{{ $i }}"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End-Modal_Combinaciones -->
                        <!-- #End - ModalsZone -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="cotizacion-tab" data-toggle="tab" href="#cotizacioncotizacion" role="tab" aria-controls="cotizacion-tab" aria-selected="true">Cotizacion</a>
                                    </li>
                                    <li class="nav-item" style="display:none;" id="navPower">
                                        <a class="nav-link" id="power-tab" data-toggle="tab" href="#power" role="tab" aria-controls="power-tab" aria-selected="false"s>Power</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="cotizacioncotizacion" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="container">
                                            <form class="form-inline">
                                                <!--oculto-->
                                                <input id="inpMarcaPanelS" class="form-control inpAnsw" style="display:none;">
                                                <input id="inpMarcaInversorS" class="form-control inpAnsw" style="display:none;">
                                                <!--fin_oculto-->
                                                <!-- Page1 -->
                                                <div id="pageResult1" class="row">
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="inpPotencia" class="col-sm-4 col-form-label">Potencia</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpPotencia">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inpCantidadPaneles" class="col-sm-4 col-form-label">Cantidad paneles</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCantidadPaneles">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpCantidadInvers" class="col-sm-4 col-form-label">Cantidad inversores</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCantidadInvers">
                                                            </div>
                                                        </div>  
                                                        <div class="form-group row">
                                                            <label for="inpCostPorWatt" class="col-sm-4 col-form-label">Costo por watt</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCostPorWatt">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="inpCostProyectoSIVA" class="col-lg-4 col-form-label">Costo proyecto s/IVA</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCostProyectoSIVA">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inpCostProyectoCIVA" class="col-sm-4 col-form-label">Costo proyecto c/IVA</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCostProyectoCIVA">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpCostProyectoMXN" class="col-sm-4 col-form-label">Costo proyecto MXN</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpCostProyectoMXN">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End_Page1 -->
                                                <!-- Page2 -->
                                                <div id="pageResult2" class="row" style="display:none;">
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="inpModeloPanel" class="col-sm-4 col-form-label">Modelo panel</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpModeloPanel">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inpModeloInversor" class="col-sm-4 col-form-label">Modelo inversor</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpModeloInversor">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpConsumoMensual" class="col-sm-4 col-form-label">Consumo mensual</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpConsumoMensual">
                                                            </div>
                                                        </div>     
                                                    </div>
                                                    <div class="col">
                                                    <div class="form-group row">
                                                            <label for="inpGeneracionMensual" class="col-sm-4 col-form-label">Generación mensual</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpGeneracionMensual">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpNuevoConsumoMensual" class="col-sm-4 col-form-label">Nuevo consumo mensual</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpNuevoConsumoMensual">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpPorcentGeneracion" class="col-sm-4 col-form-label">% de generación</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpPorcentGeneracion">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- End_Page2 -->
                                                <!-- Page3 -->
                                                <div id="pageResult3" class="row" style="display:none;">
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="inpPagoAnteriorProm" class="col-sm-4 col-form-label">Pago anterior(promedio)</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpPagoAnteriorProm">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inpPagoNuevoProm" class="col-sm-4 col-form-label">Pago nuevo(promedio)</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpPagoNuevoProm">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inpAhorroMensual" class="col-sm-4 col-form-label">Ahorro mensual</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpAhorroMensual">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="inpAhorroAnual" class="col-sm-4 col-form-label">Ahorro anual</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpAhorroAnual">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpROIBruto" class="col-sm-4 col-form-label">ROI bruto</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpROIBruto">
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="inpROIDeduccion" class="col-sm-4 col-form-label">ROI con deducción</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" readonly class="form-control-plaintext inpAnsw" id="inpROIDeduccion">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <!-- End_Page3 -->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="power" role="tabpanel" aria-labelledby="profile-tab" style="display:none;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col table-responsive-sm">
                                                    <table class="table table-bordered" >
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th style="text-align:center;">Produccion anual kWh</th>
                                                                <th style="text-align:center;">Produccion anual mWh</th>
                                                                <th style="text-align:center;">Total sin solar</th>
                                                                <th style="text-align:center;">Total con solar</th>
                                                                <th style="text-align:center;">Ahorro</th>
                                                                <th style="text-align:center;">Ahorro %</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td id="tdProduccionAnualKwh"></td>
                                                                <td id="tdProduccionAnualMwh"></td>
                                                                <td id="tdTotalSinSolar"></td>
                                                                <td id="tdTotalConSolar"></td>
                                                                <td id="tdAhorro"></td>
                                                                <td id="tdAhorroPorcentaje"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="overflow-x: auto">
                                                <div>
                                                    <table class="table table-responsive-md table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center;">
                                                                    <select class="form-control" id="listPagosTotales">
                                                                        <option value="-1" title="Elige una opcion" active>Elegir</option>
                                                                        <option value="optSinSolar">Sin solar</option>
                                                                        <option value="optConSolar">Con solar</option>
                                                                    </select>
                                                                </th>
                                                                <th>Enero</th>
                                                                <th>Febrero</th>
                                                                <th>Marzo</th>
                                                                <th>Abril</th>
                                                                <th>Mayo</th>
                                                                <th>Junio</th>
                                                                <th>Julio</th>
                                                                <th>Agosto</th>
                                                                <th>Septiembre</th>
                                                                <th>Octubre</th>
                                                                <th>Noviembre</th>
                                                                <th>Diciembre</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Transmision</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpTransmision{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Energia</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpEnergia{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Capacidad</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpCapacidad{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Distribucion</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpDistribucion{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">IVA</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpIVA{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Total</th>
                                                                @for($i=0; $i<12; $i++)
                                                                    <td id="inpTotal{{ $i }}"></td>
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
        </div>
    </div>

    <div class="card" style="display:none;">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Consumo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Consumo anual</b>
                                </td>
                                <td id="consumoAnual"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia necesaria</b>
                                </td>
                                <td id="potenciaNecesaria"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Promedio consumo</b>
                                </td>
                                <td id="promedioConsumo"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Esctructuras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Estructuras (cost)</b>
                                </td>
                                <td id="costoEstructuras"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Paneles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Número de modulos</b>
                                </td>
                                <td id="numeroModulos"></td>
                            </tr>
                            <tr>    
                                <td>
                                    <b>Potencia del modulo</b>
                                </td>
                                <td id="potenciaModulo"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia real</b>
                                </td>
                                <td id="potenciaReal"></td>
                            </tr>
                            <!--tr>
                                <td>
                                    <b>Precio modulo</b>
                                </td>
                                <td id="precioModulo"></td>
                            </tr-->
                            <tr>
                                <td>
                                    <b>Costo Watt</b>
                                </td>
                                <td id="costoPorWatt"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Costo total modulos</b>
                                </td>
                                <td id="costoTotalModulos"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Inversores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Cantidad</b>
                                </td>
                                <td id="cantidadInversores"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia</b>
                                </td>
                                <td id="potenciaInversor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia maxima</b>
                                </td>
                                <td id="potenciaMaximaInv"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia nominal</b>
                                </td>
                                <td id="potenciaNominalInv"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potencia pico</b>
                                </td>
                                <td id="potenciaPicoInv"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Porcentaje sobre dimensionamiento</b>
                                </td>
                                <td id="porcentajeSobreDim"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio unitario</b>
                                </td>
                                <td id="precioInv"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Costo total inversores</b>
                                </td>
                                <td id="costoTotalInversores"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Cuadrillas (personal)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Numero de cuadrillas</b>
                                </td>
                                <td id="noCuadrillas"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Numero de personas requeridas</b>
                                </td>
                                <td id="noPersonasReq"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Numero de dias</b>
                                </td>
                                <td id="noDias"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Numero de dias reales</b>
                                </td>
                                <td id="noDiasReales"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Viaticos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Pago pasaje</b>
                                </td>
                                <td id="pagoPasaje"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Pago total pasajes</b>
                                </td>
                                <td id="pagoTotalPasajes"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Pago total comida</b>
                                </td>
                                <td id="pagoTotalComida"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Pago total hospedaje</b>
                                </td>
                                <td id="pagoTotalHosp"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4" id="divTotalesProject">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" colspan="2">Totales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <b>Mano de obra</b>
                                </td>
                                <td id="manoObra"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total de otros</b>
                                </td>
                                <td id="totalOtros"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total fletes</b>
                                </td>
                                <td id="totalFletes"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total de paneles, inversores y estructuras</b>
                                </td>
                                <td id="costTPIE"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Subtotal de otros, flete, mano de obra, paneles,</br>inversores, estrucutras</b>
                                </td>
                                <td id="subtOFMPIE"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Margen</b>
                                </td>
                                <td id="margen"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total de todo</b>
                                </td>
                                <td id="totalTodo"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio</b>
                                </td>
                                <td id="precioDollars"></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Precio mas IVA</b>
                                </td>
                                <td id="precioDollarsMasIVA"></td>
                            </tr>
                            <!--tr>
                                <td>
                                    <b>Costo por Watt</b>
                                </td>
                                <td id="costWatt"></td>
                            </tr-->
                            <tr>
                                <td>
                                    <b>Total Viaticos - MediaTension</b>
                                </td>
                                <td id="totalViaticsMT"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>   
        .inpAnsw{
            border:0; 
            background: transparent !important; 
            border-bottom: 1px solid #888 !important;
            text-align: center;
        }
    </style>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('js/cotizador/mediaTension/GDMTH.js') }}"></script>
<script src="{{ asset('js/cotizador/bajaTension.js') }}"></script>

@section('scripts')
<script type="text/javascript">
    const
        range1 = document.getElementById('range-1'),
        rangeV1 = document.getElementById('rangeV-1'),
        setValue1 = ()=>{
            const
                newValue1 = Number( (range1.value - range1.min) * 100 / (range1.max - range1.min) ),
                newPosition1 = 10 - (newValue1 * 0.2);
            rangeV1.innerHTML = `<span><b>Propuesta:</b> ${range1.value}</span>`;
            rangeV1.style.left = `calc(${newValue1}% + (${newPosition1}px))`;
        };
    document.addEventListener("DOMContentLoaded", setValue1);
    range1.addEventListener('input', setValue1);
</script>

<script type="text/javascript">
    const
        range2 = document.getElementById('range-2'),
        rangeV2 = document.getElementById('rangeV-2'),
        setValue2 = ()=>{
            const
                newValue2 = Number( (range2.value - range2.min) * 100 / (range2.max - range2.min) ),
                newPosition2 = 10 - (newValue2 * 0.2);
            rangeV2.innerHTML = `<span><b>Potencia:</b> ${range2.value}</span>`;
            rangeV2.style.left = `calc(${newValue2}% + (${newPosition2}px))`;
        };
    document.addEventListener("DOMContentLoaded", setValue2);
    range2.addEventListener('input', setValue2);
</script>

<script type="text/javascript">
    const
        range3 = document.getElementById('range-3'),
        rangeV3 = document.getElementById('rangeV-3'),
        setValue3 = ()=>{
            const
                newValue3 = Number( (range3.value - range3.min) * 100 / (range3.max - range3.min) ),
                newPosition3 = 10 - (newValue3 * 0.2);
            rangeV3.innerHTML = `<span><b>Descuento:</b> ${range3.value}</span>`;
            rangeV3.style.left = `calc(${newValue3}% + (${newPosition3}px))`;
        };
    document.addEventListener("DOMContentLoaded", setValue3);
    range3.addEventListener('input', setValue3);
</script>
@endsection