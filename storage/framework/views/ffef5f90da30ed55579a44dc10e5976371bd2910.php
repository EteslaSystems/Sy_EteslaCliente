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
            <div class="col-lg-7">
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
                                    <select class="form-control" id="ddlCombinaciones" onchange="seleccionarCombinacion(this)" disabled>
                                        <option selected value="-1">Elige una combinacion</option>
                                        <option value="combinacionOptima">Óptima</option>
                                        <option value="combinacionMediana">Mediana</option>
                                        <option value="combinacionEconomica">Económica</option>
                                    </select>
                                </div>
                                <div class="form-row" style="margin-top: 9px;">
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-sm btn-warning" title="Visualizar combinaciones" style="color:#FFFFFF; font-weight:bold;" data-toggle="modal" data-target="#modalCombinaciones">Visualizar</button>
                                    </div>
                                    <div class="col">
                                        <div class="form-check pull-right" id="checkSalvarCombinacion">
                                            <input type="checkbox" class="form-check-input" id="salvarCombinacion" onclick="salvarCombinacion();">
                                            <label for="salvarCombinacion">Salvar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Sección combinaciones -->
                            <!-- Seccion "Elegir un equipo" -->
                            <div class="col form-group" id="divElegirEquipo" style="display:none;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select id="listPaneles" class="form-control" onchange="mostrarPanelSeleccionado()" disabled>
                                                <option selected value="-1">Elige un panel</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="listEstructura" class="form-control" onchange="cambiarEstructura();" disabled>
                                                <option selected value="-1">Elige una estructura</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select class="form-control" id="listInversores" onchange="mostrarInversorSeleccionado()" disabled>
                                                <option selected value="-1">Elige un inversor (marca)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="listModelosInversor" class="form-control" onchange="mostrarInversorModeloSeleccionado()" disabled>
                                                <option selected value="-1">Elige un inversor (modelo)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <!-- Boton ajuste-propuesta -->
                                        <button id="btnModalAjustePropuesta" class="btn btn-xs" data-toggle="modal" data-target=".bd-modal-ej"><img src="https://img.icons8.com/ios-glyphs/24/000000/administrative-tools.png"/></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Seccion "Elegir un equipo" -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <p class="d-block mn-1 p-titulos" id="lblConvEquip">Propuesta</p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6" style="height: 118px;">
                                <div id="carouselExampleControls" class="carousel slide" data-interval="false" style="margin-top:15px;">
                                    <div class="carousel-inner text-center">
                                        <div class="carousel-item">
                                            <div class="custom-control custom-checkbox image-checkbox">
                                                <input id="rbtnQR" type="checkbox" class="custom-control-input" name="rbtnEntregable" onclick="selectOptionEntregable(this)" disabled>
                                                <label class="custom-control-label" for="rbtnQR">
                                                    <img src="https://img.icons8.com/cotton/80/000000/qr-code--v2.png"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="carousel-item active">
                                            <div class="custom-control custom-checkbox image-checkbox">
                                                <input id="rbtnPDF" type="checkbox" class="custom-control-input" name="rbtnEntregable" onclick="selectOptionEntregable(this)">
                                                <label class="custom-control-label" for="rbtnPDF">
                                                    <img src="https://img.icons8.com/color/80/000000/pdf.png"/>
                                                </label>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <!-- Contenedor de Botones de Guardar/Generar -->
                                <div class="col text-center" style="margin-top:15px;">
                                    <div class="form-group">
                                        <button id="btnGuardarPropuesta" type="button" class="btn btn-secondary" onclick="guardarPropuesta();" title="guardar propuesta" disabled>GUARDAR</button>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnGenerarEntregable" type="button" class="btn btn-secondary" title="generar propuesta" onclick="generarEntregable()" disabled>GENERAR</button>
                                    </div>
                                </div>
                                <!-- Fin Contenedor de Botones de Guardar/Generar -->
                            </div>
                        </div>
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
                        <div id="modalCombinaciones" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Combinaciones</h5>                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body table-responsive-xl">
                                        <table class="table table-bordered table-sm text-center">
                                            <thead style="background-color:#D68910; color:#FFFFFF;">
                                                <tr>
                                                    <th id="td-invisible" style="border-left:0px; border-top:0px; border-bottom:0px; background-color:#FFFFFF"></th>
                                                    <th scope="col"><strong>A</strong></th>
                                                    <th scope="col"><strong>B</strong></th>
                                                    <th scope="col"><strong>C</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="border-left:0px; border-top:0px;"></td>
                                                    <td id="imgLogos">
                                                        <div class="row">
                                                            <div class="col-sm">
                                                                <img id="imgPanelA" style="width:70px; height:44px;">
                                                            </div>
                                                            <div class="col-sm">
                                                                <img id="imgInversorA" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm">
                                                                <img id="imgEstructuraA" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td id="imgLogos">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img id="imgPanelB" style="width:70px; height:44px;">
                                                            </div>
                                                            <div class="col">
                                                                <img id="imgInversorB" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <img id="imgEstructuraB" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td id="imgLogos">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img id="imgPanelC" style="width:70px; height:44px;">
                                                            </div>
                                                            <div class="col">
                                                                <img id="imgInversorC" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <img id="imgEstructuraC" style="width:70px; height:44px;">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Costo por watt</strong></td>
                                                    <td id="tdCostoWattA">*</td>
                                                    <td id="tdCostoWattB">*</td>
                                                    <td id="tdCostoWattC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Potencia instalada</strong></td>
                                                    <td id="tdPotenciaInstaladaA">*</td>
                                                    <td id="tdPotenciaInstaladaB">*</td>
                                                    <td id="tdPotenciaInstaladaC">*</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="background-color:#70D85F; color:#FFFFFF;"><strong>Panel</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Modelo</strong></td>
                                                    <td id="tdModeloPanelA">*</td>
                                                    <td id="tdModeloPanelB">*</td>
                                                    <td id="tdModeloPanelC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cantidad</strong></td>
                                                    <td id="tdCantidadPanelA">*</td>
                                                    <td id="tdCantidadPanelB">*</td>
                                                    <td id="tdCantidadPanelC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Potencia</strong></td>
                                                    <td id="tdPotenciaPanelA">*</td>
                                                    <td id="tdPotenciaPanelB">*</td>
                                                    <td id="tdPotenciaPanelC">*</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="background-color:#31AEC1; color:#FFFFFF;"><strong>Inversor</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Modelo</strong></td>
                                                    <td id="tdModeloInversorA">*</td>
                                                    <td id="tdModeloInversorB">*</td>
                                                    <td id="tdModeloInversorC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cantidad</strong></td>
                                                    <td id="tdCantidadInversorA">*</td>
                                                    <td id="tdCantidadInversorB">*</td>
                                                    <td id="tdCantidadInversorC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Potencia</strong></td>
                                                    <td id="tdPotenciaInversorA">*</td>
                                                    <td id="tdPotenciaInversorB">*</td>
                                                    <td id="tdPotenciaInversorC">*</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="background-color:#C7CACA; color:#FFFFFF;"><strong>Estructura</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Modelo</strong></td>
                                                    <td id="tdModeloEstructuraA">*</td>
                                                    <td id="tdModeloEstructuraB">*</td>
                                                    <td id="tdModeloEstructuraC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cantidad</strong></td>
                                                    <td id="tdCantidadEstructuraA">*</td>
                                                    <td id="tdCantidadEstructuraB">*</td>
                                                    <td id="tdCantidadEstructuraC">*</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="background-color:#FFD485; color:#FFFFFF;"><strong>Totales</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Subtotal s/IVA</strong></td>
                                                    <td id="tdSubtotalA">*</td>
                                                    <td id="tdSubtotalB">*</td>
                                                    <td id="tdSubtotalC">*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total c/IVA</strong></td>
                                                    <td id="tdTotalA">*</td>
                                                    <td id="tdTotalB">*</td>
                                                    <td id="tdTotalC">*</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                                                                        <td id="tdTarifaActual" class="tdAnsw"></td>
                                                                    </tr>
                                                                    <tr id="trTarifaNueva">
                                                                        <td><strong>Tarifa nueva</strong></td>
                                                                        <td id="tdTarifaNueva" class="tdAnsw"></td>
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
                                                                        <td id="tdROIdeduccion" class="tdAnsw"></td>
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