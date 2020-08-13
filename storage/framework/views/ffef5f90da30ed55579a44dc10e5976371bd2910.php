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
                                    <p class="d-block mn-1 p-titulos" id="lblConvEquip">Convinaciones</p>
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
                                    <label>Convinación</label>
                                    <select class="form-control" id="listConvinaciones">
                                        <option selected value="-1">Elige una opción:</option>
                                        <option value="optConvinacionOptima">Óptima</option>
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
                        <p class="d-block mn-1 p-titulos"><ins>Resultados</ins></p>
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
                                            <div class="row">
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
                                                <div class="col-lg-6">
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/cotizador/mediaTension/GDMTH.js')); ?>"></script>

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