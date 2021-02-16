<?php $__env->startSection('cotizadores'); ?>
<div class="card shadow mb-3" id="divCotizacionMediaTension">
    <div class="card-header p-3">
        <div class="row">
            <div class="col-md-6 col-sm-6 fx-1 align-middle">
                <p class="d-block mn-1 p-titulos">
                    <i class="fa fa-list-alt" aria-hidden="true"></i> 
                    Datos de Consumo
                </p>
                <button class="btn btn-xs btn-light" data-toggle="modal" data-target=".modl-agregados-modal-lg" title="Agregados"><img src="https://img.icons8.com/carbon-copy/24/000000/file.png"/></button>
                <!-- Inicio - Modal_Agregados -->
                <div class="modal fade modl-agregados-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center">Agregados</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>    
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Controles_CRUD_Agregadoss -->
                                    <div class="col">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="inpCantidadAg">Cantidad</label>
                                                <input id="inpCantidadAg" type="number" class="form-control inpAg" style="width: 85px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="inpAgregado">Agregado</label>
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
                                <div class="row">
                                    <!-- Tabla_Agregados -->
                                    <div class="col-xl table-responsive-xl">
                                        <table class="table table-sm" id="tblAgregados">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align:center;">#</th>
                                                    <th scope="col" style="text-align:center;">Agregado</th>
                                                    <th scope="col" style="text-align:center;">Cantidad</th>
                                                    <th scope="col" style="text-align:center;">Precio</th>
                                                    <th scope="col" style="text-align:center;">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    <!-- Final_Tabla_Agregados -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin - Modal_Agregados -->
            </div>
            <div class="col-md-6 col-sm-6 fx-1"> 
                <div class="btn-group mn-2">
                    <button id="btnTarifGDMTO" type="button" class="btn btn-primary btn-sm btn-green" onclick="tarifaSelected(this)">GDMTO</button>
                    <button id="btnTarifGDMTH" type="button" class="btn btn-primary btn-sm btn-green" onclick="tarifaSelected(this)">GDMTH</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-white">
        <!-- Empieza formulario de GDMTO -->
        <div class="container" id="divGDMTO">
            <div class="row mt-3">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <button type="button" class="btn btnMenuInfo" id="btnMenuInfo" onClick="loadMenuGDMTO()" style="display:none;">
                            +
                        </button>
                        <div class="menu-content shadow" id="menuContentGDMTO">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="input1">Perdida</label>
                                        <input class="form-control" type="text" id="inpPerdidaGDMTO">
                                    </div>

                                    <div class="form-group">
                                        <label for="input2">Descuento</label>
                                        <input class="form-control" type="text" id="inpDescuentoGDMTO">
                                    </div>
                                </div>
                                <div class="col checkbox">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="chbAddItemGDMTO">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 mb-3 d-flex justify-content-end">
                        <div class="input-group w-auto px-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Periodo(s)</span>
                            </div>
                            <select class="custom-select iptPeriodos" name="numPeriodos" id="lstPeriodosGDMTO">
                                <option selected value="-1">1</option>
                            </select>
                        </div>
                        <div class="btn-group btn-group-lg" role="group">
                            <button id="btnAgregarPeriodoGDMTO" class="btn btn-green" onclick="agregarPeriodoGDMTO();" title="Agregar periodo de consumo">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </button>
                            <button id="btnEditarPeriodoGDMTO" class="btn btn-green" onclick="editarPeriodoGDMTO();" title="Editar periodo de consumo" disabled>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <!--button id="btnEliminarPeriodoGDMTO" class="btn btn-green" onclick="#" title="Eliminar periodo de consumo" disabled>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button-->
                            <button id="btnActualizarPeriodoGDMTO" class="btn btn-green" onclick="actualizarPeriodoGDMTO();" title="Actualizar periodo de consumo" disabled>
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpIkWh" class="mn-1">I (kWh):</label>
                            <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="I(mxn/kWh)" class="mn-1">I (mxn/kWh):</label>
                            <input id="I(mxn/kWh)" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPagoTransmision" class="mn-1">P. Transmisión:</label>
                            <input type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpIkw" class="mn-1">I (kw):</label>
                            <input id="inpI(kw)" name="I(kw)" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="C(mxn/kW)" class="mn-1">C (mxn/kW):</label>
                            <input type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="D(mxn/kW)" class="mn-1">D (mxn/kW):</label>
                            <input type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- Termina formulario de GDMTO -->

        <!-- Empieza formulario de GDMTH -->
        <div class="container" id="divGDMTH" style="display:none;">
            <div class="row mt-3">
                <div class="col-md-4 col-sm-12 mb-3">
                    <button type="button" class="btn btnMenuInfo" id="btnMenuInfo" onClick="loadMenuGDMTH()" style="display:none;">+</button>
                    <div class="menu-content shadow" id="menuContentGDMTH">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inpPerdidaGDMTH">Perdida</label>
                                    <input class="form-control" type="text" id="inpPerdidaGDMTH" value="18">
                                </div>
                                <div class="form-group">
                                    <label for="inpDescuentoGDMTH">Descuento</label>
                                    <input class="form-control" type="text" id="inpDescuentoGDMTH" value="0">
                                </div>
                            </div>
                            <div class="col checkbox">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="chbAddItemGDMTH">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 mb-3 d-flex justify-content-end">
                    <div class="input-group w-auto px-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Periodo(s)</span>
                        </div>
                        <select id="lstPeriodosGDMTH" class="custom-select iptPeriodos" name="numPeriodos" onchange="visualizarPeriodos(this)">
                            <option selected value="1">1</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-lg" role="group">
                        <button id="btnAgregarPeriodo" class="btn btn-green" onclick="agregarPeriodo();" title="Agregar periodo de consumo">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </button>
                        <button id="btnEditarPeriodo" class="btn btn-green" onclick="crudState(1);" title="Editar periodo de consumo" disabled>
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <button id="btnEliminarPeriodo" class="btn btn-green" title="Eliminar periodo de consumo" disabled style="display:none;">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button id="btnActualizarPeriodo" class="btn btn-green" onclick="actualizarPeriodo();" title="Actualizar periodo de consumo" disabled>
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpBkWh" class="mn-1">B (kWh):</label>
                            <input id="inpBkWh" name="B(kWh)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpIkWh" class="mn-1">I (kWh):</label>
                            <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPkWh" class="mn-1">P (kWh):</label>
                            <input id="inpPkWh" name="P(kWh)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpBkw" class="mn-1">B (kw):</label>
                            <input id="inpBkw" name="B(kw)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpIkw" class="mn-1">I (kw):</label>
                            <input id="inpIkw" name="I(kw)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPkw" class="mn-1">P (kw):</label>
                            <input id="inpPkw" name="P(kw)" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <h4>
                        <i class="fa fa-ticket" aria-hidden="true"></i>
                        Pago de CFE
                    </h4>
                    <hr>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="B(mxn/kWh)" class="mn-1">B (mxn/kWh):</label>
                            <input id="inpB_mxnkWh" type="number" min="0"  class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="I(mxn/kWh)" class="mn-1">I (mxn/kWh):</label>
                            <input id="inpI_mxnkWh" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="P(mxn/kWh)" class="mn-1">P (mxn/kWh):</label>
                            <input id="inpP_mxnkWh" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpPagoTransmision" class="mn-1">P. Transmisión:</label>
                            <input id="inpPagoTransmision" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="C(mxn/kW)" class="mn-1">C (mxn/kW):</label>
                            <input id="inpC_mxnkW" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="D(mxn/kW)" class="mn-1">D (mxn/kW):</label>
                            <input id="inpD_mxnkW" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Termina formulario de GDMTO -->
    </div>
</div>
<div class="card shadow mb-3" id="divResultCotizacion" style="display:none;">
    <div class="row">
        <div class="col">
            <button class="btn btn-xs float-left" onclick="backToCotizacion()"><img src="https://img.icons8.com/windows/24/000000/long-arrow-left.png"/></button>
        </div>
        <div class="w-100"></div>
        <div class="col-lg" id="divResult"></div>
    </div>
</div>
<div class="col-md-4 offset-md-8 text-right mb-3" id="divBtnCalcularMT">
    <button id="btnCalcularMT" class="btn btn-green text-uppercase shadow" onclick="calcularPropuestaMT()">
        <i class="fa fa-check" aria-hidden="true"></i>
        Calcular
    </button>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/mediaTension.blade.php ENDPATH**/ ?>