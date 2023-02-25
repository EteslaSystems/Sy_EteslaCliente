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
                    <button id="btnTarifGDMTO" type="button" class="btn btn-primary btn-sm btn-green" onclick="tarifaSelected(this)">GDMTO</button>
                    <button id="btnTarifGDMTH" type="button" class="btn btn-primary btn-sm btn-green" onclick="tarifaSelected(this)">GDMTH</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-white">
        <!-- Inicio_ControlesCRUD-Periodos -->
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
        <!-- Fin_ControlesCRUD-Periodos -->
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
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpIkWh" class="mn-1">I (kWh):</label>
                            <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpI_mxnkWh" class="mn-1">I (mxn/kWh):</label>
                            <input id="inpI_mxnkWh" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inppagoTransmision" class="mn-1">P. Transmisión:</label>
                            <input id="inppagoTransmision" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inpIkw" class="mn-1">I (kw):</label>
                            <input id="inpIkw" name="I(kw)" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpC_mxnkW" class="mn-1">C (mxn/kW):</label>
                            <input id="inpC_mxnkW" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpD_mxnkW" class="mn-1">D (mxn/kW):</label>
                            <input id="inpD_mxnkW" type="number" min="0" class="form-control inpGDMTO" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- Termina formulario de GDMTO -->

        <!-- Empieza formulario de GDMTH -->
        <div class="container" id="divGDMTH" style="display:none;">
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
                            <input id="inppagoTransmision" type="number" min="0" class="form-control inpGDMTH" onkeypress="return filterFloat(event,this);">
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

<div class="card-header p-3">
    <div class="row">
        <div class="col-md-6 col-sm-6 fx-1 align-middle">
            <p class="d-block mn-1 p-titulos">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                Extracción de datos
            </p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 bg-light p-3 border">
                                <img src="{{ asset('/img/xml.png')}}" id="xmlEnero" width="25" height="25">
                                <form method="GET" enctype="multipart/form-data" id="fileUploadForm" style="display: none" >
                                    <input type="file" name="urlxmlEnero" id="urlxmlEnero" accept="application/xml">
                                </form>
                            </div>
                            <div class="col-sm-9 bg-light p-3 border">
                                <h5 class="card-title"> Enero</h5>
                            </div>
                        </div>
                    </div>
                    <p class="card-text" id="nombre"></p>
                    <p class="card-text" id="direccion"></p>
                    <p class="card-text" id="rpu"></p>
                    <p class="card-text" id="consumo_kWh_base"></p>
                    <p class="card-text" id="consumo_kWh_intermedia"></p>
                    <p class="card-text" id="consumo_kWh_punta"></p>
                    
                    <p class="card-text" id="demanda_kWh_base"></p>
                    <p class="card-text" id="demanda_kWh_intermedia"></p>
                    <p class="card-text" id="demanda_kWh_punta"></p>


                    <p class="card-text" id="Generacion_B"></p>
                    <p class="card-text" id="Generacion_I"></p>
                    <p class="card-text" id="Generacion_P"></p>
                    <p class="card-text" id="Distribucion"></p>
                    <p class="card-text" id="Capacidad"></p>

                    <p class="card-text" id="Transmision"></p>


                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 fx-1 align-middle">
            <p class="d-block mn-1 p-titulos">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                Extracción de datos
            </p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection