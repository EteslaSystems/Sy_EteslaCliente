var dataCatchResults = [];

$(function(){
    chooseSwitch();
    salvarCombinacion();
    logicBtns_GP_GE();
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

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/sendPeriodsBT',
        data: data,
        dataType: 'json'
    })
    .fail(function(){
        alert('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
    })
    .done(function(respuesta){
        console.log('Paneles array says:\n');
        console.log(respuesta);

        if(respuesta.status == '500'){
            alert('Error al intentar ejecutar su propuesta!');
        }
        else{
            console.log("un paso antes de mostrar la vista de resultados, says: ");
            console.log(respuesta);

            if(dataEdited === null){ //Propuesta nueva
                respuesta = { respuesta: respuesta.message, nwdata: data };

                //Se pinta vista de -resultados- y llena DropDownList de -Paneles-
                getResultsView(respuesta);
            }
            else{ //Propuesta editada
                getVistaDeResultadosPropuestaModificada(respuesta);
            }
        }
    });
}

function getResultsView(_respuesta){
    nwdata = _respuesta.nwdata;
    _respuesta = _respuesta.respuesta;

    //Se genera un sessionStorage que contendra un object sobre la Energia requerida y los consumos ya procesados
    sessionStorage.setItem("_consumsFormated",JSON.stringify(_respuesta[0]));

    //Se trae la vista de *RESULTADOS* a la vista de *BAJA_TENSION*
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'GET',
        url: '/resultados'
    })
    .fail(function(){
        alert('Al parecer hubo un error al intentar cargar vista de resultados');
    })
    .done(function(resultView){
        $('#divCotizacionBajaTension').css("display","none");
        $('#divBtnCalcularBT').css("display","none");
        $('#divResultCotizacionBT').css("display","");
        $('#divResult_bt').html(resultView);

        //Combinaciones_Propuesta
        askCombination(nwdata);

        /////////SaveInSessionStorage
        sessionStorage.setItem("ssObjConsumos", JSON.stringify(_respuesta));

        //Se llenan los controles relacionados con la primera respuesta de la propuesta
        llenarControlesConRespuesta_Paneles(_respuesta);
    });
}

