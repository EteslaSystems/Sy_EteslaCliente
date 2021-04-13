$(document).ready(function(){
    sessionStorage.clear();
    sessionStorage.setItem("bndPropuestaEditada", 0);
});


/*#region Datos*/
async function calcularPropuestaBT(e, dataEdite){ ///Main()
    sessionStorage.setItem("tarifaMT", null);
    let dataEdited = dataEdite || null;
    let data = null; //DATA de la propuesta a calcular

    //Se valida si la propuesta a realizar es una NUEVA o AJUSTADA(modificada)
    if(dataEdited === null){
        //Se obtienen los datos de la propuesta
        let dataPropuesta = cacharDatosPropuesta();

        if(typeof dataPropuesta != "undefined"){
            data = dataPropuesta;
        }
        else{
            e.preventDefault();
        }
    }

    if(dataEdited === null){ //Cotizacion nueva
        /* Enviar Propuesta - Manipular resultado */
        await pintarVistaDeResultados();

        _combinaciones = await obtenerCombinaciones(data);
        await vaciarCombinaciones(_combinaciones);
        
        _cotizacion = await enviarCotizacion(data); //Se obtienen paneles
        vaciarRespuestaPaneles(_cotizacion);
        
        ///EXPERIMENTAL
        mostrarPanelSeleccionado();
        ///EXPERIMENTAL
    }
    else{ //Cotizacion ajustada
        dataPropuesta = cacharDatosPropuesta();
        dataPropuesta.porcentajePropuesta = dataEdited.porcentajePropuesta;
        dataPropuesta.porcentajeDescuento = dataEdited.porcentajeDescuento;
        data = dataPropuesta;

        ///Enviar propuesta AJUSTADA
        _cotizacionAjustada = await enviarCotizacion(data);
        vaciarRespuestaPaneles(_cotizacionAjustada);
    }
}

/*#region Solicitudes al Servidor*/
function enviarCotizacion(data){ //Paneles
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: data,
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status == '500'){
                    reject('Error al intentar ejecutar su propuesta!');
                }
                else{
                    //#region Formating
                    respuesta = respuesta.message;
                    ////#endregion
                    sessionStorage.setItem("_consumsFormated",JSON.stringify(respuesta[0]));
                    sessionStorage.setItem("_respPaneles",JSON.stringify(respuesta));

                    resolve(respuesta);
                }
            },
            error: function(){
                reject('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
            }
        });
    });
}

function obtenerInversoresParaPanelSeleccionado(panelSeleccionado){ //Inversores
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/inversoresSelectos',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                "objPanelSelect": panelSeleccionado
            },
            dataType: 'json',
            success: function(_inversores){
                resolve(_inversores);
            },
            error: function(){
                reject('Hubo un error al intentar obtener los inversores para el panel seleccionado');
            }
        });
    });
}

function pintarVistaDeResultados(){
    new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'GET',
            url: '/resultados',
            success: resultView => {
                resolve(resultView);
            },
            error: error => {
                error = 'Al parecer hubo un error al intentar cargar vista de resultados';
                reject(error);
            }
        })
        .then(vistaResultados => {
            $('#divCotizacionBajaTension').css("display","none");
            $('#divBtnCalcularBT').css("display","none");
            $('#divResultCotizacionBT').css("display","");
            $('#divResult_bt').html(vistaResultados);
        })
        .catch(error => {
            alert(error);
        });
    });
}

function obtenerCombinaciones(data){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/askCombinations',
            data: data,
            dataType: 'json',
            success: function(result){
                resolve(result);
            },
            error: function(error){
                reject('Hubo un error al intentar procesar combinaciones: '+error);
            }
        });
    });
}

