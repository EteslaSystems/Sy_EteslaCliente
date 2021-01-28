var dataCatchResults = [];

$(function(){
    chooseSwitch();
    salvarCombinacion();
});

/*#region Logica_controles*/
function catchConsumption(){
    const dictionaryTarifas = {"1":1, "1a":1, "1b":1, "1c":1, "1d":1, "1e":1, "1f":1, "2":1, "IC":1};
    var consumos = 0;
    var _consumosBimestres = [];
    tarifaSelected = document.getElementById('tarifa-actual').value;

    if(dictionaryTarifas.hasOwnProperty(tarifaSelected) === true){
        for(var i=1; i<=6; i++)
        {
            consumos = $('#men-val-'+i.toString()).val() || 0;

            _consumosBimestres.push(consumos);
        }

        return _consumosBimestres;
    }
    else{
        alert('Problemas con la tarifa seleccionada o inexistente');
    }
}

function backToCotizacionBT(){
    $("#divCotizacionBajaTension").css("display","");
    $("#divBtnCalcularBT").css("display","");
    $("#divResultCotizacionBT").css("display","none");
}

function chooseSwitch(){
    var valor = 0;
    $('#switchConvEquip').on("click", function(){
        $('#listConvinaciones').val(-1);
        $('#listPaneles').val(-1);
        $('#listInversores').val(-1);
        limpiarCampos();

        if(valor === 0){
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

            valor = 1;
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

            valor = 0;
        }
    });
}
/*#endregion*/
/*#region Validaciones*/
/* function validarInputsVacios(){

} */

function validarUsuarioCargado(direccion_Cliente){
    if(direccion_Cliente){
        return true;
    }
    else{
        alert('Falto cargar un cliente');
        return false;
    }
}
/*#endregion*/
/*#region Server*/
function sendCotizacionBajaTension(dataEdited){
    var direccionCliente = document.getElementById('municipio').value;
    dataEdited = dataEdited || null;
    tarifaSelected = document.getElementById('tarifa-actual').value;
    _consumos = catchConsumption();

    if(dataEdited === null){
        if(validarUsuarioCargado(direccionCliente) === true){
            data = { 
                '_token': $("meta[name='csrf-token']").attr('content'),
                'consumos': _consumos,
                'direccionCliente': direccionCliente,
                'tarifa': tarifaSelected
            }; 
        }
    }
    else{
        data = {
            '_token': $("meta[name='csrf-token']").attr('content'),
            'consumos': _consumos,
            'direccionCliente': direccionCliente,
            'tarifa': tarifaSelected,
            'porcentajePropuesta': dataEdited.porcentajePropuesta,
            'porcentajeDescuento': dataEdited.porcentajeDescuento
        };
    }

    new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: data,
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status == '500'){
                    rejecet('Error al intentar ejecutar su propuesta!');
                }
                else{
                    resolve(respuesta);
                }
            },
            error: function(){
                reject('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
            }
        })
        .then(respuesta => {
            if(dataEdited === null){ //Propuesta nueva
                respuesta = { respuesta: respuesta.message, nwdata: data };

                //Se pinta vista de -resultados- y llena DropDownList de -Paneles-
                getResultsView(respuesta);
            }
            else{ //Propuesta editada
                getVistaDeResultadosPropuestaModificada(respuesta);
            }
        })
        .catch(function(error){
            alert('Error: '+error);
        });
    });
}

function getResultsView(_respuesta){
    console.log('Esto es lo que resive *getResultsView*: ');
    console.log(_respuesta);

    nwdata = _respuesta.nwdata;
    _respuesta = _respuesta.respuesta;

    //Se genera un sessionStorage que contendra un object sobre la Energia requerida y los consumos ya procesados
    sessionStorage.setItem("_consumsFormated",JSON.stringify(_respuesta[0]));

    //Combinaciones_Propuesta
    // askCombination(nwdata);

    //Se trae la vista de *RESULTADOS* a la vista de *BAJA_TENSION*
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
        .then(resultView => {
            $('#divCotizacionBajaTension').css("display","none");
            $('#divBtnCalcularBT').css("display","none");
            $('#divResultCotizacionBT').css("display","");
            $('#divResult_bt').html(resultView);

            /////////SaveInSessionStorage
            sessionStorage.setItem("ssObjConsumos", JSON.stringify(_respuesta));
    
            //Se llenan los controles relacionados con la primera respuesta de la propuesta
            llenarControlesConRespuesta_Paneles(_respuesta);
        })
        .catch(error => {
            alert('Error en getResultView: '+error);
        });
    });
}

function llenarControlesConRespuesta_Paneles(_respuest){
    var _panelSeleccionado = [];
    var ddlPaneles = $('#listPaneles');

    var contador = 0;

    //Se carga dropDownList -Paneles-
    if(fullDropDownListPaneles(_respuest) === true){
        ddlPaneles.attr('disabled',false);

        ddlPaneles.on('change',function(){
            contador++;
            console.log('lista de paneles a cambiado '+contador);
    
            var x = parseInt(ddlPaneles.val()); //Iteracion

            limpiarCampos();
                        
            if(x === '-1'  || x === -1){
                //Se limpian results de result_paneles
                $('#listInversores').prop("disabled", true);
            }
            else{
                $('listInversores').val(-1);

                _potenciaReal = _respuest[x].panel.potenciaReal;

                $('#inpMarcaPanelS').val(_respuest[x].panel.marca);
    
                //Consumos
                var promedioConsumoMensual = _respuest[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
                
                //Pintada de resultados - Paneles
                $('#inpCantidadPaneles').val(_respuest[x].panel.noModulos);
                $('#inpModeloPanel').val(_respuest[x].panel.nombre);
                $('#inpMarcaPanel').val(_respuest[x].panel.marca);
                $('#inpPotencia').val(_respuest[x].panel.potenciaReal + 'Kw');
    
                //Aparece cantidad (numerito) de -Paneles y Estructuras-
                $('#txtCantidadPaneles').html('('+_respuest[x].panel.noModulos+')');
                $('#txtCantidadEstructuras').html('('+_respuest[x].panel.noModulos+')');
    
                $('#listInversores').prop("disabled", false);
    
                //Equipo seleccionado - Panel seleccionado
                sessionStorage.setItem('__ssPanelSeleccionado',JSON.stringify(_respuest[x].panel));
    
                _panelSeleccionado[0] = _respuest[x].panel;
    
                //Se carga dropDownList -Inversores-
                fullDropDownListInversoresSelectos(_panelSeleccionado);
            }
        });
    }
}

function fullDropDownListPaneles(_respuesta){
    var dropDownListPaneles = $('#listPaneles');

    //limpiar dropdownlist
    limpiarDropDownListPaneles();

    //DropDownList-Paneles
    for(var i=1; i<_respuesta.length; i++)
    {
        dropDownListPaneles.append(
            $('<option/>', {
                value: i,
                text: _respuesta[i].panel.nombre
            })
        );
    }
    return true;
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

function fullDropDownListInversoresSelectos(panelSeleccionao){
    var ddlInversores = $('#listInversores');
    panelSeleccionao = panelSeleccionao[0];

    limpiarDropDownListInversores();

    //Mandar peticion con el inversor seleccionado
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/inversoresSelectos',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "objPanelSelect": panelSeleccionao
        },
        dataType: 'json'
    })
    .fail(function(){
        alert('Hubo un error al intentar cargar el dropdownlist de Inversores-Selectos');
    })
    .done(function(response){
        var response = response.message;

        console.log('fullDropDownListInversores() says:');
        console.log(response);

        //Aqui se deberia de limpiar el dropDownList para siempre llenarlo con una respuesta nueva

        //DropDownList-Inversores
        for(var j=0; j<response.length; j++)
        {
            ddlInversores.append(
                $('<option/>', {
                    value: j,
                    text: response[j].vNombreMaterialFot
                })
            );
        }
        
        ddlInversores.change(function(){
            var xi = ddlInversores.val(); //Iteracion
            limpiarResultados(1);

            if(xi === '-1' || xi === -1){
                $('#divTotalesProject').css("display","");

                //Se bloquean botones de GenerarPDF y GuardarPropuesta
                $('#btnGuardarPropuesta').prop("disabled", true);
                $('#btnGenerarEntregable').prop("disabled", true);

                //Panel de ajuste de cotizacion - Desaparece
                $('#btnModalAjustePropuesta').attr("disabled",true);
                
                //Se desaparece numerito -Cantidad_Inversores-
                $('#txtCantidadPaneles').html('');
            }
            else{
                //Se desbloquea boton de -PanelAjustePropuesta-
                $('#listInversores').prop("disabled", false);
                //Se desbloquean botones de GenerarPDF y GuardarPropuesta
                $('#btnGuardarPropuesta').prop("disabled", false);
                $('#btnGenerarEntregable').prop("disabled", false);

                //Panel de ajuste de cotizacion - Aparece
                $('#btnModalAjustePropuesta').attr("disabled",false);

                //Se agrega nmerito -Cantidad_Inversores-
                $('#txtCantidadInversores').html('('+response[xi].numeroDeInversores+')');

                //Se cargan los inputs de la vista
                $('#inpCostTotalInversores').val(response[xi].precioTotal);

                //Inversores  - /Tabla_oculta\
                $('#cantidadInversores').html(response[xi].numeroDeInversores).val(response[xi].numeroDeInversores);
                $('#potenciaInversor').html(response[xi].fPotencia + 'W').val(response[xi].fPotencia);
                $('#potenciaMaximaInv').html(response[xi].iPMAX + 'W').val(response[xi].iPMAX);
                $('#potenciaNominalInv').html(response[xi].potenciaNominal + 'W').val(response[xi].potenciaNominal);
                $('#potenciaPicoInv').html(response[xi].potenciaPico + 'W').val(response[xi].potenciaPico);
                $('#porcentajeSobreDim').html(response[xi].porcentajeSobreDimens + '%').val(response[xi].porcentajeSobreDimens);
                $('#precioInv').html(response[xi].fPrecio + '$').val(response[xi].fPrecio); 
                $('#costoTotalInversores').html(response[xi].precioTotal + '$').val(response[xi].precioTotal);


                ///Pintada de resultados - Inversor
                $('#inpCantidadInvers').val(response[xi].numeroDeInversores);
                $('#inpModeloInversor').val(response[xi].vNombreMaterialFot);

                //Equipo seleccionado - Inversor seleccionado
                sessionStorage.setItem('__ssInversorSeleccionado',JSON.stringify(response[xi]));
                //Se calculan viaticos
                calcularViaticosBT();
            }
        });
    });
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

function calcularViaticosBT(){
    tarifaSelected = document.getElementById('tarifa-actual').value;
    var direccionCliente = document.getElementById('municipio').value;

    //Equipos seleccionados
    var sspanel = sessionStorage.getItem('__ssPanelSeleccionado');
    var ssinversor = sessionStorage.getItem('__ssInversorSeleccionado');

    var consumptions = sessionStorage.getItem("_consumsFormated"); ///Consumos formateados -> promedioMensual,Bimestral,Anual,etc
    consumptions = JSON.parse(consumptions);
    consumptions = consumptions.consumo;
    var descuento = sessionStorage.getItem("descuentoPropuesta") || 0;

    objPeriodosGDMTH = {
        panel: sspanel,
        inversor: ssinversor
    }

    _cotizaViaticos[0] = objPeriodosGDMTH;

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/calcularViaticosBTI',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "arrayBTI": _cotizaViaticos,
            "direccionCliente": direccionCliente,
            "consumos": consumptions,
            "tarifa": tarifaSelected,
            "descuentoPropuesta": descuento
        },
        dataType: 'json'
    })
    .fail(function(){ 
        alert('Hubo un error al intentar de obtener los viaticos y totales');
    })
    .done(function(answ){
        var answ = answ.message;

        console.log('calcular viaticos, says: ');
        console.log(answ);

        sessionStorage.setItem("answPropuesta", JSON.stringify(answ));

        var objResp = sessionStorage.getItem("ssObjConsumos");
        objResp = JSON.parse(objResp);

        //Se pintan los resultados del calculo de viaticos
        promedioConsumoMensual = objResp[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
        generacionMensual = answ[0].power.generacion.promedioDeGeneracion;
        nuevoConsumoBimestral = answ[0].power.nuevosConsumos.promedioConsumoBimestral;

        $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
        $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
        $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
        $('#inpPorcentGeneracion').val(answ[0].power.porcentajePotencia + '%');

        $('#inpCostProyectoSIVA').val(answ[0].totales.precio + '$');
        $('#inpCostProyectoCIVA').val(answ[0].totales.precioMasIVA + '$');
        $('#inpCostPorWatt').val(answ[0].totales.precio_watt + '$');
        $('#inpCostProyectoMXN').val('$' +answ[0].totales.precioTotalMXN);
        
        //Se pintan los resultados del roi
        $('#inpPagoAnteriorProm').val('$'+answ[0].roi.consumo.consumoBimestralPesosMXN);
        $('#inpPagoNuevoProm').val('$'+answ[0].roi.generacion.nuevoPagoBimestral);
        $('#inpAhorroMensual').val('$'+answ[0].roi.ahorro.ahorroMensualEnPesosMXN);
        $('#inpAhorroAnual').val('$'+answ[0].roi.ahorro.ahorroAnualEnPesosMXN);
        // $('#').val();
        // $('#').val();
        
        ///Porcentaje de propuesta que aparece en el panelAjustePropuesta
        $('#rangeValuePropuesta').val(answ[0].power.porcentajePotencia);
        //Porcentaje de descuentoPropuesta que aparece en el panelAjustePropuesta
        $('#rangeValueDescuento').val(answ[0].descuento);
    });
}

