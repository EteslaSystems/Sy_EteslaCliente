<?php $__env->startSection('cotizadores'); ?>
<div class="card shadow mb-3">
    <div class="card-header">
        <p class="d-block mn-1 p-titulos">
            <i class="fa fa-bolt" aria-hidden="true"></i>
            Cotización individual 
        </p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="form-row">
                        <button type="button" class="btn btn-xs btnMenuInfo" id="btnMenuInfo" onClick="loadMenu()" title="addItems">
                            +
                        </button>
                        <div class="menu-content shadow" id="menuContent">
                            <label><strong>Agregar</strong></label>
                            <div class="checkbox">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="chbEstructuras" disabled>Estructuras
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mn-1">Cantidad paneles:</label>
                                <input class="form-control input-sm" type="number" id="inpCantPaneles" disabled>
                            </div>
                            <div class="form-group">
                                <label class="mn-1">Seleccionar Panel:</label>
                                <select class="form-control" id="optPaneles" onchange="getDropDownListValues()">
                                    <option selected value="-1">Elige una opción:</option>
                                        <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mn-1">Cantidad inversores:</label>
                                <input class="form-control input-sm" type="number" id="inpCantInversores" disabled>
                            </div>
                            <div class="form-group">
                                <label class="mn-1">Seleccionar Inversor:</label>
                                <select class="form-control" id="optInversores" onchange="getDropDownListValues()">
                                    <option selected value="-1">Elige una opción:</option>
                                        <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($details->idInversor); ?>" ><?php echo e($details->vNombreMaterialFot); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-8 text-right mb-3">
                            <button onclick="sendSingleQuotation()" class="btn btn-green text-uppercase shadow" id="btnCalcularIndividual">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Calcular
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card shadow mb-3" style="display:none;" id="divResultCotIndv">
    <div class="card-body">
        <div class="container" id="containerCI1">
            <div id="divPaginado">
                <a href="#" onclick="coti_dollars()" title="cotizacion_individual dolares">1</a>
                <a> - </a>
                <a href="#" onclick="coti_mxn()" title="cotizacion_individual pesos mxn" id="a2">2</a>
            </div>
            <div class="row text-center">
                <div class="col table-responsive" id="dtabPanels">
                    <h3>Paneles</h3>
                    <table class="table table-sm table-striped" id="paneles">
                        <thead>
                            <th scope="col">Cantidad paneles</th>
                            <th scope="col">Potencia panel</th>
                            <th scope="col">Potencia real</th>
                            <th scope="col">Precio por modulo</th>
                            <th scope="col">Costo total paneles</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="tdCantidadPanel"></td>
                                <td id="tdPotenciaPanel"></td>
                                <td id="tdPotenciaReal"></td>
                                <td id="tdPrecioModulo"></td>
                                <td id="tdCostoTotalPanels"></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
            <div class="row text-center" id="dtabInversores">
                <div class="col table-responsive">
                    <h3>Inversores</h3>
                    <table class="table table-sm table-striped" id="inversores">
                        <thead>
                            <th scope="col">Cantidad inversores</th>
                            <th scope="col">Potencia inversor</th>
                            <th scope="col">Potencia maxima</th>
                            <th scope="col">Potencia nominal</th>
                            <th scope="col">Porcentaje sobredimensionamiento</th>
                            <th scope="col">Potencia pico</th>
                            <th scope="col">Precio inversor</th>
                            <th scope="col">Costo total inversores</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="tdCantidadInversor"></td>
                                <td id="tdPotenciaInversor"></td>
                                <td id="tdPotenciaMaxima"></td>
                                <td id="tdPotenciaNominal"></td>
                                <td id="tdPorcentajeSD"></td>
                                <td id="tdPotenciaPico"></td>
                                <td id="tdPrecioInversor"></td>
                                <td id="tdCostoTotalInv"></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>   
            </div>
            <div class="row text-center" id="dtabViatics">
                <div class="col table-responsive">
                    <h3>Viaticos</h3>
                    <table class="table table-sm table-striped" id="viaticos">
                        <thead>
                            <th scope="col">Costo de estructuras</th>
                            <th scope="col">No. cuadrillas</th>
                            <th scope="col">No. dias</th>
                            <th scope="col">No. dias reales</th>
                            <th scope="col">No. personas requeridas</th>
                            <th scope="col">Pago pasaje</th>
                            <th scope="col">Pago total comida</th>
                            <th scope="col">Pago total hospedaje</th>
                            <th scope="col">Pago total pasaje</th>
                            <th scope="col">Total de los viaticos</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="tdCostoEstructuras"></td>
                                <td id="tdNoCuadrillas"></td>
                                <td id="tdNoDias"></td>
                                <td id="tdNoDiasReales"></td>
                                <td id="tdNoPersonasReq"></td>
                                <td id="tdPagoPasaje"></td>
                                <td id="tdPagoTotalComida"></td>
                                <td id="tdPagoTotalHospedaje"></td>
                                <td id="tdPagoTotalPasaje"></td>
                                <td id="tdTotalViaticos"></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
            <div class="row text-center" id="dtabTotales">
                `<div class="col table-responsive">
                    <h3>Totales</h3>
                    <table class="table table-sm table-striped" id="totales">
                        <thead>
                            <th scope="col">Costo por watt</th>
                            <th scope="col">Costo total fletes</th>
                            <th scope="col">Mano de obra</th>
                            <th scope="col">Margen</th>
                            <th scope="col">Total de otros</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Precio mas IVA</th>
                            <th scope="col">Total paneles, inversores, estructuras</th>
                            <th scope="col">Subtotal Otros, flete, pan. inv. est.</th>
                            <th scope="col">Total de todo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="tdCostoWatt"></td>
                                <td id="tdCostoTotalFletes"></td>
                                <td id="tdManoObra"></td>
                                <td id="tdMargen"></td>
                                <td id="tdTotalOtros"></td>
                                <td id="tdPrecio"></td>
                                <td id="tdPrecioMasIVA"></td>
                                <td id="tdTPIE"></td>
                                <td id="tdSubtotalOFPIE"></td>
                                <td id="tdTotalTodo"></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <div class="container" id="containerCI2" style="display:none;">
            <div>
                <a href="#" onclick="coti_dollars()" title="cotizacion_individual dolares">1</a>
                <a> - </a>
                <a href="#" onclick="coti_mxn()" title="cotizacion_individual pesos mxn"id="a2>2</a>
            </div>    
            <div class="row text-center">
                <div class="col table-responsive">
                    <h3>Totales mxn</h3>
                    <table class="table table-sm table-striped" id="totales">
                        <thead>
                            <th scope="col">Costo por watt</th>
                            <th scope="col">Costo total fletes</th>
                            <th scope="col">Mano de obra</th>
                            <th scope="col">Margen</th>
                            <th scope="col">Total de otros</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Precio mas IVA</th>
                            <th scope="col">Total paneles, inversores, estructuras</th>
                            <th scope="col">Subtotal Otros, flete, pan. inv. est.</th>
                            <th scope="col">Total de todo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                                <td id=""></td>
                            </tr>
                        </tbody>
                    </table> 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/individual.blade.php ENDPATH**/ ?>