function calcularViaticosBT(objInversor){
    let _cotizarViaticos = [];
    //Datos de la propuesta (consumos, direccion, tarifa)
    let datosPropuesta = cacharDatosPropuesta();
    //Equipos seleccionados
    let sspanel = sessionStorage.getItem('__ssPanelSeleccionado');
    let ssinversor = '';
    let consumptions = sessionStorage.getItem("_consumsFormated"); ///Consumos formateados -> promedioMensual,Bimestral,Anual,etc
    consumptions = JSON.parse(consumptions);
    consumptions = consumptions.consumo;
    let descuento = 0;

    let bndPropuestaNueva = sessionStorage.getItem("bndPropuestaEditada");

    if(bndPropuestaNueva === '1'){ //Propuesta modificada
        descuento = sessionStorage.getItem("descuentoPropuesta");
    }

    if(objInversor == null){
        ssinversor = sessionStorage.getItem('__ssInversorSeleccionado');
    }
    else{
        ssinversor = objInversor;
    }

    objEquiposSeleccionados = { panel: sspanel, inversor: ssinversor, descuento };
    _cotizarViaticos[0] = objEquiposSeleccionados;

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/calcularViaticosBTI',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                "idCliente": datosPropuesta.idCliente,
                "arrayBTI": _cotizarViaticos,
                "direccionCliente": datosPropuesta.direccionCliente,
                "consumos": consumptions,
                "tarifa": datosPropuesta.tarifa,
                "descuentoPropuesta": descuento
            },
            dataType: 'json',
            success: function(resultViaticos){
                //Se limpia el storage
                sessionStorage.removeItem('answPropuesta');
                
                //Se llena el storage
                sessionStorage.setItem('answPropuesta',JSON.stringify(resultViaticos.message));
                resolve(resultViaticos);
            },
            error: function(error){
                reject('Se produjo un error al intentar calcular viaticos: '+error);
            }
        });
    });
}
/*#endregion*/
/*#endregion*/
/*#region Logica*/
function cacharDatosPropuesta(){
    let banderaDelError = 0; //Bandera para validar si en algun proceso hubo un error
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');

    let _consumosBimestres = () => {
        __consumosBimestres = [];

        for(var i=0; i<6; i++)
        {
            consumos = $('#men-val-'+(i+1).toString()).val() || null;

            if(validarPeriodoVacio(consumos) === true){
                __consumosBimestres[i] = consumos;
            }
            else{
                banderaDelError = 1;
                break;
            }
        }

        return __consumosBimestres;
    };
    let direccionCliente = () => {
        direc = $('#municipio').val() || null;

        if(direc.length>0){
            return direc;
        }
        else{
            banderaDelError = 1;
            alert('Falta cargar un cliente!');
        }
    };

    var tarifaSeleccionada = $('#tarifa-actual').val();
    _consumosBimestres = _consumosBimestres();
    direccionCliente = direccionCliente();

    if(banderaDelError != 1){
        datosPropuesta = {
            idCliente: idCliente,
            consumos: _consumosBimestres,
            tarifa: tarifaSeleccionada,
            direccionCliente: direccionCliente,
            porcentajePropuesta: 0,
            porcentajeDescuento: 0
        };

        return datosPropuesta;
    }

    return undefined;
}
/*---------------------------------*/

function backToCotizacionBT(){
    $("#divCotizacionBajaTension").css("display","");
    $("#divBtnCalcularBT").css("display","");
    $("#divResultCotizacionBT").css("display","none");
    $("#btnGuardarPropuesta").prop("disabled", false);
}

function limpiarCampos(){
    $('.inpAnsw').text("").val("");
}

function activarDesactivarBotones(equipo,habilidad){
    /*1er - N
     * 0 - Paneles
     * 1 - Inversores
     * /*2do - N
     ******* 0 - Desactivado
     ******* 1 - Activado
    */

    if(equipo = 1){
        if(habilidad = 0){
            $('#divTotalesProject').css("display",""); //???
    
            //Se bloquean botones de GenerarPDF y GuardarPropuesta
            $('#btnGuardarPropuesta').prop("disabled", true);
            $('#btnGenerarEntregable').prop("disabled", true);
         
            //Panel de ajuste de cotizacion - Desaparece
            $('#btnModalAjustePropuesta').attr("disabled",true);
         
            //Check Inversor-Modelos
            $('#chckModelosInversor').attr("disabled",true);
        }
        else{
            //Se desbloquea boton de -PanelAjustePropuesta-
            $('#listInversores').prop("disabled", false);
            
            //Se desbloquean botones de GenerarPDF y GuardarPropuesta
            $('#btnGuardarPropuesta').prop("disabled", false);
            $('#btnGenerarEntregable').prop("disabled", false);

            //Check Inversor-Modelos
            $('#chckModelosInversor').attr("disabled",false);
        }
    }
}

function limpiarResultados(limpiaResult){
    /* 0 - paneles
    1 - inversores */

    if(limpiaResult == 0){
        /*Limpiar panel_result*/
        $('#inpPotencia').val('');
        $('#inpCantidadPaneles').val('');
        $('#inpModeloPanel').val('');
        $('#inpConsumoMensual').val('');
    }
    else{
        /*Limpiar inversor_result*/
        $('#inpCostTotalInversores').val('');
        $('#potenciaInversor').val('');
        $('#potenciaNominalInv').val('');
        $('#precioInv').val('');
        $('#potenciaMaximaInv').val('');
        $('#cantidadInversores').val('');
        $('#potenciaPicoInv').val('');
        $('#porcentajeSobreDim').val('');
        $('#costoTotalInversores').val('');
        
        /*Limpiar inputs de viaticos - totales*/
        $('#inpCostoTotalViaticos').val('');

        $('#inpPrecio').val('');
        $('#inpPrecioIVA').val('');
        $('#inpPrecioMXN').val('');

        //Consumo Result
        $('#inpConsumoMensual').val('');
        $('#inpGeneracionMensual').val('');
        $('#inpNuevoConsumoMensual').val('');
        $('#inpPorcentGeneracion').val('');

        //CostosTotales Result
        $('#inpCostProyectoSIVA').val('');
        $('#inpCostProyectoCIVA').val('');
        $('#inpCostPorWatt').val('');
        $('#inpCostProyectoMXN').val('');
    }
}
/*#endregion*/
/*#region Validaciones*/
function validarPeriodoVacio(periodo){
    if(periodo != null){
        return true;
    }
    else{
        alert('Periodos incompletos');
    }
}
/*#endregion*/
/*#region Controles*/

