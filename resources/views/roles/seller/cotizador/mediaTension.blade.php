@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
    <!-- Card - Panel/Inversor -->
    <div class="card">
        <div class="card-header"><img src="https://img.icons8.com/material-outlined/24/000000/lightning-bolt.png"><label class="label-cotizador"><strong>&nbsp;Cotizador de media tensión (Configuración)</strong></label></div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-10 col-form-label">Seleccionar panel</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <select class="form-control" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-10 col-form-label">Seleccionar marca del inversor</label>      
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <select class="form-control" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- Card - GDMTO/GDMTH -->
    <div class="card">
        <div class="card-header">
            <label class="label-cotizador"><img src="https://img.icons8.com/ios-filled/24/000000/light-automation.png"><strong>&nbsp;Datos de Consumo</strong></label>
            <div class="btn-group btn-group-toggle pull-right">
                <button type="button" class="btn btn-primary" onclick="GDMTO()">GDMTO</button>
                <button type="button" class="btn btn-primary" onclick="GDMTH()">GDMTH</button>
            </div>
        </div>
        <div class="card-body" >
            <div class="container-fluid" id="divGDMTO">
                <div class="row">
                    <div class="col-3 mx-auto">
                        <p align="center"><strong>Irradiación</strong></p>
                        <div class="form-group row">
                            <input type="number" class="form-control" id="inpIrradiacion" placeholder="Irradiacion" pattern="[^[0-9]+$]">
                        </div>
                    </div>
                    <div class="col-3 mx-auto">
                        <p align="center"><strong>Potencia</strong></p>
                        <div class="form-group-row">
                            <input type="number" class="form-control" id="inpPotencia" placeholder="Potencia">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <br>
                        <p align="center"><strong>Mes</strong></p>
                        <div class="form-group row">
                            <label for="inp1kwh" class="col-sm-2 col-form-label">1</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">2</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">3</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">4</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">5</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">6</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">7</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">8</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">9</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">10</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">11</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inpkwh" class="col-sm-2 col-form-label">12</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <input type="number" id="inpkwh" class="form-control">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">kWh</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <br>
                        <p align="center"><strong>Costo</strong></p>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost3" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost4" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost5" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost6" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost7" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost8" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost9" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost10" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost11" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" id="inpCost12" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- GMDTH -->
            <div class="container-fluid" style="display:none;" id="divGDMTH">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="numPeriodos" id="lstPeriodos">
                            <option disabled selected value="-1">0</option>
                        </select>
                    </div>
                    <div class="col">
                        <button id="btnAgregarPeriodo" class="btn btn-info" onclick="agregarPeriodo();" title="agregar periodo de consumo"><strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M43,14.33333c-7.88333,0 -14.33333,6.45 -14.33333,14.33333v114.66667c0,7.88333 6.45,14.33333 14.33333,14.33333h86c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-86l-43,-43zM43,28.66667h51.39844l34.60156,34.60156v80.0651h-86zM78.83333,64.5v21.5h-21.5v14.33333h21.5v21.5h14.33333v-21.5h21.5v-14.33333h-21.5v-21.5z"></path></g></g></svg></strong></button>
                        <button id="btnEditarPeriodo" class="btn btn-warning" onclick="#" title="editar periodo de consumo" disabled><strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M28.66667,14.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM57.33333,43c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM86,71.66667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v57.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h37.0651l-14.33333,-14.33333h-22.73177v-57.33333h57.33333v22.73177l14.33333,14.33333v-37.0651c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM107.5,107.5v14.33333l36.88314,36.88314l14.33333,-14.33333l-36.88314,-36.88314zM163.78353,149.4502l-14.33333,14.33333l7.16667,7.16667c1.3975,1.3975 3.66956,1.3975 5.06706,0l9.26628,-9.26628c1.3975,-1.40467 1.3975,-3.66956 0,-5.06706z"></path></g></g></svg></strong></button>
                        <button id="btnEliminarPeriodo" class="btn btn-danger" onclick="#" title="eliminar periodo de consumo" disabled><strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M71.66667,14.33333l-7.16667,7.16667h-35.83333v14.33333h7.16667v107.5c0,7.83362 6.49972,14.33333 14.33333,14.33333h57.33333v-14.33333h-57.33333v-107.5h71.66667v71.66667h14.33333v-71.66667h7.16667v-14.33333h-7.16667h-28.66667l-7.16667,-7.16667zM64.5,50.16667v78.83333h14.33333v-78.83333zM93.16667,50.16667v78.83333h14.33333v-78.83333zM128.13216,121.32943l-10.13411,10.13411l15.20117,15.20117l-15.20117,15.20117l10.13411,10.13411l15.20117,-15.20117l15.20117,15.20117l10.13411,-10.13411l-15.20117,-15.20117l15.20117,-15.20117l-10.13411,-10.13411l-15.20117,15.20117z"></path></g></g></svg></strong></button>
                        <button id="btnActualizarPeriodo" class="btn btn-primary" onclick="#" title="actualizar periodo de consumo" disabled><strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,21.5c-19.61127,0 -37.15804,8.82697 -48.97689,22.68978l-15.52311,-15.52311v43h43l-17.25879,-17.25879c9.1948,-11.28751 23.09893,-18.57454 38.75879,-18.57454c27.65617,0 50.16667,22.50333 50.16667,50.16667h14.33333c0,-35.561 -28.93183,-64.5 -64.5,-64.5zM21.5,86c0,35.56817 28.93183,64.5 64.5,64.5c19.61127,0 37.15804,-8.82697 48.97689,-22.68978l15.52311,15.52311v-43h-43l17.25879,17.25879c-9.1948,11.28751 -23.09893,18.57455 -38.75879,18.57455c-27.65617,0 -50.16667,-22.5105 -50.16667,-50.16667z"></path></g></g></svg></strong></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label>B(kWh)&nbsp;&nbsp;</label>
                                    <input id="inpBkWh" name="B(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label>I(kWh)&nbsp;&nbsp;&nbsp;</label>
                                    <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label>P(kWh)&nbsp;&nbsp;</label>
                                    <input id="inpPkWh" name="P(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="inpBkw">B(kw)&nbsp;&nbsp;</label>
                                    <input id="inpBkw" name="B(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="inpIkw">I(kw)&nbsp;&nbsp;&nbsp;</label>
                                    <input id="inpIkw" name="I(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="inpPkw">P(kw)&nbsp;&nbsp;</label>
                                    <input id="inpPkw" name="P(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin GDMTH -->
                <br>

                <span class="label-cotizador" style="color: green"><strong>Pago CFE</strong></span><br><br>

                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="B(mxn/kWh)">B(mxn/kWh)&nbsp;&nbsp;</label>
                                    <input id="B(mxn/kWh)" type="number" min="0"  class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="I(mxn/kWh)">I(mxn/kWh)&nbsp;&nbsp;&nbsp;</label>
                                    <input id="I(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="P(mxn/kWh)">P(mxn/kWh)&nbsp;&nbsp;</label>
                                    <input id="P(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="inpPagoTransmision">Pago de transmisión&nbsp;&nbsp;</label>
                                    <input id="inpPagoTransmision" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="C(mxn/kW)">C(mxn/kW) &nbsp;&nbsp;&nbsp;</label>
                                    <input id="C(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <label for="D(mxn/kW)">D(mxn/kW)&nbsp;&nbsp;&nbsp;</label>
                                    <input id="D(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div><br>

<!--Scrip que valida que solo se ingresen valores numéricos en las cajas de texto, con un solo punto y máximo 2 decimales.-->
<script type="text/javascript">
    function filterFloat(evt,input){
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value+chark;
        if(key >= 48 && key <= 57) {
            if(filter(tempValue)=== false) {
                return false;
            } else {
                return true;
            }
        } else {
            if(key == 8 || key == 13 || key == 0) {
                return true;              
            } else if(key == 46) {
                if(filter(tempValue)=== false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
    function filter(__val__){
        var preg = /^([0-9]+\.?[0-9]{0,2})$/;
        if(preg.test(__val__) === true) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection