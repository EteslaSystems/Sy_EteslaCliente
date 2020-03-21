<?php $__env->startSection('cotizadores'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 fx-1">
                    <p class="label-mn-1 mn-1">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAA0UlEQVRIie2TQQ6CMBBFR2NYeIaydW04hguiEa/ALTyIB+AALpQD4R1YPjfTOCFEkJYYE/9q+G3/n1+mIhEAZLyQxdD0wjmwAa7G4KpcHip+YhjFMsBjb+qbiDgRSUWkNvzBdrQDmhFdrXV/ArTKOaOTKtcCiU1w0S7mgW/vg/2VSXUHnHZfG74KMShGXOdxsoGeGT+mUwzM2eGHFmLwDiHvoBfAFjj3LURJ0NWJnqCL3zdYmfohIi7SJDW+sAlKuxAoXvqPxRyzbzH7P/jj+3gC21tbAVnmKgUAAAAASUVORK5CYII=">
                        <strong class="d-none d-sm-block d-md-block d-xl-block">&nbsp; Datos de Consumo</strong>
                        <strong class="d-block d-sm-none d-md-none d-xl-none">&nbsp; Consumo</strong>
                    </p>
                </div>
                
                <div class="col-6 fx-1">
                    <div class="btn-group mn-2">
                        <button type="button" class="btn btn-primary btn-sm" onclick="GDMTO()">GDMTO</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="GDMTH()">GDMTH</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="container-fluid" id="divGDMTO">
                <div class="row">
                    <div class="col-12 col-sm-12 offset-sm-3 col-md-5 offset-md-7">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-5 col-md-4 offset-md-3 pa-ma-1">
                                    <div class="row">
                                        <div class="col-4 offset-2 col-sm-5 offset-sm-2 col-md-6 offset-md-1 fx-1 pa-ma-2">
                                            <label class="mn-1">Periodo(s)</label>
                                        </div>

                                        <div class="col-4 col-sm-4 col-md-4 fx-1 pa-ma-2" id="lblNombreCliente">
                                            <select class="custom-select my-1 mn-1" name="numPeriodos" id="lstPeriodosGDMTO">
                                                <option disabled selected value="-1">0</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
<<<<<<< HEAD

                                <div class="col-12 col-sm-7 col-md-5 fx-1 pa-ma-1">
=======
                                <div class="col-12 col-sm-7 col-md-7 fx-1 pa-ma-1">
>>>>>>> 76c890071dbff4592db9ec61a126331899cb93a6
                                    <div class="btn-group btn-group-lg mn" role="group">
                                        <button id="btnAgregarPeriodoGDMTO" class="btn btn-info" onclick="agregarPeriodo();" title="agregar periodo de consumo">
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M43,14.33333c-7.88333,0 -14.33333,6.45 -14.33333,14.33333v114.66667c0,7.88333 6.45,14.33333 14.33333,14.33333h86c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-86l-43,-43zM43,28.66667h51.39844l34.60156,34.60156v80.0651h-86zM78.83333,64.5v21.5h-21.5v14.33333h21.5v21.5h14.33333v-21.5h21.5v-14.33333h-21.5v-21.5z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnEditarPeriodoGDMTO" class="btn btn-warning" onclick="#" title="editar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M28.66667,14.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM57.33333,43c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM86,71.66667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v57.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h37.0651l-14.33333,-14.33333h-22.73177v-57.33333h57.33333v22.73177l14.33333,14.33333v-37.0651c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM107.5,107.5v14.33333l36.88314,36.88314l14.33333,-14.33333l-36.88314,-36.88314zM163.78353,149.4502l-14.33333,14.33333l7.16667,7.16667c1.3975,1.3975 3.66956,1.3975 5.06706,0l9.26628,-9.26628c1.3975,-1.40467 1.3975,-3.66956 0,-5.06706z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnEliminarPeriodoGDMTO" class="btn btn-danger" onclick="#" title="eliminar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M71.66667,14.33333l-7.16667,7.16667h-35.83333v14.33333h7.16667v107.5c0,7.83362 6.49972,14.33333 14.33333,14.33333h57.33333v-14.33333h-57.33333v-107.5h71.66667v71.66667h14.33333v-71.66667h7.16667v-14.33333h-7.16667h-28.66667l-7.16667,-7.16667zM64.5,50.16667v78.83333h14.33333v-78.83333zM93.16667,50.16667v78.83333h14.33333v-78.83333zM128.13216,121.32943l-10.13411,10.13411l15.20117,15.20117l-15.20117,15.20117l10.13411,10.13411l15.20117,-15.20117l15.20117,15.20117l10.13411,-10.13411l-15.20117,-15.20117l15.20117,-15.20117l-10.13411,-10.13411l-15.20117,15.20117z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnActualizarPeriodoGDMTO" class="btn btn-primary" onclick="#" title="actualizar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M86,21.5c-19.61127,0 -37.15804,8.82697 -48.97689,22.68978l-15.52311,-15.52311v43h43l-17.25879,-17.25879c9.1948,-11.28751 23.09893,-18.57454 38.75879,-18.57454c27.65617,0 50.16667,22.50333 50.16667,50.16667h14.33333c0,-35.561 -28.93183,-64.5 -64.5,-64.5zM21.5,86c0,35.56817 28.93183,64.5 64.5,64.5c19.61127,0 37.15804,-8.82697 48.97689,-22.68978l15.52311,15.52311v-43h-43l17.25879,17.25879c-9.1948,11.28751 -23.09893,18.57455 -38.75879,18.57455c-27.65617,0 -50.16667,-22.5105 -50.16667,-50.16667z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpIkWhGDMTO" class="mn-1">I (kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpIkWhGDMTO" name="I(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="I(mxn/kWh)GDMTO" class="mn-1">I (mxn/kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="I(mxn/kWh)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpPagoTransmisionGDMTO" class="mn-1">P. transmisión</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpPagoTransmisionGDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpIkwGDMTO" class="mn-1">I (kw)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpIkwGDMTO" name="I(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="C(mxn/kW)GDMTO" class="mn-1">C (mxn/kW)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="C(mxn/kW)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="D(mxn/kW)GDMTO" class="mn-1">D (mxn/kW)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                               <input id="D(mxn/kW)GDMTO" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" id="divGDMTH" style="display:none;">
                <div class="row">
                    <div class="col-12 col-sm-12 offset-sm-3 col-md-5 offset-md-7">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-5 col-md-4 offset-md-3 pa-ma-1">
                                    <div class="row">
                                        <div class="col-4 offset-2 col-sm-5 offset-sm-2 col-md-6 offset-md-1 fx-1 pa-ma-2">
                                            <label class="mn-1">Periodo(s)</label>
                                        </div>

                                        <div class="col-4 col-sm-4 col-md-4 fx-1 pa-ma-2" id="lblNombreCliente">
                                            <select class="custom-select my-1 mn-1" name="numPeriodos" id="lstPeriodosGDMTH">
                                                <option selected>1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-7 col-md-5 fx-1 pa-ma-1">
                                    <div class="btn-group btn-group-lg mn" role="group">
                                        <button id="btnAgregarPeriodo" class="btn btn-info" onclick="agregarPeriodo();" title="agregar periodo de consumo">
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M43,14.33333c-7.88333,0 -14.33333,6.45 -14.33333,14.33333v114.66667c0,7.88333 6.45,14.33333 14.33333,14.33333h86c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-86l-43,-43zM43,28.66667h51.39844l34.60156,34.60156v80.0651h-86zM78.83333,64.5v21.5h-21.5v14.33333h21.5v21.5h14.33333v-21.5h21.5v-14.33333h-21.5v-21.5z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnEditarPeriodo" class="btn btn-warning" onclick="#" title="editar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M28.66667,14.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM57.33333,43c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v71.66667h14.33333v-71.66667h71.66667v-14.33333zM86,71.66667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v57.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h37.0651l-14.33333,-14.33333h-22.73177v-57.33333h57.33333v22.73177l14.33333,14.33333v-37.0651c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM107.5,107.5v14.33333l36.88314,36.88314l14.33333,-14.33333l-36.88314,-36.88314zM163.78353,149.4502l-14.33333,14.33333l7.16667,7.16667c1.3975,1.3975 3.66956,1.3975 5.06706,0l9.26628,-9.26628c1.3975,-1.40467 1.3975,-3.66956 0,-5.06706z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnEliminarPeriodo" class="btn btn-danger" onclick="#" title="eliminar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M71.66667,14.33333l-7.16667,7.16667h-35.83333v14.33333h7.16667v107.5c0,7.83362 6.49972,14.33333 14.33333,14.33333h57.33333v-14.33333h-57.33333v-107.5h71.66667v71.66667h14.33333v-71.66667h7.16667v-14.33333h-7.16667h-28.66667l-7.16667,-7.16667zM64.5,50.16667v78.83333h14.33333v-78.83333zM93.16667,50.16667v78.83333h14.33333v-78.83333zM128.13216,121.32943l-10.13411,10.13411l15.20117,15.20117l-15.20117,15.20117l10.13411,10.13411l15.20117,-15.20117l15.20117,15.20117l10.13411,-10.13411l-15.20117,-15.20117l15.20117,-15.20117l-10.13411,-10.13411l-15.20117,15.20117z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>

                                        <button id="btnActualizarPeriodo" class="btn btn-primary" onclick="#" title="actualizar periodo de consumo" disabled>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#ffffff">
                                                            <path d="M86,21.5c-19.61127,0 -37.15804,8.82697 -48.97689,22.68978l-15.52311,-15.52311v43h43l-17.25879,-17.25879c9.1948,-11.28751 23.09893,-18.57454 38.75879,-18.57454c27.65617,0 50.16667,22.50333 50.16667,50.16667h14.33333c0,-35.561 -28.93183,-64.5 -64.5,-64.5zM21.5,86c0,35.56817 28.93183,64.5 64.5,64.5c19.61127,0 37.15804,-8.82697 48.97689,-22.68978l15.52311,15.52311v-43h-43l17.25879,17.25879c-9.1948,11.28751 -23.09893,18.57455 -38.75879,18.57455c-27.65617,0 -50.16667,-22.5105 -50.16667,-50.16667z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpBkWh" class="mn-1">B (kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpBkWh" name="B(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpIkWh" class="mn-1">I (kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpIkWh" name="I(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpPkWh" class="mn-1">P (kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpPkWh" name="P(kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpBkw" class="mn-1">B (kw)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpBkw" name="B(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpIkw" class="mn-1">I (kw)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpIkw" name="I(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpPkw" class="mn-1">P (kw)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                               <input id="inpPkw" name="P(kw)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="sec-tittle">
                    <h2 class="linea">
                        <span>Pago CFE</span>
                    </h2>
                </div>

                <br>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="B(mxn/kWh)" class="mn-1">B (mxn/kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="B(mxn/kWh)" type="number" min="0"  class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="I(mxn/kWh)" class="mn-1">I (mxn/kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="I(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="P(mxn/kWh)" class="mn-1">P (mxn/kWh)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="P(mxn/kWh)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="inpPagoTransmision" class="mn-1">P. transmisión</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="inpPagoTransmision" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="C(mxn/kW)" class="mn-1">C (mxn/kW)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="C(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label for="D(mxn/kW)" class="mn-1">D (mxn/kW)</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <input id="D(mxn/kW)" type="number" min="0" class="form-control" onkeypress="return filterFloat(event,this);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col fx-1">
                    <p class="label-mn-1 mn-1">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABYklEQVRIia2Vzy4DURTGR20o3bUNj8EWLbtuiTehsWBD43mIJfUKJe3CQldddkVJrPhZ+IaT6cz9M/ElN5M59/tz7s3kTJJEACFGU4khl8FcALBc1syrBY6BJ2C9hHkDGAJnhenASNc8AhqR5labfxKgKUI/JanWAx6Ad60BcJE2oeb60jZ93dSN+SEwoxivwIEJqYeeOjX/ktEV0AZWtHaBa+19AvvBxuZa0s67Dt6JOC+x3ffSzgO4N+KexwQ8StQO4O6JOygi/MLU3lRaDQioiTvL8ywaFYt6LvkCDCfXq7JgYOrPem4EBGxmNEmB5x+Ark5463MH7nxfW56oBkwl7Dl4l+JMgVpwgMTbwIcM7oGW2WuphjhbMcZ2VLSAcc5XlmIM7KjmHxXkD7uqI6BqzN3DDse4Lgow78Hj+oifH85apu4MMCFD4NR3TXPpwIR5TEK0QQA6mZAJ0Cll9t/4BhPIk1gbmCnaAAAAAElFTkSuQmCC">
                        <strong class="d-none d-sm-block d-md-block d-xl-block">&nbsp; Media tensión (Configuración)</strong>
                        <strong class="d-block d-sm-none d-md-none d-xl-none">&nbsp; Media tensión</strong>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label class="mn-1">Seleccionar panel</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <select class="form-control">
                                    <option disabled selected>Elige una opción:</option>
                                    <?php $__currentLoopData = $vPaneles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($details->idPanel); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4 fx-1">
                                <label class="mn-1">Seleccionar inversor</label>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 pa-ma-3">
                                <select class="form-control" id="">
                                    <option disabled selected>Elige una opción:</option>
                                    <?php $__currentLoopData = $vInversores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($details->idInversor); ?>"><?php echo e($details->vNombreMaterialFot); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12 col-sm-11 text-right">
            <button onclick="enviarPeriodos()" class="btn btn-success"><strong>Calcular</strong></button>
        </div>
    </div>

    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller/cotizador/cotizador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/mediaTension.blade.php ENDPATH**/ ?>