/*#region Equipos seleccionados*/
function vaciarRespuestaPaneles(resultPaneles){
    var dropDownListPaneles = $('#listPaneles');

    //Habilita lista de paneles
    dropDownListPaneles.attr("disabled", false);

    //Limpiar dropdownlist
    limpiarDropDownListPaneles();

    //DropDownList-Paneles
    for(var i=1; i<resultPaneles.length; i++)
    {
        dropDownListPaneles.append(
            $('<option/>', {
                value: i,
                text: resultPaneles[i].panel.nombre
            })
        );
    }
}

function vaciarRespuestaInversores(resultInversores){ ///Se vacian MARCAS
    let dropDownListInversores = $('#listInversores');

    let InversoresGroupByMerch = (_inversores) => { //Retorna un objeto
        let invGroupByMerche = [];
        
        invGroupByMerche = _inversores.reduce((objMarca, objInversor) => {
            objMarca[objInversor.vMarca] = (objMarca[objInversor.vMarca] || []).concat(objInversor);
            return objMarca;
        },{});

        return invGroupByMerche;
    };

    //Se obtiene las marcas de los inversores
    InversoresGroupByMerch = InversoresGroupByMerch(resultInversores);
    ///Lo guardamos en un sessionStorage para futura implementacion
    sessionStorage.setItem('InversoresGroupByMerch', JSON.stringify(InversoresGroupByMerch));

    //Limpiar dropdownlist
    limpiarDropDownListInversores();

    //Activar lista de inversores
    dropDownListInversores.attr("disabled", false);

    //DropDownList-Paneles
    for(let marca in InversoresGroupByMerch)
    {
        dropDownListInversores.append(
            $('<option/>', {
                value: marca.toString(),
                text: marca.toString()
            })
        );
    }
}

function vaciarModelosInversores(){
    let listModelosInversores = $('#listModelosInversor');
    let marcaSeleccionada = $('#listInversores').val();

    /*#region Formating _respuestaInversores*/
    let _inversores = sessionStorage.getItem('_respInversores');
    _inversores = JSON.parse(_inversores);
    /*#endregion*/

    limpiarDropDownListModelosInversores();

    for(let i=0; i<_inversores.length; i++)
    {
        if(_inversores[i].vMarca === marcaSeleccionada){
            listModelosInversores.append(
                $('<option/>', {
                    value: _inversores[i].vNombreMaterialFot,
                    text: _inversores[i].vNombreMaterialFot
                })
            );
        }
    }
}

function mostrarPanelSeleccionado(){
    let ddlPaneles = $('#listPaneles');

    $('#listPaneles').change(async function(){
        let ddlPanelesValue = parseInt(ddlPaneles.val());
        limpiarCampos();

        if(ddlPanelesValue === '-1'  || ddlPanelesValue === -1 || typeof ddlPanelesValue === "undefined" ){
            //Se limpian results de result_paneles
            $('#listInversores').prop("disabled", true);
        }
        else{
            /*#region Formating _respuestaPaneles*/
            _paneles = sessionStorage.getItem('_respPaneles');
            _paneles = JSON.parse(_paneles);
            /*#endregion*/
    
            _potenciaReal = _paneles[ddlPanelesValue].panel.potenciaReal;
    
            $('#inpMarcaPanelS').val(_paneles[ddlPanelesValue].panel.marca);
    
            //Consumos
            let promedioConsumoMensual = _paneles[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
            $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
            
            //Pintada de resultados - Paneles
            $('#inpCantidadPaneles').val(_paneles[ddlPanelesValue].panel.noModulos);
            $('#inpModeloPanel').val(_paneles[ddlPanelesValue].panel.nombre);
            $('#inpMarcaPanel').val(_paneles[ddlPanelesValue].panel.marca);
            $('#inpPotencia').val(_paneles[ddlPanelesValue].panel.potenciaReal + 'Kw');
    
            //Equipo seleccionado - Panel seleccionado
            sessionStorage.setItem('__ssPanelSeleccionado',JSON.stringify(_paneles[ddlPanelesValue].panel));
            
            /////EXPERIMENTAL
            let potenciaNecesaria = sessionStorage.getItem("_consumsFormated");
            ///EXPERIMENTAL


            //Create objRequest to Calculate Inversores
            let objRequest = { panel: _paneles[ddlPanelesValue], potenciaNecesaria: potenciaNecesaria };

            //Se carga dropDownList -Inversores-
            let _inversores = await obtenerInversoresParaPanelSeleccionado(objRequest);
            _inversores = _inversores.message; //Formating
            sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));
            
            ///EXPERIMENTAL
            mostrarInversorSeleccionado();
            mostrarInversorModeloSeleccionado();

            vaciarRespuestaInversores(_inversores); //:void() = Se pintan las marcas de los inversores
            let objInversorCB = getInversorCostoBeneficio(0); //Se obtiene la mejor opcion 'Costo-Beneficio'
            
            //Se selecciona MARCA en el dropDownListInversoresMarca
            $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
            
            vaciarModelosInversores(); //:void() = Se pitan los modelos de la marca seleccionada

            //Se selecciona MODELO en el dropDownListInversoresModelos
            $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);
            let _viaticos = await calcularViaticosBT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void() =
            ///EXPERIMENTAL
        }
    });
}

