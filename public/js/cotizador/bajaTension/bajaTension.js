/*#region Datos*/
async function calcularPropuestaBT(e, dataEdited){ ///Main()
    var dataEdited = dataEdited || null;
    var data = null; //DATA de la propuesta a calcular

    //Se valida si la propuesta a realizar es una NUEVA o AJUSTADA(modificada)
    if(dataEdited === null){
        //Se obtienen los datos de la propuesta
        dataPropuesta = cacharDatosPropuesta();

        if(typeof dataPropuesta != "undefined"){
            data = dataPropuesta;
        }
        else{
            e.preventDefault();
        }
    }

    //Se valida si la data a enviar al servidor no esta vacia
    // if(data != null){
        
    // }
    if(dataEdited === null){ //Cotizacion nueva
        /* Enviar Propuesta - Manipular resultado */
        await pintarVistaDeResultados();

        _combinaciones = await obtenerCombinaciones(data);
        await vaciarCombinaciones(_combinaciones);
        
        _cotizacion = await enviarCotizacion(data); //Se obtienen paneles
        console.log('cotizacion nueva');
        console.log(_cotizacion);
        await vaciarRespuestaPaneles(_cotizacion);
        
    }
    else{ //Cotizacion ajustada
        dataPropuesta = cacharDatosPropuesta();
        dataPropuesta.porcentajePropuesta = dataEdited.porcentajePropuesta;
        dataPropuesta.porcentajeDescuento = dataEdited.porcentajeDescuento;
        data = dataPropuesta;

        ///Enviar propuesta AJUSTADA
        _cotizacionAjustada = await enviarCotizacion(data);
        console.log('cotizacion editada');
        console.log(_cotizacionAjustada);
        await vaciarRespuestaPaneles(_cotizacionAjustada);
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
                sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));

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

