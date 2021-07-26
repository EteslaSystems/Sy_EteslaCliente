<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p class="d-block mn-1 p-titulos" id="lblConvEquip">Combinaciones</p>
                                </div>
                                <div class="col">
                                    <div class="custom-control custom-switch text-center pull-right">
                                        <input id="switchConvEquip" type="checkbox" class="custom-control-input" value="0" onclick="cambiarModalidad(this);">
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
                                            <input type="checkbox" class="form-check-input" id="salvarCombinacion" onclick="document.getElementById('btnGenerarEntregable').disabled = false">
                                            <label for="salvarCombinacion">Salvar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Sección combinaciones -->
                            <!-- Seccion "Elegir un equipo" -->
                            <div class="col form-group" id="divElegirEquipo" style="display:none;">
                                <div class="row">
                                    <div class="col">
                                        <label>Panel</label>
                                        <select id="listPaneles" class="form-control" disabled>
                                            <option selected value="-1">Elige una opción:</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="form-row">
                                            <div class="form-group form-check">
                                                <input id="chckModelosInversor" type="checkbox" class="form-check-input" title="modelos inversor" onclick="mostrarListModelosInversores();">
                                                <label class="form-check-label" for="chckModelosInversor">Inversor (marca)</label>
                                            </div>
                                            <select class="form-control" id="listInversores" disabled>
                                                <option selected value="-1">Elige una opción:</option>
                                            </select>
                                        </div>
                                        <div id="divDropDownListInversorModelo" class="form-row" style="display:none;">
                                            <label>Inversor (modelo)</label>
                                            <select id="listModelosInversor" class="form-control">
                                                <option selected value="-1">Elige una opción:</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Estructura</label>
                                        <select id="listEstructura" class="form-control" onchange="cambiarEstructura();" disabled>
                                            <option selected value="-1">Elige una opción:</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container text-right">
                                        <div class="form-group" style="margin-right: -26px;">
                                            <!-- Boton ajuste-propuesta -->
                                            <button id="btnModalAjustePropuesta" class="btn btn-xs" data-toggle="modal" data-target=".bd-modal-ej"><img src="https://img.icons8.com/ios-glyphs/24/000000/administrative-tools.png"/></button>

                                            <!-- Botones GuardaPropuesta_GenerarPDF -->
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <button id="btnGuardarPropuesta" type="button" class="btn btn-secondary" title="guardar propuesta" disabled>GUARDAR</button>
                                                <button id="btnGenerarEntregable" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalGenrPropuestaOptions" title="generar propuesta" disabled>GENERAR</button>
                                            </div>
                                            <!-- Fin Botones GuardaPropuesta_GenerarPDF -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Seccion "Elegir un equipo" -->
                            <!-- Modal Opciones de generar propuesta -->
                            <div id="modalGenrPropuestaOptions" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="deshabilitarBotonesPDF();">
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
                                                <button id="btnGenerarPdfFileViewer" type="button" class="btn" title="pdf file viewer" onclick="generarPDF()"><img src="https://img.icons8.com/color/48/000000/pdf.png"/></button>
                                                <p><strong>Archivo PDF</strong></p>
                                            </div>
                                            <!-- Fin Botones generan entregable -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Modal Opciones de generar propuesta -->
                        </div>
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
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <p class="d-block mn-1 p-titulos"><ins>Resultados</ins></p>
                            </div>
                            <div class="col-8 d-flex justify-content-center">
                                <button id="btnDivCombinaciones" class="btn btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg" style="padding: 4px;" title="comparativa combinaciones" disabled><img src="https://img.icons8.com/ios/24/000000/eye-checked.png"/></button>
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
                                                <label>Propuesta</label>
                                                <input id="inpSliderPropuesta" type="range" min="0" max="200" class="slider" value="0" oninput="rangeValuePropuesta.value=inpSliderPropuesta.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValuePropuesta"></output>%
                                            </div>
                                            <div class="form-group">
                                                <label>Descuento</label>
                                                <input id="inpSliderDescuento" type="range" min="0" max="100" class="slider" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValueDescuento"></output>%
                                            </div>
                                            <div class="form-group">
                                                <label>Aumento</label>
                                                <input id="inpSliderAumento" type="range" min="0" max="100" class="slider" value="0" oninput="rangeValueAumento.value=inpSliderAumento.value">
                                                <output id="rangeValueAumento"></output>%
                                            </div>
                                        </div>
                                        <!-- Fin  del Panel de ajuste de cotizacion -->
                                        <button id="btnModificarPropuesta" class="btn btn-sm btn-warning pull-right" data-dismiss="modal" onclick="modificarPropuesta();" disabled><strong>Modificar</strong></button>
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
                                        <?php for($i=1; $i<=3; $i++): ?>
                                            <div class="col" id="divCombinacion<?php echo e($i); ?>">
                                                <input id="inpTipoCombinacion<?php echo e($i); ?>" class="d-none">
                                                <h5 id="combinacionTitle<?php echo e($i); ?>" class="title-combination" ></h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <img id="imgLogoPanel<?php echo e($i); ?>" height="35" weight="100">
                                                    </div> 
                                                    <div class="col">
                                                        <img id="imgLogoInversor<?php echo e($i); ?>" height="35" weight="100">
                                                    </div>
                                                </div>
                                                <ul id="modalResultPageX<?php echo e($i); ?>" class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Potencia
                                                        <span class="badge badge-primary badge-pill" id="plPotenciaNecesaria<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Cantidad paneles
                                                        <span class="badge badge-primary badge-pill" id="plCantidadPaneles<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Cantidad inversores 
                                                        <span class="badge badge-primary badge-pill" id="plCantidadInversores<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo proyecto s/IVA
                                                        <span class="badge badge-primary badge-pill" id="plCostoProyectoSIVA<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo proyecto c/IVA
                                                        <span class="badge badge-primary badge-pill" id="plCostoProyectoCIVA<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Costo por watt
                                                        <span class="badge badge-primary badge-pill" id="plCostoWatt<?php echo e($i); ?>"></span>
                                                    </li>
                                                </ul>
                                                <ul id="modalResultPageY<?php echo e($i); ?>" class="list-group" style="display:none;">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Modelo panel
                                                        <span class="badge badge-primary badge-pill" id="plModeloPanel<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Modelo inversor
                                                        <span class="badge badge-primary badge-pill" id="plModeloInversor<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Consumo mensual
                                                        <span class="badge badge-primary badge-pill" id="plConsumoMensual<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Generacion mensual
                                                        <span class="badge badge-primary badge-pill" id="plGeneracionMensual<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Nuevo consumo mensual
                                                        <span class="badge badge-primary badge-pill" id="plNuevoConsumoMensual<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        % de generación
                                                        <span class="badge badge-primary badge-pill" id="plPorcentajeGeneracion<?php echo e($i); ?>"></span>
                                                    </li>
                                                </ul>
                                                <ul id="modalResultPageZ<?php echo e($i); ?>" class="list-group" style="display:none;">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Pago promedio(anterior)
                                                        <span class="badge badge-primary badge-pill" id="plPagoPromedioAnterior<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Pago promedio(nuevo)
                                                        <span class="badge badge-primary badge-pill" id="plPagoPromedioNuevo<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Ahorro mensual
                                                        <span class="badge badge-primary badge-pill" id="plAhorroMensual<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Ahorro anual
                                                        <span class="badge badge-primary badge-pill" id="plAhorroAnual<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        ROI Bruto
                                                        <span class="badge badge-primary badge-pill" id="plROIBruto<?php echo e($i); ?>"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        ROI con deducción
                                                        <span class="badge badge-primary badge-pill" id="plROIDeduccion<?php echo e($i); ?>"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php endfor; ?>
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
                                <nav>
                                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                        <a id="cotizacion-tab" class="nav-item nav-link active"  data-toggle="tab" href="#cotizacion" role="tab" aria-controls="cotizacion" aria-selected="true">Cotizacion</a>
                                        <a id="ahorro-tab" class="nav-item nav-link" data-toggle="tab" href="#ahorro" role="tab" aria-controls="ahorro" aria-selected="false">Ahorro</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="cotizacion" role="tabpanel" aria-labelledby="cotizacion-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <table class="table table-sm table-bordered">
                                                                <thead>
                                                                    <th scope="col" colspan="2" class="text-center" style="background-color:black; color:white;">Potencia</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Potencia instalada</strong></td>
                                                                        <td id="tdPanelPotenciaReal" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Costo por watt</strong></td>
                                                                        <td colspan="3" id="tdCostoWatt" class="tdAnsw"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col">
                                                            <!-- Tabla Paneles -->
                                                            <table id="paneles" class="table table-sm table-bordered">
                                                                <thead>
                                                                    <th scope="col" colspan="4" class="text-center" style="background-color:black; color:white;">Panel</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Modelo</strong></td>
                                                                        <td colspan="3" id="tdPanelModelo" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Potencia</strong></td>
                                                                        <td colspan="3" id="tdPanelPotencia" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Cantidad</strong></td>
                                                                        <td id="tdPanelCantidad" class="tdAnsw"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col">
                                                            <table id="inversores" class="table table-sm table-bordered">
                                                                <thead>
                                                                    <th scope="col" colspan="2" class="text-center" style="background-color:black; color:white;">Inversor</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Modelo</strong></td>
                                                                        <td id="tdInversorModelo" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Potencia</strong></td>
                                                                        <td colspan="3" id="tdInversorPotencia" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Cantidad</strong></td>
                                                                        <td id="tdInversorCantidad" class="tdAnsw"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col">
                                                            <!-- Tabla costos totales -->
                                                            <table id="costos" class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="text-center" style="background-color:black; color:white;">Subtotal s/IVA</th>
                                                                        <th class="text-center" style="background-color:black; color:white;">Total + IVA</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#03B1FF; color:white; font-weight: bolder;">USD</td>
                                                                        <td id="tdSubtotalUSD" class="text-center tdAnsw"></td>
                                                                        <td id="tdTotalUSD" class="text-center tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#29D337; color:white; font-weight: bolder;">MXN</td>
                                                                        <td id="tdSubtotalMXN" class="text-center tdAnsw"></td>
                                                                        <td id="tdTotalMXN" class="text-center tdAnsw"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ahorro" role="tabpanel" aria-labelledby="ahorro-tab">
                                        <!-- Ahorro -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-row">
                                                        <select id="ddlGraficoView" class="custom-select custom-select-sm" onchange="pintarGrafico()">
                                                            <option value="-1">Escoge una opcion</option>
                                                            <option value="ahorroEnergetico">Ahorro energetico</option>
                                                            <option value="ahorroEconomico">Ahorro economico</option>
                                                        </select>
                                                        <canvas id="crtGraficos" width="150px" height="100px"></canvas>
                                                        <p style="font-size: 12px;" class="text-center">Los datos mostrados son consumos promediados bimestralmente</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <table id="ahorroKw" class="table table-sm table-bordered" style="margin-top:7px;">
                                                                <thead>
                                                                    <th scope="col" colspan="9" class="text-center" style="background-color:black; color:white;">Tarifas</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Tarifa actual</strong></td>
                                                                        <td id="tdTarifaActual"></td>
                                                                    </tr>
                                                                    <tr id="trTarifaNueva">
                                                                        <td><strong>Tarifa nueva</strong></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col" style="margin-top:6px;">
                                                            <table id="costos" class="table table-sm table-striped table-bordered">
                                                                <tbody> 
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#03B1FF; color:white;"><strong>% generacion</strong></td>
                                                                        <td id="tdPorcentajePropuesta" class="text-center tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#03B1FF; color:white;"><strong>ROI bruto</strong></td>
                                                                        <td id="tdROIbruto" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#03B1FF; color:white;"><strong>ROI con deduccion</strong></td>
                                                                        <td id="tdROIdeduccion"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <table id="ahorroKw" class="table table-sm table-bordered" style="margin-top:6px;">
                                                                <thead>
                                                                    <th scope="col" colspan="9" class="text-center" style="background-color:black; color:white;">Ahorro energetico</th>
                                                                    <tr>
                                                                        <td colspan="2"><strong>Consumo actual</strong></td>
                                                                        <td colspan="2"><strong>Generacion</strong></td>
                                                                        <td colspan="2"><strong>Nuevo consumo</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="tdMes"><strong>Mes(kw)</strong></td>
                                                                        <td id="tdConsumoActualKwMes" class="tdAnsw"></td>
                                                                        <td class="tdMes"><strong>Mes(kw)</strong></td>
                                                                        <td id="tdGeneracionKwMes" class="tdAnsw"></td>
                                                                        <td class="tdMes"><strong>Mes(kw)</strong></td>
                                                                        <td id="tdNuevoConsumoMes" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="tdBim"><strong>Bim(kw)</strong></td>
                                                                        <td id="tdConsumoActualKwBim" class="tdAnsw"></td>
                                                                        <td class="tdBim"><strong>Bim(kw)</strong></td>
                                                                        <td id="tdGeneracionKwBim" class="tdAnsw"></td>
                                                                        <td class="tdBim"><strong>Bim(kw)</strong></td>
                                                                        <td id="tdNuevoConsumoBim" class="tdAnsw"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <table id="ahorroEconomico" class="table table-sm table-bordered" style="margin-top:6px;">
                                                                <thead>
                                                                    <th scope="col" colspan="6" class="text-center" style="background-color:black; color:white;">Ahorro economico</th>
                                                                    <tr>
                                                                        <td colspan="2"><strong>Consumo actual</strong></td>
                                                                        <td colspan="2"><strong>Nuevo consumo</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="tdMes"><strong>Mes($)</strong></td>
                                                                        <td id="tdConsumoActualDinMes" class="tdAnsw"></td>
                                                                        <td class="tdMes"><strong>Mes($)</strong></td>
                                                                        <td id="tdNuevoConsumoDinMes" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="tdBim"><strong>Bim($)</strong></td>
                                                                        <td id="tdConsumoActualDinBim" class="tdAnsw"></td>
                                                                        <td class="tdBim"><strong>Bim($)</strong></td>
                                                                        <td id="tdNuevoConsumoDinBim" class="tdAnsw"></td>
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
        </div>
    </div>

    <style>   
        .inpAnsw{
            border:0; 
            background: transparent !important; 
            border-bottom: 1px solid #888 !important;
            text-align: center;
        }

        .tdMes{
            background-color: #A0E096;
            color: white;
        }
        
        .tdBim{
            background-color: #96DCE0;
            color: white;
        }
    </style>
</body><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/resultados-cotizador.blade.php ENDPATH**/ ?>