function llenarControlesConRespuesta_Paneles(_respuest){
    var banderaLog = 0; //Sirve para saber si el dropDownListPaneles a sido llenado anteriormente [Correccion del bug: Se llenaba el dropDownListInversores, 2 veces y aparecian equipos de inversores, repetidos]

    //Se carga dropDownList -Paneles-
    fullDropDownListPaneles(_respuest);

    $('#listPaneles').change(function(){
        $('#listInversores').val(-1);
        var x = parseInt($('#listPaneles').val()); //Iteracion
                    
        if(x === '-1'  || x === -1){
            // /Tabla_oculta\
            $('#numeroModulos').html('');
            $('#potenciaModulo').html('');
            $('#potenciaReal').html('');
            $('#precioModulo').html('');
            $('#costoEstructuras').val('');

            $('#inpCostTotalPaneles').val('');
            $('#listInversores').prop("disabled", true);
            $('#listInversores').val("-1");

            //Se esconde pestania de : POWER
            $('#navPower').css("display","none");
            $('#power').css("display","none");

            //Desaparece cantidad (numerito) de -Paneles y Estructuras-
            $('#txtCantidadPaneles').html('');
            $('#txtCantidadEstructuras').html('');

            //Se limpian results de result_paneles
            limpiarResultados(0);
        }
        else{
            _potenciaReal = _respuest[x].panel.potenciaReal;

            // /Tabla_oculta\
            $('#inpMarcaPanelS').val(_respuest[x].panel.marca);

            //Consumos
            var promedioConsumoMensual = _respuest[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
            $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
            //Paneles 
            $('#inpModeloPanel').val(_respuest[x].panel.nombre)
            $('#numeroModulos').html(_respuest[x].panel.noModulos).val(_respuest[x].panel.noModulos);
            $('#potenciaModulo').html(_respuest[x].panel.potencia + 'W').val(_respuest[x].panel.potencia);
            $('#potenciaReal').html(_potenciaReal + 'W').val(_potenciaReal);
            $('#costoEstructuras').html(_respuest[x].panel.costoDeEstructuras + '$').val(_respuest[x].panel.costoDeEstructuras);
            $('#costoPorWatt').html(_respuest[x].panel.precioPorPanel + '$').val(_respuest[x].panel.precioPorPanel);
            $('#costoTotalModulos').html(_respuest[x].panel.costoTotal + '$').val(_respuest[x].panel.costoTotal);
            
            //Pintada de resultados - Paneles
            $('#inpCantidadPaneles').val(_respuest[x].panel.noModulos);
            $('#inpModeloPanel').val(_respuest[x].panel.nombre);
            $('#inpPotencia').val(_respuest[x].panel.potenciaReal + 'Kw');

            //Aparece cantidad (numerito) de -Paneles y Estructuras-
            $('#txtCantidadPaneles').html('('+_respuest[x].panel.noModulos+')');
            $('#txtCantidadEstructuras').html('('+_respuest[x].panel.noModulos+')');

            $('#listInversores').prop("disabled", false);

            //Se carga dropDownList -Inversores-
            fullDropDownListInversoresSelectos(_potenciaReal);
        }
    });
}

function fullDropDownListPaneles(_respuesta){
    var dropDownListPaneles = $('#listPaneles');

    //Se limpia dropDownListPaneles
    // dropDownListPaneles.empty();

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
}

function fullDropDownListInversoresSelectos(_potenciaReal){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/inversoresSelectos',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "potenciaReal": _potenciaReal
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

        //DropDownList-Inversores
        for(var j=0; j<response.length; j++)
        {
            $('#listInversores').append(
                $('<option/>', {
                    value: j,
                    text: response[j].vNombreMaterialFot
                })
            );
        }
        
        $('#listInversores').change(function(){
            var xi = $('#listInversores').val(); //Iteracion

            if(xi === '-1' || xi === -1){
                // /Tabla_oculta\
                $('#cantidadInversores').html('').val('');
                $('#potenciaInversor').html('').val('');
                $('#potenciaMaximaInv').html('').val('');
                $('#potenciaNominalInv').html('').val('');
                $('#potenciaPicoInv').html('').val('');
                $('#porcentajeSobreDim').html('').val('');
                $('#precioInv').html('').val('');
                $('#divTotalesProject').css("display","");

                //Se bloquean botones de GenerarPDF y GuardarPropuesta
                $('#btnGuardarPropuesta').prop("disabled", true);
                $('#btnGenerarEntregable').prop("disabled", true);

                //Se limpian inputs de resultados
                limpiarResultados(1);

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

                //Se calculan viaticos
                calcularViaticosBT();
            }
        });
    });
}