function calcularViaticosBT(){
    var _cotizarViaticos = [];
    //Datos de la propuesta (consumos, direccion, tarifa)
    var datosPropuesta = cacharDatosPropuesta();
    //Equipos seleccionados
    var sspanel = sessionStorage.getItem('__ssPanelSeleccionado');
    var ssinversor = sessionStorage.getItem('__ssInversorSeleccionado');
    var descuento = sessionStorage.getItem('descuentoPropuesta');
    var consumptions = sessionStorage.getItem("_consumsFormated"); ///Consumos formateados -> promedioMensual,Bimestral,Anual,etc
    consumptions = JSON.parse(consumptions);
    consumptions = consumptions.consumo;

    objEquiposSeleccionados = { panel: sspanel, inversor: ssinversor };
    _cotizarViaticos[0] = objEquiposSeleccionados;

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/calcularViaticosBTI',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                "arrayBTI": _cotizarViaticos,
                "consumos": consumptions,
                "data": datosPropuesta,
                "descuentoPropuesta": descuento
            },
            dataType: 'json',
            success: function(resultViaticos){
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
    banderaDelError = 0; //Bandera para validar si en algun proceso hubo un error

    var _consumosBimestres = () => {
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
    var direccionCliente = () => {
        direc = $('#municipio').val() || null;

        if(validarClienteCargado(direc) === true){
            return direc;
        }
        else{
            banderaDelError = 1;
        }
    };

    var tarifaSeleccionada = $('#tarifa-actual').val();
    _consumosBimestres = _consumosBimestres();
    direccionCliente = direccionCliente();

    if(banderaDelError != 1){
        datosPropuesta = {
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
}

function limpiarCampos(){
    $('.inpAnsw').val('');
    $('.smallIndicator').text('').val('');
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
function validarClienteCargado(direccionCliente){
    if(direccionCliente != null){
        return true;
    }
    else{
        alert('Falta cargar un cliente');
    }
}
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
async function vaciarRespuestaPaneles(resultPaneles){
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

async function vaciarRespuestaInversores(resultInversores){
    var dropDownListInversores = $('#listInversores');
    var resultInversores = resultInversores.message; //Formating

    //Habilita lista de paneles
    dropDownListInversores.attr("disabled", false);

    //Limpiar dropdownlist
    limpiarDropDownListInversores();

    //DropDownList-Paneles
    for(var i=1; i<resultInversores.length; i++)
    {
        dropDownListInversores.append(
            $('<option/>', {
                value: i,
                text: resultInversores[i].vNombreMaterialFot
            })
        );
    }
}

async function mostrarPanelSeleccionado(){
    var ddlPaneles = $('#listPaneles');
    var ddlPanelesValue = parseInt(ddlPaneles.val());

    limpiarCampos();

    if(ddlPanelesValue === '-1'  || ddlPanelesValue === -1 || typeof ddlPanelesValue === "undefined" ){
        //Se limpian results de result_paneles
        $('#listInversores').prop("disabled", true);
    }
    else{
        /*#region Formating _respuestaPaneles*/
        _paneles = sessionStorage.getItem('_respPaneles');
        _paneles = JSON.parse(_paneles);
        /*#end region*/

        _potenciaReal = _paneles[ddlPanelesValue].panel.potenciaReal;

        $('#inpMarcaPanelS').val(_paneles[ddlPanelesValue].panel.marca);

        //Consumos
        var promedioConsumoMensual = _paneles[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
        $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
        
        //Pintada de resultados - Paneles
        $('#inpCantidadPaneles').val(_paneles[ddlPanelesValue].panel.noModulos);
        $('#inpModeloPanel').val(_paneles[ddlPanelesValue].panel.nombre);
        $('#inpMarcaPanel').val(_paneles[ddlPanelesValue].panel.marca);
        $('#inpPotencia').val(_paneles[ddlPanelesValue].panel.potenciaReal + 'Kw');

        //Equipo seleccionado - Panel seleccionado
        sessionStorage.setItem('__ssPanelSeleccionado',JSON.stringify(_paneles[ddlPanelesValue].panel));

        // _panelSeleccionado[0] = _respuest[x].panel;

        //Se carga dropDownList -Inversores-
        _inversores = await obtenerInversoresParaPanelSeleccionado(_paneles[ddlPanelesValue]);
        await vaciarRespuestaInversores(_inversores);
    }
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

async function mostrarInversorSeleccionado(){
    var ddlInversores = $('#listInversores');
    var ddlInversoresValue = parseInt(ddlInversores.val());

    limpiarResultados(1);

    if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
        $('#divTotalesProject').css("display",""); //???

        //Se bloquean botones de GenerarPDF y GuardarPropuesta
        $('#btnGuardarPropuesta').prop("disabled", true);
        $('#btnGenerarEntregable').prop("disabled", true);

        //Panel de ajuste de cotizacion - Desaparece
        $('#btnModalAjustePropuesta').attr("disabled",true);
    }
    else{
        /*#region Formating _respuestaPaneles*/
        _inversores = sessionStorage.getItem('_respInversores');
        _inversores = JSON.parse(_inversores);
        _inversores = _inversores.message;
        /*#end region*/

        //Se desbloquea boton de -PanelAjustePropuesta-
        $('#listInversores').prop("disabled", false);
        //Se desbloquean botones de GenerarPDF y GuardarPropuesta
        $('#btnGuardarPropuesta').prop("disabled", false);
        $('#btnGenerarEntregable').prop("disabled", false);

        //Panel de ajuste de cotizacion - Aparece
        $('#btnModalAjustePropuesta').attr("disabled",false);

        //Se agrega nmerito -Cantidad_Inversores-

        //Se cargan los inputs de la vista
        $('#inpCostTotalInversores').val(_inversores[ddlInversoresValue].precioTotal);

        //Inversores  - /Tabla_oculta\
        $('#cantidadInversores').html(_inversores[ddlInversoresValue].numeroDeInversores).val(_inversores[ddlInversoresValue].numeroDeInversores);
        $('#potenciaInversor').html(_inversores[ddlInversoresValue].fPotencia + 'W').val(_inversores[ddlInversoresValue].fPotencia);
        $('#potenciaMaximaInv').html(_inversores[ddlInversoresValue].iPMAX + 'W').val(_inversores[ddlInversoresValue].iPMAX);
        $('#potenciaNominalInv').html(_inversores[ddlInversoresValue].potenciaNominal + 'W').val(_inversores[ddlInversoresValue].potenciaNominal);
        $('#potenciaPicoInv').html(_inversores[ddlInversoresValue].potenciaPico + 'W').val(_inversores[ddlInversoresValue].potenciaPico);
        $('#porcentajeSobreDim').html(_inversores[ddlInversoresValue].porcentajeSobreDimens + '%').val(_inversores[ddlInversoresValue].porcentajeSobreDimens);
        $('#precioInv').html(_inversores[ddlInversoresValue].fPrecio + '$').val(_inversores[ddlInversoresValue].fPrecio); 
        $('#costoTotalInversores').html(_inversores[ddlInversoresValue].precioTotal + '$').val(_inversores[ddlInversoresValue].precioTotal);


        ///Pintada de resultados - Inversor
        $('#inpCantidadInvers').val(_inversores[ddlInversoresValue].numeroDeInversores);
        $('#inpModeloInversor').val(_inversores[ddlInversoresValue].vNombreMaterialFot);

        //Equipo seleccionado - Inversor seleccionado
        sessionStorage.setItem('__ssInversorSeleccionado',JSON.stringify(_inversores[ddlInversoresValue]));
        //Se calculan viaticos
        _viaticos = await calcularViaticosBT();
        mostrarRespuestaViaticos(_viaticos);
    }
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

function mostrarRespuestaViaticos(_viaticos){
    var _viaticos = _viaticos.message;

    sessionStorage.setItem("ssViaticos", JSON.stringify(_viaticos));
    
    /*#region Formating*/
    var objResp = sessionStorage.getItem("_consumsFormated");
    objResp = JSON.parse(objResp);
    /*#endregion*/

    //Se pintan los resultados del calculo de viaticos
    promedioConsumoMensual = objResp.consumo._promCons.consumoMensual.promedioConsumoMensual;
    generacionMensual = _viaticos[0].power.generacion.promedioDeGeneracion;
    nuevoConsumoBimestral = _viaticos[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#inpPorcentGeneracion').val(_viaticos[0].power.porcentajePotencia + '%');

    $('#inpCostProyectoSIVA').val(_viaticos[0].totales.precio + '$');
    $('#inpCostProyectoCIVA').val(_viaticos[0].totales.precioMasIVA + '$');
    $('#inpCostPorWatt').val(_viaticos[0].totales.precio_watt + '$');
    $('#inpCostProyectoMXN').val('$' +_viaticos[0].totales.precioTotalMXN);
    
    //Se pintan los resultados del roi
    $('#inpPagoAnteriorProm').val('$'+_viaticos[0].roi.consumo.consumoBimestralPesosMXN);
    $('#inpPagoNuevoProm').val('$'+_viaticos[0].roi.generacion.nuevoPagoBimestral);
    $('#inpAhorroMensual').val('$'+_viaticos[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#inpAhorroAnual').val('$'+_viaticos[0].roi.ahorro.ahorroAnualEnPesosMXN);
    // $('#').val();
    // $('#').val();
    
    ///Porcentaje de propuesta que aparece en el panelAjustePropuesta
    $('#rangeValuePropuesta').val(_viaticos[0].power.porcentajePotencia);
    //Porcentaje de descuentoPropuesta que aparece en el panelAjustePropuesta
    $('#rangeValueDescuento').val(_viaticos[0].descuento);
}
/*#endregion*/
/*#region Combinaciones*/
async function vaciarCombinaciones(resultCombinaciones){
    var resultCombinaciones = resultCombinaciones.message; //Formating
    resultCombinaciones = resultCombinaciones[0]; //ArrayCombinaciones

    //Guardar en un SessionStorage el ArrayCombinaciones
    sessionStorage.setItem("arrayCombinaciones", JSON.stringify(resultCombinaciones));

    //Se llena la lista desplegable de *combinaciones*
    llenarListaDesplegableCombinaciones(resultCombinaciones); //AJAX - request


    //Se pintan las combinaciones en el *modal_combinaciones*
    vaciarCombinacionesEnModal(resultCombinaciones); //AJAX - request
}

function llenarListaDesplegableCombinaciones(combinaciones){
    var ddlCombinaciones = $('#listConvinaciones');

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
                $('#inpCantidadInvers').val(combinaciones.combinacionOptima[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(combinaciones.combinacionOptima[0].totales.precio  + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionOptima[0].totales.precioMasIVA  + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionOptima[0].totales.precio_watt  + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionOptima[0].totales.precioTotalMXN  + '$');

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
                $('#inpCantidadInvers').val(combinaciones.combinacionMediana[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(combinaciones.combinacionMediana[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionMediana[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionMediana[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionMediana[0].totales.precioTotalMXN+ '$');

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
                $('#inpCantidadInvers').val(combinaciones.combinacionEconomica[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(combinaciones.combinacionEconomica[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(combinaciones.combinacionEconomica[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(combinaciones.combinacionEconomica[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(combinaciones.combinacionEconomica[0].totales.precioTotalMXN+ '$');

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
    var promedioConsumoMensual = combinaciones._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;

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
    $('#plCantidadInversores1').text(combinaciones.combinacionEconomica[0].inversores.numeroDeInversores);
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
    $('#plCantidadInversores2').text(combinaciones.combinacionMediana[0].inversores.numeroDeInversores);
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
    $('#plCantidadInversores3').text(combinaciones.combinacionOptima[0].inversores.numeroDeInversores);
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

function sliderModificarPropuesta(){
    if($('#btnModificarPropuesta').is(":disabled")){ //El boton de "modificar_propuesta" se encuentra inhabilitado
        $('#btnModificarPropuesta').attr("disabled",false); //Se habilita el boton de "modificar_propuesta"
    }
}

function modificarPropuesta(){
    //Se cambia de estado el dropDownList de "Inversores" a -1 (para que se vacie de los inversores anteriores y traiga los nuevos de la propuesta modificada)
    // $('listPaneles').val('-1');
    $('listInversores').val('-1');

    //Se limpian los dropDownList de Paneles e Inversores
    // limpiarDropDownListPaneles();
    // limpiarDropDownListInversores();

    //Se limpian inputs de -result- anterior
    limpiarCampos();

    //Cachar los valores de los porcentajes / panel de ajuste
    porcentajePropuesta = parseFloat($('#rangeValuePropuesta').val()) || 0;
    porcentajeDescuento = parseFloat($('#rangeValueDescuento').val()) || 0; 

    //Se guarda el porcentaje de descuento, para su futura implementacion (ya que el descuento se aplica hasta el step:"cobrar_viaticos")
    sessionStorage.setItem("descuentoPropuesta",porcentajeDescuento);

    //Se arma la data para editar la propuesta
    dataPorcentajes = { porcentajePropuesta, porcentajeDescuento };

    //Se realiza nuevamente la propuesta
    calcularPropuestaBT(null, dataPorcentajes);
}
/*#endregion*/