function limpiarDropDownListPaneles(){
    //Se borran los options
    $('#listPaneles option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function mostrarInversorSeleccionado(){
    let ddlInversores = $('#listInversores');

    ddlInversores.on("change", async function(){
        let ddlInversoresValue = ddlInversores.val(); //Marca del Inversor

        limpiarResultados(1);
        limpiarDropDownListModelosInversores();
    
        if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
            activarDesactivarBotones(1,0); //Se desactivan controles
        }
        else{
            activarDesactivarBotones(1,1); //Se activan controles
    
            let objInversorCB = getInversorCostoBeneficio(1);
            $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
            vaciarModelosInversores();
            $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);
            let _viaticos = await calcularViaticosBT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void() =
        }
    });
}

function mostrarInversorModeloSeleccionado(){
    let ddlModelosInversor = $('#listModelosInversor');

    ddlModelosInversor.on('change', async function(){
        let valueListModlsInv = ddlModelosInversor.val(); //Nombre - Modelo de inversor
        let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
        
        limpiarResultados(1);

        if(valueListModlsInv != '-1' || valueListModlsInv != -1){
            let inversorFiltrado = searchInversor(_inversors,valueListModlsInv);
            let _viatico = await calcularViaticosBT(inversorFiltrado);
            mostrarRespuestaViaticos(_viatico);
        }
    });
}

function searchInversor(_inversor,marcaInv){
    let Result = {};
    
    for(let i=0; i<_inversor.length; i++)
    {
        if(_inversor[i].vNombreMaterialFot == marcaInv){
            Result = _inversor[i];
        }
    }

    return Result;
}

function getInversorCostoBeneficio(banderaMarcaSelected){ ///Retorna un objeto
    // let oldPower=0, newPower=0;
    let oldCost=0, newCost=0;
    let Respuesta = {};
    let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));

    if(banderaMarcaSelected == 1){ ///La marca fue seleccionada por el usuario
        let marcaSeleccionada = $('#listInversores').val();
        let newInversoresFiltered = [];

        $.each(_inversors, function(i, inversor){
            if(inversor.vMarca == marcaSeleccionada){
                newInversoresFiltered.push(inversor);
            }
        });
        
        _inversors = newInversoresFiltered;
    }

    //Se requiere el inversor con mayor potencia
    for(let i=0; i<_inversors.length; i++)
    {
        if(i === 0){
            oldCost = _inversors[i].precioTotal;
        }
        else{
            newCost = _inversors[i].precioTotal;
        }

        if(oldCost >= newCost){ ///El costo mas -barato-
            oldCost = newCost;
            Respuesta = _inversors[i];
        }

    }

    return Respuesta;
}