function calcularViaticosBT(){
    tarifaSelected = document.getElementById('tarifa-actual').value;
    var direccionCliente = document.getElementById('municipio').value;

    /*#region Se cargan las variables que se enviaran por la solicitud, a traves de la extraccion del val() del control/input que lo contiene*/
    /*#region Datos requeridos para poder calcular viaticos y totales*/
    ///Panel
    var potenciaPanel = $('#potenciaModulo').val();
    var cantidadPaneles = $('#numeroModulos').val();
    var potenciaReal = $('#potenciaReal').val();
    var precioPorWatt = $('#costoPorWatt').val();
    var costoDeEstructuras = $('#costoEstructuras').val();
    var costoTotalPaneles = $('#costoTotalModulos').val();
    ///Inversor
    var potenciaInversor = $('#potenciaInversor').val();
    var potenciaNominalInversor = $('#potenciaNominalInv').val();0
    var precioInversor = $('#precioInv').val();
    var potenciaMaximaInversor = $('#potenciaMaximaInv').val();
    var numeroDeInversores = $('#cantidadInversores').val();
    var potenciaPicoInversor = $('#potenciaPicoInv').val();
    var porcentajeSobreDimens = $('#porcentajeSobreDim').val();
    var costoTotalInversores = $('#costoTotalInversores').val();
    /*#endregion*/

    var consumptions = sessionStorage.getItem("_consumsFormated"); ///Formateado de consumos -> promedioMensual,Bimestral,Anual,etc
    var descuento = sessionStorage.getItem("descuentoPropuesta") || 0;

    objPeriodosGDMTH = {
        panel: {
            potencia: potenciaPanel,
            noModulos: cantidadPaneles,
            potenciaReal: potenciaReal,
            precioPorWatt: precioPorWatt,
            costoDeEstructuras: costoDeEstructuras,
            costoTotal: costoTotalPaneles
        },
        inversor: {
            fPotencia: potenciaInversor,
            potenciaNominal: potenciaNominalInversor,
            fPrecio: precioInversor,
            iPMAX: potenciaMaximaInversor,
            numeroDeInversores: numeroDeInversores,
            potenciaPico: potenciaPicoInversor,
            porcentajeSobreDimens: porcentajeSobreDimens,
            precioTotal: costoTotalInversores
        }
    }

    _cotizaViaticos.push(objPeriodosGDMTH);

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

        sessionStorage.setItem("answPropuesta", JSON.stringify(answ));

        var objResp = sessionStorage.getItem("ssObjConsumos");
        objResp = JSON.parse(objResp);

        console.log('Viaticos: ');
        console.log(answ);

        //Se pintan los resultados del calculo de viaticos
        promedioConsumoMensual = objResp[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
        generacionMensual = answ[0].power.generacion.promedioDeGeneracion;
        nuevoConsumoMensual = answ[0].power.nuevosConsumos[0];

        $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
        $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
        $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
    /*#endregion*/
}

/*#region Combinaciones (busqueda_inteligente)*/
function askCombination(nwData){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/askCombinations',
        data: nwData,
        dataType: 'json'
    })
    .fail(function(){
        alert('Hubo un error al intentar solicitar la combinacion '+ixu.toString());
    })
    .done(function(rspt){
        var rspt = rspt.message;
        rspt = rspt[0]; //Array de combinaciones

        $('#listConvinaciones').prop("disabled", false); //Se desbloque DropDownList-Combinaciones
        $('#btnDivCombinaciones').prop("disabled", false);//Se desbloquea boton-divCombinaciones

        sessionStorage.setItem("arrayCombinaciones", JSON.stringify(rspt));

        console.log("Combinaciones says: ");
        console.log(rspt);

        var promedioConsumoMensual = rspt._arrayConsumos.consumo._promCons.consumoMensual.promedioConsumoMensual;

        /* Se pintan las combinaciones en el div_combinaciones */
        if(rspt.combinacionEconomica){
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
            var nuevoConsumoMensual = rspt.combinacionEconomica[0].power.nuevosConsumos[0];

            $('#plModeloPanel1').text(rspt.combinacionEconomica[0].paneles.nombre);
            $('#plModeloInversor1').text(rspt.combinacionEconomica[0].inversores.vNombreMaterialFot);
            $('#plConsumoMensual1').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
            $('#plGeneracionMensual1').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
            $('#plNuevoConsumoMensual1').text(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
            var nuevoConsumoMensual = rspt.combinacionMediana[0].power.nuevosConsumos[0];

            $('#plModeloPanel2').text(rspt.combinacionMediana[0].paneles.nombre);
            $('#plModeloInversor2').text(rspt.combinacionMediana[0].inversores.vNombreMaterialFot);
            $('#plConsumoMensual2').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
            $('#plGeneracionMensual2').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
            $('#plNuevoConsumoMensual2').text(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
            var nuevoConsumoMensual = rspt.combinacionOptima[0].power.nuevosConsumos[0];

            $('#plModeloPanel3').text(rspt.combinacionOptima[0].paneles.nombre);
            $('#plModeloInversor3').text(rspt.combinacionOptima[0].inversores.vNombreMaterialFot);

            $('#plConsumoMensual3').text(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
            $('#plGeneracionMensual3').text(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
            $('#plNuevoConsumoMensual3').text(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim)');
            $('#plPorcentajeGeneracion3').text(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

            // //Page3_Result
            $('#plPagoPromedioAnterior3').text('$'+rspt.combinacionOptima[0].roi.consumo.consumoBimestralPesosMXN);
            $('#plPagoPromedioNuevo3').text('$'+rspt.combinacionOptima[0].roi.generacion.nuevoPagoBimestral);
            $('#plAhorroMensual3').text('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroMensualEnPesosMXN);
            $('#plAhorroAnual3').text('$'+rspt.combinacionOptima[0].roi.ahorro.ahorroAnualEnPesosMXN);
            //$('#plROIBruto3').text(rspt.combinacionOptima[0].roi. + 'años');
            //$('#plROIDeduccion3').text(rspt.combinacionOptima[0].roi. + 'años');
        }
        else{
            alert('Error al intentar dotar los DIV de combinaciones');
        }

        //DropDownList de combinaciones
        $('#listConvinaciones').change(function(){
            var valueOfListCombinaciones = $('#listConvinaciones').val();

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
                    nuevoConsumoMensual = rspt.combinacionOptima[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionOptima[0].paneles.nombre);
                    $('#inpModeloInversor').val(rspt.combinacionOptima[0].inversores.vNombreMaterialFot);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim)');
                    $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim)');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
                    nuevoConsumoMensual = rspt.combinacionMediana[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionMediana[0].paneles.nombre);
                    $('#inpModeloInversor').val(rspt.combinacionMediana[0].inversores.vNombreMaterialFot);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                    $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + 'kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
                    nuevoConsumoMensual = rspt.combinacionEconomica[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionEconomica[0].paneles.nombrePanel);
                    $('#inpModeloInversor').val(rspt.combinacionEconomica[0].inversores.vNombreMaterialFot);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim)');
                    $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim)');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + 'kw(' + nuevoConsumoMensual * 2 + '/bim)');
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
    });
}
/*#endregion*/


function generarEntregable(data){

}

function guardarPropuesta(data){

}

//Logic - Resultados_propuesta
function logicBtns_GP_GE(){ /* GP=>GuardarPropuesta, GE=>GenerarEntregable */
    $('#btnGuardarPropuesta').click(function(){
        catchDataResults();
        // console.log(data);
        // generarEntregable(data);
    });

    $('#btnGenerarEntregable').click(function(){
        catchDataResults();
        // console.log(data);
        // generarEntregable(data);
    });
}

function catchDataResults(){
    ///Falta implementar una validacion (esta debe de ser general, ya que esta funcion se implementara para las 3 posibles tipoCotizacion)
    var data = {};

    if($('#salvarCombinacion').prop('checked')){
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
    else{
        console.log('not checked');
        var valListInvers = $('#listInversores').val();

        //Se valida que la dropDownListInversores no este vacia
        if(valListInvers != -1){
            var ssObjPropuestaEquipoSeleccionado = sessionStorage.getItem("answPropuesta");
            idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
            // _consummo = sessionStorage.getItem("ssObjConsumos");
            nombrePanel = $('#inpModeloPanel').val();
            marcaPanel = $('#inpMarcaPanelS').val();
            cantidadPanel = $('#inpCantidadPaneles').val();
        }

        data = {
            _token: $("meta[name='csrf-token']").attr('content'),
            idCliente: idCliente,
            proyecto: {
                panel: {
                    nombre: nombrePanel,
                    marca: marcaPanel,
                    cantidad: cantidadPanel
                },
                propuesta: ssObjPropuestaEquipoSeleccionado
            },
            combinacionesPropuesta: false
        };
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
        //Se activan los botones que generan el //QR || PDF//
        $('#btnGenerarQrCode').prop("disabled",false);
        $('#btnGenerarPdfFileViewer').prop("disabled",false);

        //Se formatea la respuesta del ArchivoPDF_base64
        pdfBase64 = pdfBase64.message; //Respuesta de la API - JSON
        nombreArchivoPDF = pdfBase64.fileName;
        pdfBase64 = pdfBase64.pdfBase64; //Se obtiene el base64 decodificado
        /*
            1.-Abrir un modal en donde te extienda las opciones de -QR Code- y -PdfFileView
            
            Nota: Si se selecciona el PDF Viewer, bloquear el boton una vez clickeado
                  y cuando se cierre el modal, este boton regrese a la normalidad.
        */        

        $('#btnGenerarQrCode').on('click', function(){ //Boton QR-Code
            // var codigoQr = new QRCode(document.getElementById("divQrCodeViewer"));
            // codigoQr.clear();
            // codigoQr.makeCode("archivoPDF"); //Se pasa el documento PDF al codigoQR

            // console.log('Generando codigo QR');
        });         

        $('#btnGenerarPdfFileViewer').on('click', function(){
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
        $('#inpCostTotalPaneles').val('');
        $('#potenciaModulo').val('');
        $('#numeroModulos').val('');
        $('#potenciaReal').val('');
        $('#costoPorWatt').val('');
        $('#costoEstructuras').val('');
        $('#costoTotalModulos').val('');

        /*Limpiar estructuras_result*/
        $('#inpCostTotalEstructuras').val('').text('');
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

        $('#inpConsumoMensual').val('');
        $('#inpGeneracionMensual').val('');
        $('#inpNuevoConsumoMensual').val('');
        $('#inpPorcentGeneracion').val('');

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
    $("#listInversores").val('-1');
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

    console.log("getVistaDeResultadosPropuestaModificada says:");
    console.log(dataResp);

    llenarControlesConRespuesta_Paneles(dataResp);
}
/*#endregion*/