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
                                <div class="form-row">
                                    <label>Panel</label>
                                    <select id="listPaneles" class="form-control" disabled>
                                        <option selected value="-1">Elige una opción:</option>
                                    </select>
                                </div>
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
                                <div class="form-row">
                                    <label>Estructura</label>
                                    <select id="listEstructura" class="form-control" onchange="cambiarEstructura();" disabled>
                                        <option selected value="-1">Elige una opción:</option>
                                    </select>
                                </div>
                                <button id="btnModalAjustePropuesta" class="btn btn-xs pull-right" data-toggle="modal" data-target=".bd-modal-ej"><img src="https://img.icons8.com/ios-glyphs/24/000000/administrative-tools.png"/></button>
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
                                        @for($i=1; $i<=3; $i++)
                                            <div class="col" id="divCombinacion{{ $i }}">
                                                <input id="inpTipoCombinacion{{ $i }}" class="d-none">
                                                <h5 id="combinacionTitle{{ $i }}" class="title-combination" ></h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <img id="imgLogoPanel{{ $i }}" height="35" weight="100">
                                                    </div> 
                                                    <div class="col">
                                                        <img id="imgLogoInversor{{ $i }}" height="35" weight="100">
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
                                <nav>
                                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                        <a id="cotizacion-tab" class="nav-item nav-link active"  data-toggle="tab" href="#cotizacion" role="tab" aria-controls="cotizacion" aria-selected="true">Cotizacion</a>
                                        <a id="ahorro-tab" class="nav-item nav-link" data-toggle="tab" href="#ahorro" role="tab" aria-controls="ahorro" aria-selected="false">Ahorro</a>
                                        <a id="roi-tab" class="nav-item nav-link" data-toggle="tab" href="#roi" role="tab" aria-controls="roi" aria-selected="false">ROI</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="cotizacion" role="tabpanel" aria-labelledby="cotizacion-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="col">
                                                                <!-- Tabla Paneles -->
                                                                <table id="paneles" class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <th scope="col" colspan="4" class="text-center" style="background-color:black; color:white;">Panel</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Equipo</strong></td>
                                                                            <td colspan="3" id="tdPanelEquipo"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Modelo</strong></td>
                                                                            <td colspan="3" id="tdPanelModelo"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Potencia</strong></td>
                                                                            <td colspan="3" id="tdPanelPotencia"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Cantidad</strong></td>
                                                                            <td id="tdPanelCantidad"></td>
                                                                            <tr>
                                                                                <td><strong>Potencia instalada</strong></td>
                                                                                <td id="tdPanelPotenciaReal"></td>
                                                                            </tr>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Costo por watt</strong></td>
                                                                            <td id="tdCostoWatt"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <table id="inversores" class="table table-sm table-bordered">
                                                                <thead>
                                                                    <th scope="col" colspan="2" class="text-center" style="background-color:black; color:white;">Inversor</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Equipo</strong></td>
                                                                        <td id="tdInversorEquipo"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Modelo</strong></td>
                                                                        <td id="tdInversorModelo"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Potencia</strong></td>
                                                                        <td colspan="3" id="tdInversorPotencia"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Cantidad</strong></td>
                                                                        <td id="tdInversorCantidad"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center" style="margin-top: -10px;">
                                                        <div class="col-6">
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
                                                                        <td class="text-center" style="background-color:#03B1FF; color:white;">USD</td>
                                                                        <td id="tdSubtotalUSD" class="text-center"></td>
                                                                        <td id="tdTotalUSD" class="text-center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="background-color:#29D337; color:white;">MXN</td>
                                                                        <td id="tdSubtotalMXN" class="text-center"></td>
                                                                        <td id="tdTotalMXN" class="text-center"></td>
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
                                                <div class="col">
                                                    <select id="graficosDisponibles">
                                                        <option value="-1" selected>Escoger grafico</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <img width="150px" height="150px" src="https://drive.google.com/thumbnail?id=1gl4DLSKQjFybMMJ4--2n1elNqeSrnKC4" />
                                                    <!-- canvas id="graficos" width="150px" height="150px"></canvas-->
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
                                                                <td colspan="2"><strong>% generacion</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Mes(kw)</strong></td>
                                                                <td><strong>Bim(kw)</strong></td>
                                                                <td><strong>Mes(kw)</strong></td>
                                                                <td><strong>Bim(kw)</strong></td>
                                                                <td><strong>Mes(kw)</strong></td>
                                                                <td><strong>Bim(kw)</strong></td>
                                                                <td id="tdPorcentajePropuesta"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="tdConsumoActualKwMes"></td>
                                                                <td id="tdConsumoActualKwBim"></td>
                                                                <td id="tdGeneracionKwMes"></td>
                                                                <td id="tdGeneracionKwBim"></td>
                                                                <td id="tdNuevoConsumoMes"></td>
                                                                <td id="tdNuevoConsumoBim"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="tdConsumoActualDinMes"></td>
                                                                <td id="tdConsumoActualDinBim"></td>
                                                                <td id="tdGeneracionDinMes"></td>
                                                                <td id="tdGeneracionDinBim"></td>
                                                                <td id="tdNuevoConsumoDinMes"></td>
                                                                <td id="tdNuevoConsumoDinBim"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col">
                                                    <table id="ahorroEconomico" class="table table-sm table-bordered" style="margin-top:6px;">
                                                        <thead>
                                                            <th scope="col" colspan="6" class="text-center" style="background-color:black; color:white;">Ahorro economico</th>
                                                            <tr>
                                                                <td colspan="2"><strong>Consumo actual</strong></td>
                                                                <td colspan="2"><strong>Generacion</strong></td>
                                                                <td colspan="2"><strong>Nuevo consumo</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Mes($)</strong></td>
                                                                <td><strong>Bim($)</strong></td>
                                                                <td><strong>Mes($)</strong></td>
                                                                <td><strong>Bim($)</strong></td>
                                                                <td><strong>Mes($)</strong></td>
                                                                <td><strong>Bim($)</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                            </tr>
                                                            <tr>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                                <td>x</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="roi" role="tabpanel" aria-labelledby="roi-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Visualizacion - Tabla(s) financiamiento -->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <table id="ahorroKw" class="table table-sm table-bordered">
                                                        <thead>
                                                            <th scope="col" colspan="8" class="text-center" style="background-color:black; color:white;">Ahorro energetico</th>
                                                            <tr>
                                                                <td><strong>ROI bruto</strong></td>
                                                                <td><strong>ROI con deduccion</strong></td>
                                                             </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td id="tdROIbruto"></td>
                                                                <td id="tdROIdeduccion"></td>
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
                                f
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