@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
<div class="card shadow mb-3" id="divCotizacionMediaTension">
    <div class="card-header p-3">
        <div class="row">
            <div class="col-md-6 col-sm-6 fx-1 align-middle">
                <p class="d-block mn-1 p-titulos">
                    <i class="fa fa-list-alt" aria-hidden="true"></i> 
                    Datos de Consumo
                </p>
            </div>
            <div class="col-md-6 col-sm-6 fx-1"> 
                <div class="btn-group mn-2">
                    <button type="button" class="btn btn-primary btn-sm btn-green" onclick="GDMTO()">GDMTO</button>
                    <button type="button" class="btn btn-primary btn-sm btn-green" onclick="GDMTH()">GDMTH</button>
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
                            <label for="inpIkWhGDMTO" class="mn-1">I (kWh):</label>
                            <input id="inpIkWhGDMTO" name="I(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="I(mxn/kWh)GDMTO" class="mn-1">I (mxn/kWh):</label>
                            <input id="I(mxn/kWh)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPagoTransmisionGDMTO" class="mn-1">P. Transmisión:</label>
                            <input id="inpPagoTransmisionGDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpIkwGDMTO" class="mn-1">I (kw):</label>
                            <input id="inpIkwGDMTO" name="I(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="C(mxn/kW)GDMTO" class="mn-1">C (mxn/kW):</label>
                            <input id="C(mxn/kW)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="D(mxn/kW)GDMTO" class="mn-1">D (mxn/kW):</label>
                            <input id="D(mxn/kW)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
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
                        <select class="custom-select iptPeriodos" name="numPeriodos" id="lstPeriodosGDMTH">
                            <option selected value="-1">1</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-lg" role="group">
                        <button id="btnAgregarPeriodo" class="btn btn-green" onclick="agregarPeriodo();" title="Agregar periodo de consumo">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </button>
                        <button id="btnEditarPeriodo" class="btn btn-green" onclick="editarPeriodo();" title="Editar periodo de consumo" disabled>
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
                            <input id="inpBkWh" name="B(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpIkWh" class="mn-1">I (kWh):</label>
                            <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPkWh" class="mn-1">P (kWh):</label>
                            <input id="inpPkWh" name="P(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpBkw" class="mn-1">B (kw):</label>
                            <input id="inpBkw" name="B(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpIkw" class="mn-1">I (kw):</label>
                            <input id="inpIkw" name="I(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpPkw" class="mn-1">P (kw):</label>
                            <input id="inpPkw" name="P(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
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
                            <input id="B(mxn/kWh)" type="number" min="0"  class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="I(mxn/kWh)" class="mn-1">I (mxn/kWh):</label>
                            <input id="I(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="P(mxn/kWh)" class="mn-1">P (mxn/kWh):</label>
                            <input id="P(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpPagoTransmision" class="mn-1">P. Transmisión:</label>
                            <input id="inpPagoTransmision" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="C(mxn/kW)" class="mn-1">C (mxn/kW):</label>
                            <input id="C(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="D(mxn/kW)" class="mn-1">D (mxn/kW):</label>
                            <input id="D(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
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
    <button onclick="validarEnvioDePeriodo()" class="btn btn-green text-uppercase shadow" id="btnGDMTO">
        <i class="fa fa-check" aria-hidden="true"></i>
        Calcular
    </button>
    <button style="display:none;" onclick="validarEnvioDePeriodoGDMTH()" class="btn btn-green text-uppercase shadow" id="btnGDMTH">
        <i class="fa fa-check" aria-hidden="true"></i>
        Calcular
    </button>
</div>
@endsection