<?php $__env->startSection('cotizadores'); ?>
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
                        <a id="btnMenuInfo" href="#" class="btn pull-right" title="addItems" onclick="openPopover()"><img src="https://img.icons8.com/material/16/000000/gearbox-selector.png"/></a>
                        <!-- Popover -->
                        <div class="col d-none" id="divPopover">
                            <h1>Some Text of title</h1>
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
                                            <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($details->idInversor); ?>" ><?php echo e($details->vNombreMaterialFot); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <div class="col">
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

                            <!--div class="form-group">
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
                            </div-->
                        </div>
                    </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/individual.blade.php ENDPATH**/ ?>