function limpiarDropDownListInversores(){
    //Se borran los options
    $('#listInversores option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function limpiarDropDownListModelosInversores(){
    //Se borran los options
    $('#listModelosInversor option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function mostrarRespuestaViaticos(_viatics){ ///Pintar resultados de inversores, totales, power, viaticos, etc
    let _viaticos = _viatics.message;

    console.log(_viaticos);

    sessionStorage.removeItem("ssViaticos");
    sessionStorage.setItem("ssViaticos", JSON.stringify(_viaticos));
    
    /*#region Formating*/
    let objResp = sessionStorage.getItem("_consumsFormated");
    objResp = JSON.parse(objResp);
    /*#endregion*/

    //Se pintan resultados de inversores
    //Se cargan los inputs de la vista
    $('#inpCostTotalInversores').val(_viaticos[0].inversores.precioTotal);

    //Inversores  - /Tabla_oculta\
    if(_viaticos[0].inversores.combinacion === "true" || _viaticos[0].inversores.combinacion === true){
        $('#cantidadInversores').val('QS1: '+_viaticos[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+_viaticos[0].inversores.numeroDeInversores.invSoportMen);
        $('#inpCantidadInvers').val('QS1: '+_viaticos[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+_viaticos[0].inversores.numeroDeInversores.invSoportMen);
    }
    else{
        $('#cantidadInversores').val(_viaticos[0].inversores.numeroDeInversores);
        $('#inpCantidadInvers').val(_viaticos[0].inversores.numeroDeInversores);
    }

    $('#potenciaInversor').val(_viaticos[0].inversores.fPotencia);
    $('#potenciaMaximaInv').val(_viaticos[0].inversores.iPMAX);
    $('#potenciaNominalInv').val(_viaticos[0].inversores.potenciaNominal);
    $('#potenciaPicoInv').val(_viaticos[0].inversores.potenciaPico);
    $('#porcentajeSobreDim').val(_viaticos[0].inversores.porcentajeSobreDimens);
    $('#precioInv').val(_viaticos[0].inversores.fPrecio); 
    $('#costoTotalInversores').val(_viaticos[0].inversores.precioTotal);
        
        
    ///Pintada de resultados - Inversor
    $('#inpModeloInversor').val(_viaticos[0].inversores.vNombreMaterialFot);

    //Se pintan los resultados del calculo de viaticos
    let generacionMensual = '';
    let nuevoConsumoBimestral = '';
    let promedioConsumoMensual = objResp.consumo._promCons.consumoMensual.promedioConsumoMensual;

    if(_viaticos[0].power.generacion.promedioDeGeneracion){
        generacionMensual = _viaticos[0].power.generacion.promedioDeGeneracion;

        if(_viaticos[0].power.nuevosConsumos.promedioConsumoBimestral){
            nuevoConsumoBimestral = _viaticos[0].power.nuevosConsumos.promedioConsumoBimestral;
        }
    }
    else{
        generacionMensual = _viaticos[0].power.generacion.promedioGeneracionMensual;
    }

    $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#inpPorcentGeneracion').val(_viaticos[0].power.porcentajePotencia + '%');

    $('#inpCostProyectoSIVA').val(_viaticos[0].totales.precio + '$');
    $('#inpCostProyectoCIVA').val(_viaticos[0].totales.precioMasIVA + '$');
    $('#inpCostPorWatt').val(_viaticos[0].totales.precio_watt + '$');
    $('#inpCostProyectoMXN').val('$' +_viaticos[0].totales.precioMasIVAMXN);
    
    //Se pintan los resultados del roi
    $('#inpPagoAnteriorProm').val('$'+_viaticos[0].roi.consumo.consumoBimestralPesosMXN);
    $('#inpPagoNuevoProm').val('$'+_viaticos[0].roi.generacion.nuevoPagoBimestral);
    $('#inpAhorroMensual').val('$'+_viaticos[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#inpAhorroAnual').val('$'+_viaticos[0].roi.ahorro.ahorroAnualEnPesosMXN);
    
    ///Porcentaje de propuesta que aparece en el panelAjustePropuesta
    $('#inpSliderPropuesta').val(_viaticos[0].power.porcentajePotencia);
    $('#rangeValuePropuesta').val(_viaticos[0].power.porcentajePotencia);
    //Porcentaje de descuentoPropuesta que aparece en el panelAjustePropuesta
    $('#inpSliderDescuento').val(_viaticos[0].descuento);
    $('#rangeValueDescuento').val(_viaticos[0].descuento);
}
/*#endregion*/
/*#region Combinaciones*/
async function vaciarCombinaciones(resultCombinacione){
    let resultCombinaciones = resultCombinacione.message; //Formating
    resultCombinaciones = resultCombinaciones[0]; //ArrayCombinaciones

    //Guardar en un SessionStorage el ArrayCombinaciones
    sessionStorage.setItem("arrayCombinaciones", JSON.stringify(resultCombinaciones));

    //Se llena la lista desplegable de *combinaciones*
    llenarListaDesplegableCombinaciones(resultCombinaciones); //AJAX - request


    //Se pintan las combinaciones en el *modal_combinaciones*
    vaciarCombinacionesEnModal(resultCombinaciones); //AJAX - request
}

function llenarListaDesplegableCombinaciones(combinaciones){
    let ddlCombinaciones = $('#listConvinaciones');

    $('#listConvinaciones').prop("disabled", false); //Se desbloquea DropDownList-Combinaciones
    $('#btnDivCombinaciones').prop("disabled", false);//Se desbloquea boton-divCombinaciones

    //DropDownList de combinaciones
    ddlCombinaciones.on('change', function(){
        var valueOfListCombinaciones = ddlCombinaciones.val();

        switch(valueOfListCombinaciones)
        {
            case 'optConvinacionOptima'://Optima
                //tipo_combinacion
                $('#inpTipoCombinacion0').val("optima");//Input oculto - combinacion_mediana
                //Page1_Result
                $('#inpPotencia').val(combinaciones.combinacionOptima[0].paneles.potenciaReal + 'kW');
                $('#inpMarcaPanelS').val(combinaciones.combinacionOptima[0].paneles.marca);
                $('#inpMarcaInversorS').val(combinaciones.combinacionOptima[0].inversores.vMarca);
                $('#inpCantidadPaneles').val(combinaciones.combinacionOptima[0].paneles.noModulos);

                if(combinaciones.combinacionOptima[0].inversores.combinacion === true){
                    $('#inpCantidadInvers').val('QS1: '+combinaciones.combinacionOptima[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionOptima[0].inversores.numeroDeInversores.invSoportMen);
                }
                else{
                    $('#inpCantidadInvers').val(combinaciones.combinacionOptima[0].inversores.numeroDeInversores);
                }

                $('#inpCantidadInvers').val(combinaciones.combinacionOptima[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(combinaciones.combinacionOptima[0].totales.precio  + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionOptima[0].totales.precioMasIVA  + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionOptima[0].totales.precio_watt  + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionOptima[0].totales.precioMasIVAMXN  + '$');

                //Page2_Result
                promedioConsumoMensual = combinaciones._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = combinaciones.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = combinaciones.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(combinaciones.combinacionOptima[0].paneles.nombre);
                $('#inpModeloInversor').val(combinaciones.combinacionOptima[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(combinaciones.combinacionOptima[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+combinaciones.combinacionOptima[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+combinaciones.combinacionOptima[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+combinaciones.combinacionOptima[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+combinaciones.combinacionOptima[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(combinaciones.combinacionOptima[0].roi. + 'años');
                //$('#plROIDeduccion1').val(combinaciones.combinacionOptima[0].roi. + 'años');

                //Boton_salvar
                $('#checkSalvarCombinacion').css("display", "");
                //Boton_details
                $('#btnDetails').css("display", "");
                //Boton_ajustePropuesta
                $('#btnModalAjustePropuesta').css("display", "");
            break;
            case 'optConvinacionMediana'://Mediana
                //tipo_combinacion
                $('#inpTipoCombinacion1').val("mediana");//Input oculto - combinacion_mediana
                //Page1_Result
                $('#inpPotencia').val(combinaciones.combinacionMediana[0].paneles.potenciaReal + 'kW');
                $('#inpCantidadPaneles').val(combinaciones.combinacionMediana[0].paneles.noModulos);

                if(cantidadInversores.combinacion === true){
                    $('#inpCantidadInvers').val('QS1: '+combinaciones.combinacionMediana[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionMediana[0].inversores.numeroDeInversores.invSoportMen);
                }
                else{
                    $('#inpCantidadInvers').val(combinaciones.combinacionMediana[0].inversores.numeroDeInversores);
                }
                
                $('#inpCostProyectoSIVA').val(combinaciones.combinacionMediana[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionMediana[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionMediana[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionMediana[0].totales.precioMasIVAMXN+ '$');

                //Page2_Result
                promedioConsumoMensual = combinaciones._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = combinaciones.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = combinaciones.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(combinaciones.combinacionMediana[0].paneles.nombre);
                $('#inpModeloInversor').val(combinaciones.combinacionMediana[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + 'kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(combinaciones.combinacionMediana[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+combinaciones.combinacionMediana[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+combinaciones.combinacionMediana[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+combinaciones.combinacionMediana[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+combinaciones.combinacionMediana[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(combinaciones.combinacionMediana[0].roi. + 'años');
                //$('#plROIDeduccion1').val(combinaciones.combinacionMediana[0].roi. + 'años');

                //Boton_salvar
                $('#checkSalvarCombinacion').css("display", "");
                //Boton_details
                $('#btnDetails').css("display", "");
                //Boton_ajustePropuesta
                $('#btnModalAjustePropuesta').css("display", "");
            break;
            case 'optConvinacionEconomica'://Economica
                //tipo_combinacion
                $('#inpTipoCombinacion2').val("economica");//Input oculto - combinacion_economica
                
                //Page1_Result
                $('#inpPotencia').val(combinaciones.combinacionEconomica[0].paneles.potenciaReal + 'kW');
                $('#inpCantidadPaneles').val(combinaciones.combinacionEconomica[0].paneles.noModulos).val(combinaciones.combinacionEconomica[0].paneles.noModulos);

                if(combinaciones.combinacionEconomica[0].inversores.combinacion === true){
                    $('#inpCantidadInvers').val('QS1: '+combinaciones.combinacionEconomica[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionEconomica[0].inversores.numeroDeInversores.invSoportMen);
                }
                else{
                    $('#inpCantidadInvers').val(combinaciones.combinacionEconomica[0].inversores.numeroDeInversores);
                }

                $('#inpCostProyectoSIVA').val(combinaciones.combinacionEconomica[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionEconomica[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionEconomica[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionEconomica[0].totales.precioMasIVAMXN+ '$');

                //Page2_Result
                promedioConsumoMensual = combinaciones._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = combinaciones.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = combinaciones.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(combinaciones.combinacionEconomica[0].paneles.nombrePanel);
                $('#inpModeloInversor').val(combinaciones.combinacionEconomica[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + 'kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(combinaciones.combinacionEconomica[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+combinaciones.combinacionEconomica[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+combinaciones.combinacionEconomica[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+combinaciones.combinacionEconomica[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+combinaciones.combinacionEconomica[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(combinaciones.combinacionEconomica[0].roi. + 'años');
                //$('#plROIDeduccion1').val(combinaciones.combinacionEconomica[0].roi. + 'años');

                //Boton_salvar
                $('#checkSalvarCombinacion').css("display", "");
                //Boton_details
                $('#btnDetails').css("display", "");
                //Boton_ajustePropuesta
                $('#btnModalAjustePropuesta').css("display", "");
                //Boton details - propuesta
                $('#btnDetails').css("display","");
            break;
            default:
                //Limpiar campos de -resultado-
                limpiarCampos();
                //Boton_salvar
                $('#checkSalvarCombinacion').css("display", "none");
                //Boton_details
                $('#btnDetails').css("display", "none");
                //Boton_ajustePropuesta
                $('#btnModalAjustePropuesta').css("display", "none");
            break;
        }
    });
}

function vaciarCombinacionesEnModal(combinaciones){
    let promedioConsumoMensual = combinaciones._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;

    /* Pildoras_Modal */
    /*             --Combinacion Economica--             */
    /* Se cargan imagenes de logos && equipos */
    /* __logos__ */
    $('#imgLogoPanel1').attr("src", "img/paneles/logo/"+combinaciones.combinacionEconomica[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor1').attr("src", "img/inversores/logo/"+combinaciones.combinacionEconomica[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel1').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor1').attr("src", "img/inversores/equipo/"+combinaciones.combinacionEconomica[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle1').text("Combinacion economica");
    
    //Page1_Result
    $('#plPotenciaNecesaria1').text(combinaciones.combinacionEconomica[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles1').text(combinaciones.combinacionEconomica[0].paneles.noModulos);

    if(combinaciones.combinacionEconomica[0].inversores.combinacion === true){
        $('#plCantidadInversores1').text('QS1: '+combinaciones.combinacionEconomica[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionEconomica[0].inversores.numeroDeInversores.invSoportMen);
    }
    else{
        $('#plCantidadInversores1').text(combinaciones.combinacionEconomica[0].inversores.numeroDeInversores);
    }

    $('#plCostoProyectoSIVA1').text(combinaciones.combinacionEconomica[0].totales.precio + '$');
    $('#plCostoProyectoCIVA1').text(combinaciones.combinacionEconomica[0].totales.precioMasIVA + '$');
    $('#plCostoWatt1').text(combinaciones.combinacionEconomica[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = combinaciones.combinacionEconomica[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = combinaciones.combinacionEconomica[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel1').text(combinaciones.combinacionEconomica[0].paneles.nombre);
    $('#plModeloInversor1').text(combinaciones.combinacionEconomica[0].inversores.vNombreMaterialFot);
    $('#plConsumoMensual1').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual1').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual1').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion1').text(combinaciones.combinacionEconomica[0].power.porcentajePotencia + '%');

    //Page3_Result
    $('#plPagoPromedioAnterior1').text('$'+combinaciones.combinacionEconomica[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo1').text('$'+combinaciones.combinacionEconomica[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual1').text('$'+combinaciones.combinacionEconomica[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual1').text('$'+combinaciones.combinacionEconomica[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto1').text(combinaciones.combinacionEconomica[0].roi. + 'años');
    //$('#plROIDeduccion1').text(combinaciones.combinacionEconomica[0].roi. + 'años');

    /*             --Combinacion Mediana--             */
    /* Se cargan imagenes de logos && equipos */
    /* __logos__ */
    $('#imgLogoPanel2').attr("src", "img/paneles/logo/"+combinaciones.combinacionMediana[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor2').attr("src", "img/inversores/logo/"+combinaciones.combinacionMediana[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel2').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor2').attr("src", "img/inversores/equipo/"+combinaciones.combinacionMediana[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle2').text('Combinacion mediana');
    
    //Page1_Result
    $('#plPotenciaNecesaria2').text(combinaciones.combinacionMediana[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles2').text(combinaciones.combinacionMediana[0].paneles.noModulos);

    if(combinaciones.combinacionMediana[0].inversores.combinacion === true){
        $('#plCantidadInversores2').text('QS1: '+combinaciones.combinacionMediana[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionMediana[0].inversores.numeroDeInversores.invSoportMen);
    }
    else{
        $('#plCantidadInversores2').text(combinaciones.combinacionMediana[0].inversores.numeroDeInversores);
    }

    $('#plCostoProyectoSIVA2').text(combinaciones.combinacionMediana[0].totales.precio + '$');
    $('#plCostoProyectoCIVA2').text(combinaciones.combinacionMediana[0].totales.precioMasIVA + '$');
    $('#plCostoWatt2').text(combinaciones.combinacionMediana[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = combinaciones.combinacionMediana[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = combinaciones.combinacionMediana[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel2').text(combinaciones.combinacionMediana[0].paneles.nombre);
    $('#plModeloInversor2').text(combinaciones.combinacionMediana[0].inversores.vNombreMaterialFot);
    $('#plConsumoMensual2').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual2').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual2').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion2').text(combinaciones.combinacionMediana[0].power.porcentajePotencia + '%');

    // //Page3_Result
    $('#plPagoPromedioAnterior2').text('$'+combinaciones.combinacionMediana[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo2').text('$'+combinaciones.combinacionMediana[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual2').text('$'+combinaciones.combinacionMediana[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual2').text('$'+combinaciones.combinacionMediana[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto2').text(combinaciones.combinacionMediana[0].roi. + 'años');
    //$('#plROIDeduccion2').text(combinaciones.combinacionMediana[0].roi. + 'años');

    /*             --Combinacion Optima--             */
    /* Se cargan imagenes de logos &&  equipos */
    /* __logos__ */
    $('#imgLogoPanel3').attr("src", "img/paneles/logo/"+combinaciones.combinacionOptima[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor3').attr("src", "img/inversores/logo/"+combinaciones.combinacionOptima[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel3').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor3').attr("src", "img/inversores/equipo/"+combinaciones.combinacionOptima[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle3').text('Combinacion optima');

    //Page1_Result
    $('#plPotenciaNecesaria3').text(combinaciones.combinacionOptima[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles3').text(combinaciones.combinacionOptima[0].paneles.noModulos);

    if(combinaciones.combinacionOptima[0].inversores.combinacion === true){
        $('#plCantidadInversores3').text('QS1: '+combinaciones.combinacionOptima[0].inversores.numeroDeInversores.invSoportMay+' YC600: '+combinaciones.combinacionOptima[0].inversores.numeroDeInversores.invSoportMen);
    }
    else{
        $('#plCantidadInversores3').text(combinaciones.combinacionOptima[0].inversores.numeroDeInversores);
    }

    $('#plCostoProyectoSIVA3').text(combinaciones.combinacionOptima[0].totales.precio + '$');
    $('#plCostoProyectoCIVA3').text(combinaciones.combinacionOptima[0].totales.precioMasIVA + '$');
    $('#plCostoWatt3').text(combinaciones.combinacionOptima[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = combinaciones.combinacionOptima[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = combinaciones.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel3').text(combinaciones.combinacionOptima[0].paneles.nombre);
    $('#plModeloInversor3').text(combinaciones.combinacionOptima[0].inversores.vNombreMaterialFot);

    $('#plConsumoMensual3').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual3').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual3').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion3').text(combinaciones.combinacionOptima[0].power.porcentajePotencia + '%');

    // //Page3_Result
    $('#plPagoPromedioAnterior3').text('$'+combinaciones.combinacionOptima[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo3').text('$'+combinaciones.combinacionOptima[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual3').text('$'+combinaciones.combinacionOptima[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual3').text('$'+combinaciones.combinacionOptima[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto3').text(combinaciones.combinacionOptima[0].roi. + 'años');
    //$('#plROIDeduccion3').text(combinaciones.combinacionOptima[0].roi. + 'años');
}
/*#endregion*/

function cambiarModalidad(control){
    var valor = control.value;

    $('#listConvinaciones').val(-1);
    $('#listPaneles').val(-1);
    $('#listInversores').val(-1);
    limpiarCampos();

    if(valor === "0"){
        /* div_ElegirEquipo */
        $('#lblConvEquip').text('Equipos');
        $('#lblSwitchConvEquip').text("Elegir combinacion");
        $('#divConvinaciones').css("display","none");
        $('#divPlusEquipos').css("display","none");
        $('#divElegirEquipo').css("display","");

        //
        $('#checkSalvarCombinacion').css("display","none");
        $('#btnDivCombinaciones').css("display","none");

        //Resetean dropdownlist
        $('#listConvinaciones').val(-1);

        //Resetea boton/check "salvar_combinacion"
        $('#salvarCombinacion').prop("checked", false);

        $('#switchConvEquip').val("1");
    }
    else{
        /* div_Combinaciones */
        $('#lblConvEquip').text('Combinaciones');
        $('#lblSwitchConvEquip').text("Elegir equipo");
        $('#divConvinaciones').css("display","");
        $('#divPlusEquipos').css("display","");
        $('#divElegirEquipo').css("display","none");

        //
        $('#checkSalvarCombinacion').css("display","");
        $('#btnDivCombinaciones').css("display","");

        //Resetean dropdownlist
        $('#listPaneles').val(-1);
        $('#listInversores').val(-1).attr("disabled",true);

        $('#switchConvEquip').val("0");
    }
}

function mostrarListModelosInversores(){
    let divDDLInversoresModelo = $('#divDropDownListInversorModelo');
    let ddlInversoresModelo = $('#listModelosInversor');

    if($('#chckModelosInversor').is(":checked")){
        divDDLInversoresModelo.show();
    }
    else{
        divDDLInversoresModelo.hide();
        ddlInversoresModelo.attr("disabled",false);
    }
}

function sliderModificarPropuesta(){
    if($('#btnModificarPropuesta').is(":disabled")){ //El boton de "modificar_propuesta" se encuentra inhabilitado
        $('#btnModificarPropuesta').attr("disabled",false); //Se habilita el boton de "modificar_propuesta"
    }
}

async function modificarPropuesta(){
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    //Modificar sessionStorage de "propuestaNueva" o "propuestaModificada" *0 = Nueva* *1 = Modificada*
    sessionStorage.removeItem("bndPropuestaEditada");
    sessionStorage.setItem("bndPropuestaEditada", 1);

    // //Se cambia de estado el dropDownList de "Inversores" a -1 (para que se vacie de los inversores anteriores y traiga los nuevos de la propuesta modificada)
    $('listPaneles').val('-1');
    $('listInversores').val('-1');

    // //Se limpian los dropDownList de Paneles e Inversores
    // limpiarDropDownListPaneles();
    // limpiarDropDownListInversores();

    // //Se limpian inputs de -result- anterior
    limpiarCampos();

    // //Cachar los valores de los porcentajes / panel de ajuste
    let porcentajePropuesta = parseFloat($('#inpSliderPropuesta').val()) || 0;
    let porcentajeDescuento = parseFloat($('#inpSliderDescuento').val()) || 0; 

    // //Se guarda el porcentaje de descuento, para su futura implementacion (ya que el descuento se aplica hasta el step:"cobrar_viaticos")
    sessionStorage.removeItem("descuentoPropuesta");
    sessionStorage.setItem("descuentoPropuesta",porcentajeDescuento);

    // //Se arma la data para editar la propuesta
    let dataPorcentajes = { porcentajePropuesta, porcentajeDescuento };

    // //Se realiza nuevamente la propuesta
    if(tarifaMT === "null" || typeof tarifaMT === 'undefined'){ ///BajaTension
        await calcularPropuestaBT(null, dataPorcentajes);
    }
    else{ ///MediaTension
        await calcularPropuestaMT(dataPorcentajes);
    }
}

function deshabilitarBotonesPDF(){
    $('#btnGenerarQrCode').prop("disabled",true);
    $('#btnGenerarPdfFileViewer').prop("disabled",true);
}
/*#endregion*/