/*#region Combinaciones (busqueda_inteligente)*/
function askCombination(nwData){
    new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/askCombinations',
            data: nwData,
            dataType: 'json',
            success: function(rspt){
                resolve(rspt);
            },
            error: function(){
                reject('Hubo un error al intentar solicitar la combinacion');
            }
        })
        .then(rspt => {
            rspt = rspt.message; //Formating
            rspt = rspt[0]; //Array combinaciones

            //$('#listConvinaciones').prop("disabled", false); //Se desbloquea DropDownList-Combinaciones
            //$('#btnDivCombinaciones').prop("disabled", false);//Se desbloquea boton-divCombinaciones

            sessionStorage.setItem("arrayCombinaciones", JSON.stringify(rspt));
    
            console.log("Combinaciones says: ");
            console.log(rspt);
    
            //Se llena dropDownListCombinaciones
            //fullDropDownListCombinaciones(rspt);
    
            //Se pintan las combinaciones en el div_combinaciones
            //pintarCombinaciones(rspt);
        })
        .catch(error => {
            alert('Error con askCombinaciones: '+error);
        });
    });
}

function fullDropDownListCombinaciones(rspt){
    var ddlCombinaciones = $('#listConvinaciones');

    //DropDownList de combinaciones
    ddlCombinaciones.change(function(){
        var valueOfListCombinaciones = ddlCombinaciones.val();

        switch(valueOfListCombinaciones)
        {
            case 'optConvinacionOptima'://Optima
                //tipo_combinacion
                $('#inpTipoCombinacion0').val("optima");//Input oculto - combinacion_mediana
                //Page1_Result
                $('#inpPotencia').val(rspt.combinacionOptima[0].paneles.potenciaReal + 'kW');
                $('#inpMarcaPanelS').val(rspt.combinacionOptima[0].paneles.marca);
                $('#inpMarcaInversorS').val(rspt.combinacionOptima[0].inversores.vMarca);
                $('#inpCantidadPaneles').val(rspt.combinacionOptima[0].paneles.noModulos);
                $('#inpCantidadInvers').val(rspt.combinacionOptima[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(rspt.combinacionOptima[0].totales.precio  + '$');
                $('#inpCostProyectoCIVA').val(rspt.combinacionOptima[0].totales.precioMasIVA  + '$');
                $('#inpCostPorWatt').val(rspt.combinacionOptima[0].totales.precio_watt  + '$');
                $('#inpCostProyectoMXN').val(rspt.combinacionOptima[0].totales.precioTotalMXN  + '$');

                //Page2_Result
                promedioConsumoMensual = rspt._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = rspt.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = answ[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(rspt.combinacionOptima[0].paneles.nombre);
                $('#inpModeloInversor').val(rspt.combinacionOptima[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+rspt.combinacionOptima[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+rspt.combinacionOptima[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(rspt.combinacionOptima[0].roi. + 'años');
                //$('#plROIDeduccion1').val(rspt.combinacionOptima[0].roi. + 'años');

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
                $('#inpPotencia').val(rspt.combinacionMediana[0].paneles.potenciaReal + 'kW');
                $('#inpCantidadPaneles').val(rspt.combinacionMediana[0].paneles.noModulos);
                $('#inpCantidadInvers').val(rspt.combinacionMediana[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(rspt.combinacionMediana[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(rspt.combinacionMediana[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(rspt.combinacionMediana[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(rspt.combinacionMediana[0].totales.precioTotalMXN+ '$');

                //Page2_Result
                promedioConsumoMensual = rspt._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = rspt.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = answ[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(rspt.combinacionMediana[0].paneles.nombre);
                $('#inpModeloInversor').val(rspt.combinacionMediana[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + 'kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(rspt.combinacionMediana[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+rspt.combinacionMediana[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+rspt.combinacionMediana[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+rspt.combinacionMediana[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+rspt.combinacionMediana[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(rspt.combinacionMediana[0].roi. + 'años');
                //$('#plROIDeduccion1').val(rspt.combinacionMediana[0].roi. + 'años');

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
                $('#inpPotencia').val(rspt.combinacionEconomica[0].paneles.potenciaReal + 'kW');
                $('#inpCantidadPaneles').val(rspt.combinacionEconomica[0].paneles.noModulos).val(rspt.combinacionEconomica[0].paneles.noModulos);
                $('#inpCantidadInvers').val(rspt.combinacionEconomica[0].inversores.numeroDeInversores);
                $('#inpCostProyectoSIVA').val(rspt.combinacionEconomica[0].totales.precio + '$');
                $('#inpCostProyectoCIVA').val(rspt.combinacionEconomica[0].totales.precioMasIVA + '$');
                $('#inpCostPorWatt').val(rspt.combinacionEconomica[0].totales.precio_watt + '$');
                $('#inpCostProyectoMXN').val(rspt.combinacionEconomica[0].totales.precioTotalMXN+ '$');

                //Page2_Result
                promedioConsumoMensual = rspt._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;
                generacionMensual = rspt.combinacionOptima[0].power.generacion.promedioDeGeneracion;
                nuevoConsumoBimestral = rspt.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

                $('#inpModeloPanel').val(rspt.combinacionEconomica[0].paneles.nombrePanel);
                $('#inpModeloInversor').val(rspt.combinacionEconomica[0].inversores.vNombreMaterialFot);
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                $('#inpNuevoConsumoMensual').val(nuevoConsumoBimestral/2 + 'kw(' + nuevoConsumoBimestral + '/bim)');
                $('#inpPorcentGeneracion').val(rspt.combinacionEconomica[0].power.porcentajePotencia + '%');

                //Page3_Result
                $('#inpPagoAnteriorProm').val('$'+rspt.combinacionEconomica[0].roi.consumo.consumoBimestralPesosMXN);
                $('#inpPagoNuevoProm').val('$'+rspt.combinacionEconomica[0].roi.generacion.nuevoPagoBimestral);
                $('#inpAhorroMensual').val('$'+rspt.combinacionEconomica[0].roi.ahorro.ahorroMensualEnPesosMXN);
                $('#inpAhorroAnual').val('$'+rspt.combinacionEconomica[0].roi.ahorro.ahorroAnualEnPesosMXN);
                //$('#plROIBruto1').val(rspt.combinacionEconomica[0].roi. + 'años');
                //$('#plROIDeduccion1').val(rspt.combinacionEconomica[0].roi. + 'años');

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

function pintarCombinaciones(rspt){
    var promedioConsumoMensual = rspt._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;

    /* Pildoras_Modal */
    /*             --Combinacion Economica--             */
    /* Se cargan imagenes de logos && equipos */
    /* __logos__ */
    $('#imgLogoPanel1').attr("src", "img/paneles/logo/"+rspt.combinacionEconomica[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor1').attr("src", "img/inversores/logo/"+rspt.combinacionEconomica[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel1').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor1').attr("src", "img/inversores/equipo/"+rspt.combinacionEconomica[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle1').text("Combinacion economica");
    
    //Page1_Result
    $('#plPotenciaNecesaria1').text(rspt.combinacionEconomica[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles1').text(rspt.combinacionEconomica[0].paneles.noModulos);
    $('#plCantidadInversores1').text(rspt.combinacionEconomica[0].inversores.numeroDeInversores);
    $('#plCostoProyectoSIVA1').text(rspt.combinacionEconomica[0].totales.precio + '$');
    $('#plCostoProyectoCIVA1').text(rspt.combinacionEconomica[0].totales.precioMasIVA + '$');
    $('#plCostoWatt1').text(rspt.combinacionEconomica[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = rspt.combinacionEconomica[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = rspt.combinacionEconomica[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel1').text(rspt.combinacionEconomica[0].paneles.nombre);
    $('#plModeloInversor1').text(rspt.combinacionEconomica[0].inversores.vNombreMaterialFot);
    $('#plConsumoMensual1').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual1').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual1').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion1').text(rspt.combinacionEconomica[0].power.porcentajePotencia + '%');

    //Page3_Result
    $('#plPagoPromedioAnterior1').text('$'+rspt.combinacionEconomica[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo1').text('$'+rspt.combinacionEconomica[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual1').text('$'+rspt.combinacionEconomica[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual1').text('$'+rspt.combinacionEconomica[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto1').text(rspt.combinacionEconomica[0].roi. + 'años');
    //$('#plROIDeduccion1').text(rspt.combinacionEconomica[0].roi. + 'años');

    /*             --Combinacion Mediana--             */
    /* Se cargan imagenes de logos && equipos */
    /* __logos__ */
    $('#imgLogoPanel2').attr("src", "img/paneles/logo/"+rspt.combinacionMediana[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor2').attr("src", "img/inversores/logo/"+rspt.combinacionMediana[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel2').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor2').attr("src", "img/inversores/equipo/"+rspt.combinacionMediana[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle2').text('Combinacion mediana');
    
    //Page1_Result
    $('#plPotenciaNecesaria2').text(rspt.combinacionMediana[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles2').text(rspt.combinacionMediana[0].paneles.noModulos);
    $('#plCantidadInversores2').text(rspt.combinacionMediana[0].inversores.numeroDeInversores);
    $('#plCostoProyectoSIVA2').text(rspt.combinacionMediana[0].totales.precio + '$');
    $('#plCostoProyectoCIVA2').text(rspt.combinacionMediana[0].totales.precioMasIVA + '$');
    $('#plCostoWatt2').text(rspt.combinacionMediana[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = rspt.combinacionMediana[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = rspt.combinacionMediana[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel2').text(rspt.combinacionMediana[0].paneles.nombre);
    $('#plModeloInversor2').text(rspt.combinacionMediana[0].inversores.vNombreMaterialFot);
    $('#plConsumoMensual2').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual2').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual2').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion2').text(rspt.combinacionMediana[0].power.porcentajePotencia + '%');

    // //Page3_Result
    $('#plPagoPromedioAnterior2').text('$'+rspt.combinacionMediana[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo2').text('$'+rspt.combinacionMediana[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual2').text('$'+rspt.combinacionMediana[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual2').text('$'+rspt.combinacionMediana[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto2').text(rspt.combinacionMediana[0].roi. + 'años');
    //$('#plROIDeduccion2').text(rspt.combinacionMediana[0].roi. + 'años');

    /*             --Combinacion Optima--             */
    /* Se cargan imagenes de logos &&  equipos */
    /* __logos__ */
    $('#imgLogoPanel3').attr("src", "img/paneles/logo/"+rspt.combinacionOptima[0].paneles.marca.toString()+".png");
    $('#imgLogoInversor3').attr("src", "img/inversores/logo/"+rspt.combinacionOptima[0].inversores.vMarca.toString()+".png");
    /* __equipos__ */
    $('#imgPanel3').attr("src", "img/paneles/equipo/panel.png");
    $('#imgInversor3').attr("src", "img/inversores/equipo/"+rspt.combinacionOptima[0].inversores.vMarca.toString()+".jpg");
    /* Se llenan labels_pills de data */
    $('#combinacionTitle3').text('Combinacion optima');

    //Page1_Result
    $('#plPotenciaNecesaria3').text(rspt.combinacionOptima[0].paneles.potenciaReal+'kw');
    $('#plCantidadPaneles3').text(rspt.combinacionOptima[0].paneles.noModulos);
    $('#plCantidadInversores3').text(rspt.combinacionOptima[0].inversores.numeroDeInversores);
    $('#plCostoProyectoSIVA3').text(rspt.combinacionOptima[0].totales.precio + '$');
    $('#plCostoProyectoCIVA3').text(rspt.combinacionOptima[0].totales.precioMasIVA + '$');
    $('#plCostoWatt3').text(rspt.combinacionOptima[0].totales.precio_watt + '$');

    //Page2_Result
    var generacionMensual = rspt.combinacionOptima[0].power.generacion.promedioDeGeneracion;
    var nuevoConsumoBimestral = rspt.combinacionOptima[0].power.nuevosConsumos.promedioConsumoBimestral;

    $('#plModeloPanel3').text(rspt.combinacionOptima[0].paneles.nombre);
    $('#plModeloInversor3').text(rspt.combinacionOptima[0].inversores.vNombreMaterialFot);

    $('#plConsumoMensual3').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
    $('#plGeneracionMensual3').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
    $('#plNuevoConsumoMensual3').text(nuevoConsumoBimestral / 2 + ' kw(' + nuevoConsumoBimestral + '/bim)');
    $('#plPorcentajeGeneracion3').text(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

    // //Page3_Result
    $('#plPagoPromedioAnterior3').text('$'+rspt.combinacionOptima[0].roi.consumo.consumoBimestralPesosMXN);
    $('#plPagoPromedioNuevo3').text('$'+rspt.combinacionOptima[0].roi.generacion.nuevoPagoBimestral);
    $('#plAhorroMensual3').text('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroMensualEnPesosMXN);
    $('#plAhorroAnual3').text('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroAnualEnPesosMXN);
    //$('#plROIBruto3').text(rspt.combinacionOptima[0].roi. + 'años');
    //$('#plROIDeduccion3').text(rspt.combinacionOptima[0].roi. + 'años');
}
/*#endregion*/

//Generar PDF or QR-Code
function catchDataResults(){
    ///Falta implementar una validacion (esta debe de ser general, ya que esta funcion se implementara para las 3 posibles tipoCotizacion)
    var data = {};

    if($('#salvarCombinacion').prop('checked')){///Combinaciones
        console.log('checked');
        idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
        combSeleccionada = $('#listConvinaciones').val();
        dataCombinaciones = sessionStorage.getItem("arrayCombinaciones");

        data = {
            _token: $("meta[name='csrf-token']").attr('content'),
            idCliente: idCliente,
            dataCombinaciones: dataCombinaciones,
            combSeleccionada: combSeleccionada,
            combinacionesPropuesta: true
        };
    }   
    else{///Equipo seleccionado
        console.log('not checked');
        var valListInvers = $('#listInversores').val();

        //Se valida que la dropDownListInversores no este vacia
        if(valListInvers != -1){
            var ssObjPropuestaEquipoSeleccionado = sessionStorage.getItem("answPropuesta");
            idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
            _consummo = sessionStorage.getItem("ssObjConsumos");

            data = {
                _token: $("meta[name='csrf-token']").attr('content'),
                idCliente: idCliente,
                consumos: _consummo,
                propuesta: ssObjPropuestaEquipoSeleccionado,
                combinacionesPropuesta: false
            };
        }
    }

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/PDFgenerate',
        dataType: 'json',
        data: data
    })
    .fail(function(err){
        console.log('Error: '+JSON.stringify(err));
        alert('Error al querer intentar datos del PDF al servidor');
    })
    .done(function(pdfBase64){
        //Se formatea la respuesta del pdfBase64
        pdfBase64 = pdfBase64.message; //Respuesta de la API - JSON
        nombreArchivoPDF = pdfBase64.fileName;
        pdfBase64 = pdfBase64.pdfBase64; //Se obtiene el base64 decodificado

        //Se activan los botones que generan el //QR || PDF//
        $('#btnGenerarQrCode').prop("disabled",false);
        $('#btnGenerarPdfFileViewer').prop("disabled",false);

        // $('#btnGenerarQrCode').on('click', function(){ 
            //Mostrar un QR-Code el cual redireccione a la descarga/visualizacion del pdfBase64 en pdfFile


            // var codigoQr = new QRCode(document.getElementById("divQrCodeViewer"));
            // codigoQr.clear();
            // codigoQr.makeCode("archivoPDF"); //Se pasa el documento PDF al codigoQR

            // console.log('Generando codigo QR');
        // });         

        $('#btnGenerarPdfFileViewer').on('click', function(){
            //Mostrar el pdfBase64 en un iFrame (ventana navegador nueva)
            let pdfWindow = window.open("");
            pdfWindow.document.write(
                "<iframe id='iframePDF' width='100%' height='100%' src='data:application/pdf;base64, " +encodeURI(pdfBase64)+ "' frameborder='0'></iframe>"
            );

            console.log('Nombre pdfFile:\n'+nombreArchivoPDF);
            console.log('Generando pdf. . .');
        });
    });
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

function limpiarCampos(){ /* Combinaciones_Section */
    $('.inpAnsw').val('');
    $('.smallIndicator').text('').val('');
}

function salvarCombinacion(){
    var valueLogic = 0;
    
    $('#salvarCombinacion').click(function(){
        if(valueLogic === 0){
            $('#listConvinaciones').attr("disabled", true);
            $('#btnGuardarPropuesta').prop("disabled", false);
            $('#btnGenerarEntregable').prop("disabled", false);

            valueLogic = 1;
        }
        else{
            $('#listConvinaciones').attr("disabled", false);
            $('#btnGuardarPropuesta').prop("disabled", true);
            $('#btnGenerarEntregable').prop("disabled", true);

            valueLogic = 0;
        }
    });
}

/*#region RegenerarPropuesta*/
function sliderModificarPropuesta(){
    if($('#btnModificarPropuesta').is(":disabled")){ //El boton de "modificar_propuesta" se encuentra inhabilitado
        $('#btnModificarPropuesta').attr("disabled",false); //Se habilita el boton de "modificar_propuesta"
    }
}

function modificarPropuesta(){
    //Se cambia de estado el dropDownList de "Inversores" a -1 (para que se vacie de los inversores anteriores y traiga los nuevos de la propuesta modificada)
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
    sendCotizacionBajaTension(dataPorcentajes);
}

function getVistaDeResultadosPropuestaModificada(dataResp){
    dataResp = dataResp.message; //Propuesta editada

    // console.log("getResultadosPropuestaModificada says:");
    // console.log(dataResp);

    llenarControlesConRespuesta_Paneles(dataResp);
}
/*#endregion*/