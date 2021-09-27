@extends('roles/seller/cotizador/cotizador')
@section('cotizadores')
<div class="card">
    <div class="card-body container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body row" style="border-left: 3px solid #F9FE39; border-right: 3px solid #F9FE39; border-top: 3px solid #F9FE39; border-bottom: 3px solid #F9FE39;">
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
                        <div class="col-sm-3">
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
                        <div class="col-sm-5">
                            <button id="btnModalAjustePropuesta" class="btn btn-xs" data-toggle="modal" data-target=".bd-modal-aumento-descuento"><img src="https://img.icons8.com/ios-glyphs/24/000000/administrative-tools.png"/></button>
                            <button id="btnAgregados" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".modl-agregados-modal-lg"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M37.84,6.88c-1.89469,0 -3.44,1.54531 -3.44,3.44v110.08h6.88v-106.64h110.08v130.72c0,7.57875 -6.18125,13.76 -13.76,13.76c-7.57875,0 -13.76,-6.18125 -13.76,-13.76v-17.2c0,-1.89469 -1.54531,-3.44 -3.44,-3.44h-103.2c-1.89469,0 -3.44,1.54531 -3.44,3.44v17.2c0,11.34125 9.29875,20.64 20.64,20.64h103.2c11.34125,0 20.64,-9.29875 20.64,-20.64v-134.16c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM20.64,130.72h96.32v13.76c0,5.32125 2.17688,10.09156 5.52281,13.76h-88.08281c-7.57875,0 -13.76,-6.18125 -13.76,-13.76z"></path></g></g></svg> Agregados</button>
                            <button id="calcularCotIndiv" onclick="calcularCotizacionIndividual()" type="button" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="23" height="23" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M32.25,16.125v139.75h107.5v-139.75zM43,26.875h86v118.25h-86zM53.75,37.625v32.25h64.5v-32.25zM64.5,48.375h43v10.75h-43zM59.125,80.625v10.75h10.75v-10.75zM80.625,80.625v10.75h10.75v-10.75zM102.125,80.625v10.75h10.75v-10.75zM59.125,102.125v10.75h10.75v-10.75zM80.625,102.125v10.75h10.75v-10.75zM102.125,102.125v10.75h10.75v-10.75zM59.125,123.625v10.75h10.75v-10.75zM80.625,123.625v10.75h10.75v-10.75zM102.125,123.625v10.75h10.75v-10.75z"></path></g></g></svg> Calcular</button>
                            <button id="generarPDF" onclick="generarEntregable();" class="btn btn-sm btn-info" type="button" disabled><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M24.08,6.88v158.24h123.84v-112.10906l-47.52844,-46.13094zM30.96,13.76h65.36v44.72h44.72v99.76h-110.08zM103.2,19.18875l33.39219,32.41125h-33.39219zM81.76719,68.37c-2.58,0 -5.25406,1.46469 -6.42312,3.64156c-1.1825,2.16344 -1.26313,4.48812 -0.9675,6.90687c0.45687,3.81625 2.19031,8.12969 4.43437,12.55063c-1.11531,3.7625 -1.65281,7.04125 -3.3325,11.05906c-2.13656,5.11969 -4.75687,9.17781 -7.26969,13.4375c-3.27875,1.53187 -7.4175,2.9025 -9.83625,4.48812c-2.71437,1.78719 -4.86437,3.38625 -6.1275,5.92594c-0.61812,1.26313 -0.94062,3.06375 -0.3225,4.68969c0.61813,1.62594 1.90813,2.6875 3.23844,3.37281c2.82188,1.49156 6.07375,0.56438 8.42531,-1.02125c2.35156,-1.58562 4.44781,-3.91031 6.5575,-6.74562c1.06156,-1.43781 1.90813,-3.7625 2.95625,-5.44219c3.37281,-1.49156 5.76469,-3.03688 9.59438,-4.35375c5.17344,-1.78719 9.7825,-2.53969 14.62,-3.58781c4.04469,2.72781 8.34469,4.85094 13.04781,4.85094c2.66063,0 4.71656,-0.12094 6.71875,-1.20937c2.01563,-1.08844 3.225,-3.70875 3.225,-5.71094c0,-1.62594 -0.71219,-3.35937 -1.84094,-4.47469c-1.14219,-1.11531 -2.48594,-1.70656 -3.87,-2.08281c-2.74125,-0.73906 -5.85875,-0.68531 -9.44656,-0.3225c-1.89469,0.20156 -4.43437,1.20938 -6.54406,1.59906c-0.28219,-0.215 -0.55094,-0.30906 -0.83313,-0.55094c-4.28656,-3.69531 -8.30437,-8.80156 -11.2875,-13.88094c-0.17469,-0.30906 -0.14781,-0.52406 -0.3225,-0.83313c0.72563,-2.71437 2.15,-5.87219 2.4725,-8.25062c0.44344,-3.29219 0.5375,-6.16781 -0.25531,-8.80156c-0.40312,-1.31688 -1.075,-2.64719 -2.24406,-3.66844c-1.16906,-1.02125 -2.82188,-1.58563 -4.36719,-1.58563zM81.485,75.22313c0.04031,0 0.1075,0.02687 0.16125,0.04031c0.01344,0.02688 0.04031,0.01344 0.14781,0.34938c0.18812,0.63156 0.08062,2.41875 0.01344,4.00437c-0.08062,-0.40312 -0.55094,-1.15562 -0.59125,-1.51844c-0.20156,-1.59906 0.05375,-2.62031 0.16125,-2.795c0.02688,-0.06719 0.06719,-0.08062 0.1075,-0.08062zM83.56781,99.35688c2.12312,3.05031 4.47469,5.89906 7.10844,8.51937c-3.52062,0.94063 -6.67844,1.27656 -10.22594,2.49938c-0.7525,0.25531 -1.1825,0.61812 -1.92156,0.88687c1.04813,-2.19031 2.35156,-3.81625 3.29219,-6.07375c0.86,-2.05594 1.00781,-3.78937 1.74688,-5.83187z"></path></g></g></svg>Generar</button>
                            <button id="guardarPropuesta" onclick="guardarPropuesta();" type="button" class="btn btn-sm btn-secondary" disabled><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M20.64,10.32c-5.68976,0 -10.32,4.63024 -10.32,10.32v110.08c0,5.68976 4.63024,10.32 10.32,10.32h3.44v-6.88h-3.44c-1.89544,0 -3.44,-1.54456 -3.44,-3.44v-110.08c0,-1.89544 1.54456,-3.44 3.44,-3.44h88.01563l6.88,6.88h9.72875l-12.75219,-12.75219c-0.64328,-0.64672 -1.52059,-1.00781 -2.43219,-1.00781zM61.86625,30.91297c-0.16665,0.00361 -0.33282,0.01933 -0.49719,0.04703h-20.08906c-5.6587,0 -10.32,4.6613 -10.32,10.32v110.08c0,5.6587 4.6613,10.32 10.32,10.32h110.08c5.6587,0 10.32,-4.6613 10.32,-10.32v-89.44c-0.00018,-0.91228 -0.36269,-1.78715 -1.00781,-2.43219l-27.21765,-27.21766c-0.76839,-1.00701 -2.02798,-1.51033 -3.27875,-1.31016h-67.725c-0.19315,-0.03228 -0.3887,-0.04802 -0.58453,-0.04703zM41.28,37.84h17.2v37.84c0,5.6587 4.6613,10.32 10.32,10.32h55.04c5.6587,0 10.32,-4.6613 10.32,-10.32v-32.97563l20.64,20.64v88.01563c0,1.9437 -1.4963,3.44 -3.44,3.44h-17.2v-41.28c0,-5.66037 -4.65963,-10.32 -10.32,-10.32h-55.04c-5.66037,0 -10.32,4.65963 -10.32,10.32v41.28h-17.2c-1.9437,0 -3.44,-1.4963 -3.44,-3.44v-110.08c0,-1.9437 1.4963,-3.44 3.44,-3.44zM65.36,37.84h61.92v37.84c0,1.9437 -1.4963,3.44 -3.44,3.44h-55.04c-1.9437,0 -3.44,-1.4963 -3.44,-3.44zM106.64,44.72v27.52h10.32v-27.52zM68.8,110.08h55.04c1.90763,0 3.44,1.53237 3.44,3.44v41.28h-61.92v-41.28c0,-1.90763 1.53237,-3.44 3.44,-3.44zM44.72,141.04v6.88h6.88v-6.88zM141.04,141.04v6.88h6.88v-6.88z"></path></g></g></svg>Guardar</button>
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
                                                <label>Descuento</label>
                                                <input id="inpSliderDescuento" type="range" min="0" max="100" class="slider" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta();">
                                                <output id="rangeValueDescuento"></output>%
                                            </div>
                                            <div class="form-group">
                                                <label>Aumento</label>
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
                                @foreach($vPaneles as $details)
                                    <option value="{{ $details->idPanel }}">{{ $details->vNombreMaterialFot }}</option>
                                @endforeach
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
                                <option selected value="-1">Elige una opción:</option>
                                @foreach($vInversores as $details)
                                    <option value="{{ $details->idInversor }}" >{{ $details->vNombreMaterialFot }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mn-1">Cantidad inversores:</label>
                            <input class="form-control input-sm inputResult" type="number" id="inpCantInversores" disabled>
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
                                @foreach($vEstructuras as $estructura)
                                    <option value="{{ $estructura->idEstructura }}" >{{ $estructura->vMarca }}</option>
                                @endforeach
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
@endsection