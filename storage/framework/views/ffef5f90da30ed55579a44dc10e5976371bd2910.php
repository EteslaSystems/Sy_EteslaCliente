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
                            <div class="col form-group" id="divConvinaciones">
                                <div class="form-row">
                                    <label>Combinacion</label>
                                    <select class="form-control" id="listConvinaciones" disabled>
                                        <option selected value="-1">Elige una opción:</option>
                                        <option value="optConvinacionOptima" style="display:none;">Óptima</option>
                                        <option value="optConvinacionMediana">Mediana</option>
                                        <option value="optConvinacionEconomica">Económica</option>
                                    </select>
                                </div>
                            </div>
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
                                <br>
                                <div class="form-row" style="display:none;" id="tblAjusteCotiMT">
                                    <table class="table table-hover table-sm table-striped">
                                        <thead class="thead-dark text-center">
                                            <tr>
                                                <th scope="col" colspan="2">Resumen General</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="range-wrap">
                                                        <div class="range-value" id="rangeV-1"></div>
                                                        <input id="range-1" type="range" min="0" max="200" value="100" step="1">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="range-wrap">
                                                        <div class="range-value" id="rangeV-2"></div>
                                                        <input id="range-2" type="range" min="0" max="200" value="100" step="1">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="range-wrap">
                                                        <div class="range-value" id="rangeV-3"></div>
                                                        <input id="range-3" type="range" min="-30" max="50" value="0" step="1">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>
                                                    <button class="btn btn-sm btn-success" style="margin-top: 10px; margin-bottom: 10px;" onclick="guardarGenerarPDF();">
                                                        GUARDAR Y CREAR PDF
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" style="margin-top: 10px; margin-bottom: 10px;">
                                                        MODIFICAR RESULTADOS
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                            <div class="col">
                                <button class="btn btn-xs pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="padding: 4px;" disabled><img src="https://img.icons8.com/material-outlined/24/000000/details.png"/></button>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col" id="divCombinacion">
                                            <h5>Combinacion economica</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <img height="35" weight="100" id="imgLogoPanel" src="https://img1.freepng.es/20180529/wj/kisspng-canadian-solar-solar-panels-solar-power-solar-ener-solar-energy-logo-5b0cf5eb064114.2822038615275760430256.jpg">
                                                    <img height="100" weight="80" id="imgPanel" src="data:image/jpeg;base64,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">
                                                </div>
                                                <div class="col">
                                                    <img height="35" weight="100" id="imgLogoInversor" src="data:image/png;base64,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">
                                                    <img height="100" weight="80" id="imgInversor" src="data:image/jpeg;base64,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">
                                                </div>
                                            </div>
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Costo total paneles
                                                    <span class="badge badge-primary badge-pill">14$</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Costo total inversores
                                                    <span class="badge badge-primary badge-pill">2$</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Costo total estructuras
                                                    <span class="badge badge-primary badge-pill">1$</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Costo total viaticos
                                                    <span class="badge badge-primary badge-pill">14$</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Precio
                                                    <span class="badge badge-primary badge-pill">2$</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Precio + IVA
                                                    <span class="badge badge-primary badge-pill">1$</span>
                                                </li>
                                                <li class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">
                                                    Costo total MXN
                                                    <span class="badge badge-warning badge-pill">$1234</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col" id="divCombinacionMediana">hello world2</div>
                                        <div class="col" id="divCombinacionEconomica">hello world3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="pull-right">
                                    <div class="form-check" id="checkSalvarCombinacion">
                                        <input type="checkbox" class="form-check-input" id="salvarCombinacion">
                                        <label for="salvarCombinacion">Salvar</label>
                                    </div>
                                </div>
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
                                            <div class="row">
                                                <div class="col" id="divPlusEquipos">
                                                    <div class="form-group">
                                                        <label for="inpPanelS">Panel</label>
                                                        <input id="inpPanelS" class="form-control inpAnsw" readOnly>
                                                        <input id="inpMarcaPanelS" class="form-control inpAnsw" style="display:none;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inpInversorS">Inversor</label>
                                                        <input id="inpInversorS" class="form-control inpAnsw" readOnly>
                                                        <input id="inpMarcaInversorS" class="form-control inpAnsw" style="display:none;">
                                                    </div>
                                                </div>
                                                <div class="col" style="justify-content:center;">
                                                    <div class="form-group">
                                                        <label for="inpCostTotalPaneles">Costo total Paneles<small title="Cantidad de paneles" id="txtCantidadPaneles"></small></label>
                                                        <input id="inpCostTotalPaneles" class="form-control inpAnsw" readOnly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inpCostTotalInversores">Costo total Inversores <small title="Cantidad de inversores" id="txtCantidadInversores"></small></label>
                                                        <input id="inpCostTotalInversores" class="form-control inpAnsw" readOnly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inpCostTotalEstructuras">Costo total Estructuras <small title="Cantidad de estructuras" id="txtCantidadEstructuras"></small></label>
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
                                                        <label for="inpPrecioMXN">Precio del proyecto MXN</label>
                                                        <input id="inpPrecioMXN" class="form-control inpAnsw" readOnly>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpTransmision<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Energia</th>
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpEnergia<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Capacidad</th>
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpCapacidad<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Distribucion</th>
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpDistribucion<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">IVA</th>
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpIVA<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Total</th>
                                                                <?php for($i=0; $i<12; $i++): ?>
                                                                    <td id="inpTotal<?php echo e($i); ?>"></td>
                                                                <?php endfor; ?>
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
        }
    </style>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/cotizador/mediaTension/GDMTH.js')); ?>"></script>
<script src="<?php echo e(asset('js/cotizador/bajaTension.js')); ?>"></script>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/resultados-cotizador.blade.php ENDPATH**/ ?>