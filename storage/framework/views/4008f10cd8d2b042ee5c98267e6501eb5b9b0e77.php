<?php $__env->startSection('cotizadores'); ?>
<div class="card">
    <div class="card-body container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body row" style="border-left: 3px solid #F9FE39; border-right: 3px solid #F9FE39; border-top: 3px solid #F9FE39; border-bottom: 3px solid #F9FE39;">
                        <?php if($rol == 2): ?>
                        <!-- Controles accesibles unicamente para Operaciones -->
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="chbMO" onclick="cambiaValorCheckBox(this)" checked>
                                    <label class="form-check-label" for="chbMO" style="color: #888;">Mano de obra</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="chbOtros" onclick="cambiaValorCheckBox(this)" checked>
                                    <label class="form-check-label" for="chbOtros" style="color: #888;">Otros</label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-3">
                            <?php if($rol == 2): ?>
                            <!-- Controles accesibles unicamente para Operaciones -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="chbFletes" onclick="cambiaValorCheckBox(this)" checked>
                                    <label class="form-check-label" for="chbFletes" style="color: #888;">Fletes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="chbViaticos" onclick="cambiaValorCheckBox(this)" checked>
                                    <label class="form-check-label" for="chbViaticos" style="color: #888;">
                                        <a href="#" data-toggle="modal" data-target=".bd-viaticos-modal-sm">Viaticos</a>
                                    </label>
                                </div>
                            <?php endif; ?>
                            <!-- Modal viaticos -->
                            <div class="modal fade bd-viaticos-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Componentes - Viaticos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="chbPasaje" onclick="cambiaValorCheckBox(this)" checked>
                                                    <label class="form-check-label" for="chbPasaje" style="color: #888;">Pasaje</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="chbHospedaje" onclick="cambiaValorCheckBox(this)" checked>
                                                    <label class="form-check-label" for="chbHospedaje" style="color: #888;">Hospedaje</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="chbComida" onclick="cambiaValorCheckBox(this)" checked>
                                                    <label class="form-check-label" for="chbComida" style="color: #888;">Comida</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin - Modal viaticos -->
                        </div>
                        <!-- Controles Generar Entregable -->
                        <div class="col">
                            <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                                <div class="carousel-inner text-center">
                                    <div class="carousel-item">
                                        <div class="custom-control custom-checkbox image-checkbox">
                                            <input id="rbtnQR" type="checkbox" class="custom-control-input" name="rbtnEntregable" onclick="selectOptionEntregable(this)" disabled>
                                            <label class="custom-control-label" for="rbtnQR">
                                                <img src="https://img.icons8.com/cotton/60/000000/qr-code--v2.png"/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <div class="custom-control custom-checkbox image-checkbox">
                                            <input id="rbtnPDF" type="checkbox" class="custom-control-input" name="rbtnEntregable" onclick="selectOptionEntregable(this)">
                                            <label class="custom-control-label" for="rbtnPDF">
                                                <img src="https://img.icons8.com/color/80/000000/pdf.png"/>
                                            </label>
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
                        <!-- Fin Controles Generar Entregable -->
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <div class="row">
                                        <div class="col">
                                            <button id="btnModalAjustePropuesta" class="btn btn-xs" data-toggle="modal" data-target=".bd-modal-aumento-descuento">
                                                <img width="100%" height="32px" src="<?php echo e(asset('/img/icon/configuration-icon.png')); ?>"/>
                                            </button>
                                            <label for="btnModalAjustePropuesta">
                                                <strong>Ajuste propuesta</strong>
                                            </label>
                                        </div>
                                        <div class="col">
                                           <button id="configPDF" type="button" class="btn btn-xs pull-right" data-toggle="modal" data-target="#mdlPDFConfiguration" title="Configuracion del PDF" disabled>
                                                <img width="100%" height="30px" src="<?php echo e(asset('img/icon/pdf-config.png')); ?>"/>
                                            </button>
                                            <label for="configPDF">
                                                <strong>PDF Config</strong>
                                            </label>
                                            <!-- Modal => PDFConfiguration -->
                                            <div id="mdlPDFConfiguration" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Configuracion PDF</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <nav>
                                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                    <a id="configurationPdf-paginaUno-tab" class="nav-item nav-link active"  data-toggle="tab" href="#configurationPdf-paginaUno" role="tab" aria-controls="configurationPdf-paginaUno" aria-selected="true">Hoja 1</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content">
                                                                <div id="configurationPdf-paginaUno" class="tab-pane fade show active" role="tabpanel">
                                                                    <label for="swtSubtDesglozados">Subtotales desglozados</label>
                                                                    <input id="swtSubtDesglozados" type="checkbox" data-toggle="toggle" data-width="135" data-on="Habilitado" data-off="Deshabilitado" data-onstyle="success" data-offstyle="danger" checked>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal => PDFConfiguration -->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-auto">
                                    <button id="btnAgregados" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modl-agregados-modal-lg">
                                    <img src="<?php echo e(asset('/img/icon/agregados.png')); ?>" />
                                    Agregados
                                </button>
                                <button id="calcularCotIndiv" onclick="calcularCotizacionIndividual()" type="button" class="btn btn-sm btn-primary">
                                    <img src="<?php echo e(asset('/img/icon/calculadora.png')); ?>" />
                                    Calcular
                                </button>
                                <button id="generarPDF" onclick="generarEntregable();" class="btn btn-sm btn-info" type="button" disabled>
                                    <img src="<?php echo e(asset('/img/icon/pdf.png')); ?>" />
                                    Generar
                                </button>
                                <button id="guardarPropuesta" onclick="guardarPropuesta();" type="button" class="btn btn-sm btn-secondary" disabled>
                                    <img src="<?php echo e(asset('/img/icon/guardar.png')); ?>" />
                                    Guardar
                                </button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Aumento/Descuento Propuesta -->
                        <div class="modal fade bd-modal-aumento-descuento" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-center">Ajuste propuesta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Panel de % auento & descuento [ cotizacion_indiviual ] -->
                                    <div class="modal-body">
                                        <div class="slidecontainer">
                                            <div class="form-group">
                                                <label>Descuento de costo del proyecto</label>
                                                <input id="inpSliderDescuento" type="range" min="0" max="30" class="slider" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValueDescuento"></output>%
                                            </div>
                                            <div class="form-group">
                                                <label>Aumento de costo del proyecto</label>
                                                <input id="inpSliderAumento" type="range" min="0" max="100" class="slider" value="0" oninput="rangeValueAumento.value=inpSliderAumento.value">
                                                <output id="rangeValueAumento"></output>%
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal Aumento/Descuento Propuesta -->
                        <!-- Modal Agregados -->
                        <div class="modal fade modl-agregados-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center">Agregados</h5>
                                        <div class="form-group text-right">
                                            <label for="costoTotalAgregados">Costo total:</label>
                                            <p id="costoTotalAgregados" class="bg-warning text-white"></p>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>    
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                            <!-- Controles_CRUD_Agregadoss -->
                                                <div class="col">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <label for="inpCantidadAg">Cantidad</label>
                                                            <input id="inpCantidadAg" type="number" class="form-control inpAg" style="width: 85px;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inpAgregado">Concepto</label>
                                                            <input id="inpAgregado" type="text" class="form-control inpAg">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inpPrecioAg">Precio</label>
                                                            <input id="inpPrecioAg" type="number" min=".50" step="any" class="form-control inpAg" >
                                                        </div>
                                                        <button id="btnAddAg" type="button" class="btn btn-primary" onclick="addAgregado();">+</button>
                                                    </form>
                                                </div>
                                                <!-- Final_Controles_CRUD_Agregados -->
                                            </div>
                                            <br>
                                            <div class="row">
                                                <!-- Tabla_Agregados -->
                                                <div class="col-xl table-responsive-xl">
                                                    <table class="table table-sm" id="tblAgregados">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="text-align:center;">#</th>
                                                                <th scope="col" style="text-align:center;">Concepto</th>
                                                                <th scope="col" style="text-align:center;">Cantidad</th>
                                                                <th scope="col" style="text-align:center;">Precio unit.</th>
                                                                <th scope="col" style="text-align:center;">Subtotal</th>
                                                                <th scope="col" style="text-align:center;">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Contenido dinamico c/JavaScript -->
                                                        </tbody>
                                                    </table>
                                                <!-- Final_Tabla_Agregados -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin - Modal Agregados -->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Panel:</label>
                            <select class="form-control" id="optPaneles" onchange="activarInputsDDL(this)">
                                <option selected value="-1">Elige una opción:</option>
                                <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad paneles:</label>
                            <input class="form-control input-sm inputResult" type="number" id="inpCantPaneles" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Inversor:</label>
                            <select class="form-control" id="optInversores" onchange="activarInputsDDL(this)">
                                <option title="-1" value="-1" selected>Elige una opción:</option>
                                <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option title="<?php echo e($details->vTipoInversor); ?>" value="<?php echo e($details->idInversor); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div id="cntInversor" class="form-group">
                            <label class="mn-1">Cantidad inversores:</label>
                            <input class="form-control input-sm inputResult" type="number" id="inpCantInversores" disabled>
                        </div>
                        <div id="cntCombinacion" class="form-row" style="display:none;">
                            <div class="col">
                                <label id="lblMicroInversorUno" class="mn-1"></label>
                                <input id="inpCantMicro1" class="form-control input-sm inputResult" type="number" disabled>
                            </div>
                            <div class="col">
                                <label id="lblMicroInversorDos" class="mn-1"></label>
                                <input id="inpCantMicro2" class="form-control input-sm inputResult" type="number" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mn-1">Seleccionar Estructura:</label>
                            <select id="optEstructuras" class="form-control" onchange="activarInputsDDL(this)">
                                <option selected value="-1">Elige una opción:</option>
                                <?php $__currentLoopData = $vEstructuras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estructura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($estructura->idEstructura); ?>" ><?php echo e($estructura->vMarca); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad estructuras:</label>
                            <input class="form-control input-sm inputResult" type="number" id="inpCantEstructuras" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div id="resultadosIndiv" class="container-fluid">
            <div class="row">
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td class="tdColor" style="background-color: #DDE0A0;">Potencia instalada</td>
                                <td id="resPotenciaInstalada"></td>  
                            </tr>
                            <tr>
                                <td class="tdColor">Costo panel(es)</td>
                                <td id="resCostoPanel"></td>
                            </tr>
                            <tr>
                                <td class="tdColor">Costo inversor(es)</td>
                                <td id="resCostInversor"></td>
                            </tr>
                            <tr>
                                <td class="tdColor">Costo estructura(s)</td>
                                <td id="resCostEstruct"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td class="tdColor">Costo viaticos</td>
                                <td id="resCostoViaticos"></td>
                            </tr>
                            <tr>
                                <td class="tdColor">Costo mano de obra y otros</td>
                                <td id="resCostoMO"></td>
                            </tr>
                            <tr>
                                <td class="tdColor">Costo fletes</td>
                                <td id="resCostoFletes"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
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

<style>   
    .inpAnsw{
        border:0; 
        background: transparent !important;
        border-bottom: 1px solid #888 !important;
    }
    .tdColor{
        background-color: #92C3D6;
        color: white;
        font-weight: bolder;
        width: 50%;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/individual.blade.php ENDPATH**/ ?>