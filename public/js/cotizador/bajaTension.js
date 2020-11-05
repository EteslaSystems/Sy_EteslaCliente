var direccionCliente = '';
var tarifaSelected = '';
var tipoCotizacion = 'bajaTension';
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
    tarifaSelected = $('#tarifa-actual').val().toString();

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
function sendCotizacionBajaTension(){
    
    var direccionCliente = document.getElementById('municipio').value;

    if(validarUsuarioCargado(direccionCliente) === true){
        var _consumos = catchConsumption();

        console.log('catchConsumpion() says: ');
        console.log(_consumos);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                'consumos': _consumos,
                'direccionCliente': direccionCliente,
                'tarifa': tarifaSelected
            },
            dataType: 'json'
        })
        .fail(function(){
            alert('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
        })
        .done(function(respuesta){
            console.log(respuesta);

            //Se pinta vista de -resultados- y llena DropDownList de -Paneles-
            getResultsView(respuesta);
        });
    }
}

var _respuesta;

function getResultsView(_respuesta){
    _respuesta = _respuesta.message;

    console.log('_respuesta says: ');
    console.log(_respuesta);

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

        //Main() - Combinaciones_SmartSearch
        askCombination();

        //Se carga dropDownList -Paneles-
        fullDropDownListPaneles(_respuesta);

        //Se pintan resultados de -Energia/Paneles_Requeridos-
        //Consumo - /Tabla_oculta\
        /* $('#consumoAnual').html(_respuesta[0].consumo.consumoAnual + 'W');
        $('#potenciaNecesaria').html(_respuesta[0].consumo.potenciaNecesaria + 'W');
        $('#promedioConsumo').html(_respuesta[0].consumo.promedioConsumo + 'W'); */

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
                _potenciaReal = _respuesta[x].panel.potenciaReal;

                // /Tabla_oculta\
                $('#inpMarcaPanelS').val(_respuesta[x].panel.marca);

                //Consumos
                var promedioConsumoMensual = _respuesta[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
                $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
                //Paneles 
                $('#inpModeloPanel').val(_respuesta[x].panel.nombre)
                $('#numeroModulos').html(_respuesta[x].panel.noModulos).val(_respuesta[x].panel.noModulos);
                $('#potenciaModulo').html(_respuesta[x].panel.potencia + 'W').val(_respuesta[x].panel.potencia);
                $('#potenciaReal').html(_potenciaReal + 'W').val(_potenciaReal);
                //$('#precioModulo').html(_respuesta[x].panel.precioPanel + '$').val(_respuesta[x].panel.precioPanel);
                $('#costoEstructuras').html(_respuesta[x].panel.costoDeEstructuras + '$').val(_respuesta[x].panel.costoDeEstructuras);
                $('#costoPorWatt').html(_respuesta[x].panel.costoPorWatt + '$').val(_respuesta[x].panel.costoPorWatt);
                $('#costoTotalModulos').html(_respuesta[x].panel.costoTotalPaneles + '$').val(_respuesta[x].panel.costoTotalPaneles);
                
                //Pintada de resultados - Paneles
                $('#inpCantidadPaneles').val(_respuesta[x].panel.noModulos);
                $('#inpModeloPanel').val(_respuesta[x].panel.nombre);
                $('#inpPotencia').val(_respuesta[x].panel.potenciaReal + 'Kw');

                //Aparece cantidad (numerito) de -Paneles y Estructuras-
                $('#txtCantidadPaneles').html('('+_respuesta[x].panel.noModulos+')');
                $('#txtCantidadEstructuras').html('('+_respuesta[x].panel.noModulos+')');

                $('#listInversores').prop("disabled", false);

                //Se carga dropDownList -Inversores-
                fullDropDownListInversoresSelectos(_potenciaReal);

                //cargarPowerPageBT();
                
            }
        });
    });
}

function cargarPowerPageBT(){
    /*[Hoja: POWER]*/
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/powerBT',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "arrayPeriodosGDMTH": arrayPeriodosGDMTH,
            "porcentajePerdida": porcentajePerdida,
            "potenciaReal": _potenciaReal
        },
        dataType: 'json'
    })
    .fail(function(){
        alert('Error al intentar generar calculos de [Hoja: POWER]');
    })
    .done(function(resp){
        resp = resp.message;
        
        console.log('[Hoja: POWER]');
        console.log(resp);

        /* $('#tdProduccionAnualKwh').text(resp[0].arrayProduccionAnual[0].produccionAnualKwh);
        $('#tdProduccionAnualMwh').text(resp[0].arrayProduccionAnual[0].produccionAnualMwh);
        $('#tdTotalSinSolar').text(resp[0].arrayPagosTotales[0].arrayTotalesAhorro[0].totalSinSolar);
        $('#tdTotalConSolar').text(resp[0].arrayPagosTotales[0].arrayTotalesAhorro[0].totalConSolar);
        $('#tdAhorro').text(resp[0].arrayPagosTotales[0].arrayTotalesAhorro[0].ahorroCifra);
        $('#tdAhorroPorcentaje').text(resp[0].arrayPagosTotales[0].arrayTotalesAhorro[0].ahorroPorcentaje+'%');
        
        arrayResponse = resp[0].arrayPagosTotales[0].arrayPagosTotales;

        $('#listPagosTotales').change(function(){
            valueListPagosTotales = $('#listPagosTotales').val();

            for(var i=0; i<arrayResponse.length; i++){
                if(valueListPagosTotales == "optSinSolar"){
                    $('#inpEnergia'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].sinSolar.energia);
                    $('#inpCapacidad'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].sinSolar.capacidad);
                    $('#inpDistribucion'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].sinSolar.distribucion);
                    $('#inpIVA'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].sinSolar.iva);
                    $('#inpTotal'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].sinSolar.total);
                }
                else if(valueListPagosTotales == "optConSolar"){
                    $('#inpTransmision'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.transmision);
                    $('#inpEnergia'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.energia);
                    $('#inpCapacidad'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.capacidad);
                    $('#inpDistribucion'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.distribucion);
                    $('#inpIVA'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.iva);
                    $('#inpTotal'+i).text(resp[0].arrayPagosTotales[0].arrayPagosTotales[i].conSolar.total);
                }
                else{
                    $('#inpTransmision'+i).text('');
                    $('#inpEnergia'+i).text('');
                    $('#inpCapacidad'+i).text('');
                    $('#inpDistribucion'+i).text('');
                    $('#inpIVA'+i).text('');
                    $('#inpTotal'+i).text('');
                }
            }
        }); */

        $('#navPower').css("display","");
        $('#power').css("display","");
    });
}

function fullDropDownListPaneles(_respuesta){
    //DropDownList-Paneles
    for(var i=1; i<_respuesta.length; i++)
    {
        $('#listPaneles').append(
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
                    text: response[j].nombreInversor
                })
            );
        }
        
        $('#listInversores').change(function(){
            var xi = $('#listInversores').val(); //Iteracion

            if(xi === '-1' || xi === -1){
                // /Tabla_oculta\
                $('#cantidadInversores').html('');
                $('#potenciaInversor').html('');
                $('#potenciaMaximaInv').html('');
                $('#potenciaNominalInv').html('');
                $('#potenciaPicoInv').html('');
                $('#porcentajeSobreDim').html('');
                $('#precioInv').html('');
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
                //Se desbloquean botones de GenerarPDF y GuardarPropuesta
                $('#btnGuardarPropuesta').prop("disabled", false);
                $('#btnGenerarEntregable').prop("disabled", false);

                //Panel de ajuste de cotizacion - Aparece
                $('#btnModalAjustePropuesta').attr("disabled",false);

                //Se agrega nmerito -Cantidad_Inversores-
                $('#txtCantidadInversores').html('('+response[xi].numeroDeInversores+')');

                //Se cargan los inputs de la vista
                $('#inpCostTotalInversores').val(response[xi].precioTotalInversores);

                //Inversores  - /Tabla_oculta\
                $('#cantidadInversores').html(response[0].numeroDeInversores).val(response[0].numeroDeInversores);
                $('#potenciaInversor').html(response[0].potenciaInversor + 'W').val(response[0].potenciaInversor);
                $('#potenciaMaximaInv').html(response[0].potenciaMaximaInversor + 'W').val(response[0].potenciaMaximaInversor);
                $('#potenciaNominalInv').html(response[0].potenciaNominalInversor + 'W').val(response[0].potenciaNominalInversor);
                $('#potenciaPicoInv').html(response[0].potenciaPicoInversor + 'W').val(response[0].potenciaPicoInversor);
                $('#porcentajeSobreDim').html(response[0].porcentajeSobreDimens + '%').val(response[0].porcentajeSobreDimens);
                $('#precioInv').html(response[0].precioInversor + '$').val(response[0].precioInversor); 
                $('#costoTotalInversores').html(response[0].precioTotalInversores + '$').val(response[0].precioTotalInversores);

                ///Pintada de resultados - Inversor
                $('#inpCantidadInvers').val(response[xi].numeroDeInversores);
                $('#inpModeloInversor').val(response[xi].nombreInversor);

                //Se calculan viaticos
                calcularViaticosBT();
            }
        });
    });
}

function calcularViaticosBT(){
    direccionCliente = document.getElementById('municipio').value;
    /*#region Se cargan las variables que se enviaran por la solicitud, a traves de la extraccion del val() del control/input que lo contiene*/
    /*Viaticos y Totales*/
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
    var potenciaNominalInversor = $('#potenciaNominalInv').val();
    var precioInversor = $('#precioInv').val();
    var potenciaMaximaInversor = $('#potenciaMaximaInv').val();
    var numeroDeInversores = $('#cantidadInversores').val();
    var potenciaPicoInversor = $('#potenciaPicoInv').val();
    var porcentajeSobreDimens = $('#porcentajeSobreDim').val();
    var costoTotalInversores = $('#costoTotalInversores').val();
    /*#endregion*/

    var consumptions = catchConsumption();

    objPeriodosGDMTH = {
        panel: {
            potenciaPanel: potenciaPanel,
            cantidadPaneles: cantidadPaneles,
            potenciaReal: potenciaReal,
            precioPorWatt: precioPorWatt,
            costoDeEstructuras: costoDeEstructuras,
            costoTotalPaneles: costoTotalPaneles
        },
        inversor: {
            potenciaInversor: potenciaInversor,
            potenciaNominalInversor: potenciaNominalInversor,
            precioInversor: precioInversor,
            potenciaMaximaInversor: potenciaMaximaInversor,
            numeroDeInversores: numeroDeInversores,
            potenciaPicoInversor: potenciaPicoInversor,
            porcentajeSobreDimens: porcentajeSobreDimens,
            costoTotalInversores: costoTotalInversores
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
            "consumos": consumptions
        },
        dataType: 'json'
    })
    .fail(function(){
        alert('Hubo un error al intentar de obtener los viaticos y totales');
    })
    .done(function(answ){
        var answ = answ.message;
        
        console.log('Viaticos: ');
        console.log(answ);

        //Se pintan los resultados del calculo de viaticos
        // /Interfaz_visible\
        $('#inpCostProyectoSIVA').val(answ[0].totales.precio + '$');
        $('#inpCostProyectoCIVA').val(answ[0].totales.precioMasIVA + '$');
        $('#inpCostPorWatt').val(answ[0].totales.precio_watt + '$');
        $('#inpCostProyectoMXN').val('$' +answ[0].totales.precioTotalMXN);
    });
}
/*#region Combinaciones (busqueda_inteligente)*/
function askCombination(){
    var promedioConsumoMensual = 0;
    var generacionMensual = 0;
    var nuevoConsumoMensual = 0;
    var _consumos = catchConsumption();
    direccionCliente = document.getElementById('municipio').value;

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/askCombinations',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            'consumos': _consumos,
            'direccionCliente': direccionCliente,
            'tarifa': tarifaSelected
        },
        dataType: 'json'
    })
    .fail(function(){
        alert('Hubo un error al intentar solicitar la combinacion '+ixu.toString());
    })
    .done(function(rspt){
        $('#listConvinaciones').prop("disabled", false); //Se desbloque DropDownList-Combinaciones
        $('#btnDivCombinaciones').prop("disabled", false);//Se desbloquea boton-divCombinaciones

        var rspt = rspt.message;
        rspt = rspt[0]; //Array de combinaciones

        console.log("Combinaciones says: ");
        console.log(rspt);

        /* Se pintan las combinaciones en el div_combinaciones */
        if(rspt.combinacionEconomica){

            /*             --Combinacion Economica--             */
            /* Se cargan imagenes de logos && equipos */
            /* __logos__ */
            $('#imgLogoPanel1').attr("src", "img/paneles/logo/"+rspt.combinacionEconomica[0].paneles.marcaPanel.toString()+".png");
            $('#imgLogoInversor1').attr("src", "img/inversores/logo/"+rspt.combinacionEconomica[0].inversores.marcaInversor.toString()+".png");
            /* __equipos__ */
            $('#imgPanel1').attr("src", "img/paneles/equipo/panel.png");
            $('#imgInversor1').attr("src", "img/inversores/equipo/"+rspt.combinacionEconomica[0].inversores.marcaInversor.toString()+".jpg");
            /* Se llenan labels_pills de data */
            $('#combinacionTitle1').text("Combinacion economica");
            
            //Page1_Result
            $('#plCantidadPaneles1').text(rspt.combinacionEconomica[0].paneles.cantidadPaneles);
            $('#plCantidadInversores1').text(rspt.combinacionEconomica[0].inversores.numeroDeInversores);
            $('#plCostoProyectoSIVA1').text(rspt.combinacionEconomica[0].totales.precio + '$');
            $('#plCostoProyectoCIVA1').text(rspt.combinacionEconomica[0].totales.precioMasIVA + '$');
            $('#plCostoWatt1').text(rspt.combinacionEconomica[0].totales.precio_watt + '$');

            //Page2_Result
            $('#plModeloPanel1').text(rspt.combinacionEconomica[0].paneles.nombrePanel);
            $('#plModeloInversor1').text(rspt.combinacionEconomica[0].inversores.nombreInversor);
            //$('#plConsumoMensual1').text(rspt.combinacionEconomica[0].);
            //$('#plGeneracionMensual1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plNuevoConsumoMensual1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plPorcentajeGeneracion1').text(rspt.combinacionEconomica[0]. + '$');

            //Page3_Result
            //$('#plPagoPromedioAnterior1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plPagoPromedioNuevo1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plAhorroMensual1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plAhorroAnual1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plROIBruto1').text(rspt.combinacionEconomica[0]. + '$');
            //$('#plROIDeduccion1').text(rspt.combinacionEconomica[0]. + '$');

            /*             --Combinacion Mediana--             */
            /* Se cargan imagenes de logos && equipos */
            /* __logos__ */
            $('#imgLogoPanel2').attr("src", "img/paneles/logo/"+rspt.combinacionMediana[0].paneles.marcaPanel.toString()+".png");
            $('#imgLogoInversor2').attr("src", "img/inversores/logo/"+rspt.combinacionMediana[0].inversores.marcaInversor.toString()+".png");
            /* __equipos__ */
            $('#imgPanel2').attr("src", "img/paneles/equipo/panel.png");
            $('#imgInversor2').attr("src", "img/inversores/equipo/"+rspt.combinacionMediana[0].inversores.marcaInversor.toString()+".jpg");
            /* Se llenan labels_pills de data */
            $('#combinacionTitle2').text('Combinacion mediana');
            
            //Page1_Result
            $('#plCantidadPaneles2').text(rspt.combinacionMediana[0].paneles.cantidadPaneles);
            $('#plCantidadInversores2').text(rspt.combinacionMediana[0].inversores.numeroDeInversores);
            $('#plCostoProyectoSIVA2').text(rspt.combinacionMediana[0].totales.precio + '$');
            $('#plCostoProyectoCIVA2').text(rspt.combinacionMediana[0].totales.precioMasIVA + '$');
            $('#plCostoWatt2').text(rspt.combinacionMediana[0].totales.precio_watt + '$');

            //Page2_Result
            $('#plModeloPanel2').text(rspt.combinacionMediana[0].paneles.nombrePanel);
            $('#plModeloInversor2').text(rspt.combinacionMediana[0].inversores.nombreInversor);
            // $('#plConsumoMensual2').text(rspt.combinacionMediana[0].);
            // $('#plGeneracionMensual2').text(rspt.combinacionMediana[0].);
            // $('#plNuevoConsumoMensual2').text(rspt.combinacionMediana[0].);
            // $('#plPorcentajeGeneracion2').text(rspt.combinacionMediana[0].);

            // //Page3_Result
            // $('#plPagoPromedioAnterior2').text(rspt.combinacionMediana[0].);
            // $('#plPagoPromedioNuevo2').text(rspt.combinacionMediana[0].);
            // $('#plAhorroMensual2').text(rspt.combinacionMediana[0].);
            // $('#plAhorroAnual2').text(rspt.combinacionMediana[0].);
            // $('#plROIBruto2').text(rspt.combinacionMediana[0].);
            // $('#plROIDeduccion2').text(rspt.combinacionMediana[0].);

            /*             --Combinacion Optima--             */
            /* Se cargan imagenes de logos &&  equipos */
            /* __logos__ */
            $('#imgLogoPanel3').attr("src", "img/paneles/logo/"+rspt.combinacionOptima[0].paneles.marcaPanel.toString()+".png");
            $('#imgLogoInversor3').attr("src", "img/inversores/logo/"+rspt.combinacionOptima[0].inversores.marcaInversor.toString()+".png");
            /* __equipos__ */
            $('#imgPanel3').attr("src", "img/paneles/equipo/panel.png");
            $('#imgInversor3').attr("src", "img/inversores/equipo/"+rspt.combinacionOptima[0].inversores.marcaInversor.toString()+".jpg");
            /* Se llenan labels_pills de data */
            $('#combinacionTitle3').text('Combinacion optima');

            //Page1_Result
            $('#plCantidadPaneles3').text(rspt.combinacionOptima[0].paneles.cantidadPaneles);
            $('#plCantidadInversores3').text(rspt.combinacionOptima[0].inversores.numeroDeInversores);
            $('#plCostoProyectoSIVA3').text(rspt.combinacionOptima[0].totales.precio + '$');
            $('#plCostoProyectoCIVA3').text(rspt.combinacionOptima[0].totales.precioMasIVA + '$');
            $('#plCostoWatt3').text(rspt.combinacionOptima[0].totales.precio_watt + '$');

            //Page2_Result
            $('#plModeloPanel3').text(rspt.combinacionOptima[0].paneles.nombrePanel);
            $('#plModeloInversor3').text(rspt.combinacionOptima[0].inversores.nombreInversor);
            // $('#plConsumoMensual3').text(rspt.combinacionOptima[0].);
            // $('#plGeneracionMensual3').text(rspt.combinacionOptima[0].);
            // $('#plNuevoConsumoMensual3').text(rspt.combinacionOptima[0].);
            // $('#plPorcentajeGeneracion3').text(rspt.combinacionOptima[0].);

            // //Page3_Result
            // $('#plPagoPromedioAnterior3').text(rspt.combinacionOptima[0].);
            // $('#plPagoPromedioNuevo3').text(rspt.combinacionOptima[0].);
            // $('#plAhorroMensual3').text(rspt.combinacionOptima[0].);
            // $('#plAhorroAnual3').text(rspt.combinacionOptima[0].);
            // $('#plROIBruto3').text(rspt.combinacionOptima[0].);
            // $('#plROIDeduccion3').text(rspt.combinacionOptima[0].);
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
                    $('#inpMarcaPanelS').val(rspt.combinacionOptima[0].paneles.marcaPanel);
                    $('#inpMarcaInversorS').val(rspt.combinacionOptima[0].inversores.marcaInversor);
                    $('#inpCantidadPaneles').val(rspt.combinacionOptima[0].paneles.cantidadPaneles);
                    $('#inpCantidadInvers').val(rspt.combinacionOptima[0].inversores.numeroDeInversores);
                    $('#inpCostProyectoSIVA').val(rspt.combinacionOptima[0].totales.precio  + '$');
                    $('#inpCostProyectoCIVA').val(rspt.combinacionOptima[0].totales.precioMasIVA  + '$');
                    $('#inpCostPorWatt').val(rspt.combinacionOptima[0].totales.precio_watt  + '$');
                    $('#inpCostProyectoMXN').val(rspt.combinacionOptima[0].totales.precioTotalMXN  + '$');

                    //Page2_Result
                    promedioConsumoMensual = rspt._arrayConsumos.consumo.promedioConsumo;
                    generacionMensual = rspt.combinacionOptima[0].power.generacion[0];
                    nuevoConsumoMensual = rspt.combinacionOptima[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionOptima[0].paneles.nombrePanel);
                    $('#inpModeloInversor').val(rspt.combinacionOptima[0].inversores.nombreInversor);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + ' kWh(' +promedioConsumoMensual *2 + '/bim');
                    $('#inpGeneracionMensual').val(generacionMensual + ' kWh(' + generacionMensual * 2 + '/bim');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + ' kw(' + nuevoConsumoMensual * 2 + '/bim');
                    $('#inpPorcentGeneracion').val(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

                    //Page3_Result
                    //$('#inpPagoAnteriorProm').val(rspt.combinacionOptima[0]. + '$');
                    //$('#inpPagoNuevoProm').val(rspt.combinacionOptima[0]. + '$');
                    //$('#inpAhorroMensual').val(rspt.combinacionOptima[0]. + '$');
                    //$('#inpAhorroAnual').val(rspt.combinacionOptima[0]. + '$');
                    //$('#inpROIBruto').val(rspt.combinacionOptima[0]. + 'años');
                    //$('#inpROIDeduccion').val(rspt.combinacionOptima[0]. + 'años');
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
                    $('#inpCantidadPaneles').val(rspt.combinacionMediana[0].paneles.cantidadPaneles);
                    $('#inpCantidadInvers').val(rspt.combinacionMediana[0].inversores.numeroDeInversores);
                    $('#inpCostProyectoSIVA').val(rspt.combinacionMediana[0].totales.precio + '$');
                    $('#inpCostProyectoCIVA').val(rspt.combinacionMediana[0].totales.precioMasIVA + '$');
                    $('#inpCostPorWatt').val(rspt.combinacionMediana[0].totales.precio_watt + '$');
                    $('#inpCostProyectoMXN').val(rspt.combinacionMediana[0].totales.precioTotalMXN+ '$');

                    //Page2_Result
                    promedioConsumoMensual = rspt._arrayConsumos.consumo.promedioConsumo;
                    generacionMensual = rspt.combinacionMediana[0].power.generacion[0];
                    nuevoConsumoMensual = rspt.combinacionMediana[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionMediana[0].paneles.nombrePanel);
                    $('#inpModeloInversor').val(rspt.combinacionMediana[0].inversores.nombreInversor);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim');
                    $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + 'kw(' + nuevoConsumoMensual * 2 + '/bim');
                    $('#inpPorcentGeneracion').val(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

                    //Page3_Result
                    //$('#inpPagoAnteriorProm').val(rspt.combinacionMediana[0]. + '$');
                    //$('#inpPagoNuevoProm').val(rspt.combinacionMediana[0]. + '$');
                    //$('#inpAhorroMensual').val(rspt.combinacionMediana[0]. + '$');
                    //$('#inpAhorroAnual').val(rspt.combinacionMediana[0]. + '$');
                    //$('#inpROIBruto').val(rspt.combinacionMediana[0]. + 'años');
                    //$('#inpROIDeduccion').val(rspt.combinacionMediana[0]. + 'años');
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
                    $('#inpCantidadPaneles').val(rspt.combinacionEconomica[0].paneles.cantidadPaneles).val(rspt.combinacionEconomica[0].paneles.cantidadPaneles);
                    $('#inpCantidadInvers').val(rspt.combinacionEconomica[0].inversores.numeroDeInversores);
                    $('#inpCostProyectoSIVA').val(rspt.combinacionEconomica[0].totales.precio + '$');
                    $('#inpCostProyectoCIVA').val(rspt.combinacionEconomica[0].totales.precioMasIVA + '$');
                    $('#inpCostPorWatt').val(rspt.combinacionEconomica[0].totales.precio_watt + '$');
                    $('#inpCostProyectoMXN').val(rspt.combinacionEconomica[0].totales.precioTotalMXN+ '$');

                    //Page2_Result
                    promedioConsumoMensual = rspt._arrayConsumos.consumo.promedioConsumo;
                    generacionMensual = rspt.combinacionEconomica[0].power.generacion[0];
                    nuevoConsumoMensual = rspt.combinacionEconomica[0].power.nuevosConsumos[0];

                    $('#inpModeloPanel').val(rspt.combinacionEconomica[0].paneles.nombrePanel);
                    $('#inpModeloInversor').val(rspt.combinacionEconomica[0].inversores.nombreInversor);
                    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh(' +promedioConsumoMensual *2 + '/bim');
                    $('#inpGeneracionMensual').val(generacionMensual + 'kWh(' + generacionMensual * 2 + '/bim');
                    $('#inpNuevoConsumoMensual').val(nuevoConsumoMensual + 'kw(' + nuevoConsumoMensual * 2 + '/bim');
                    $('#inpPorcentGeneracion').val(rspt.combinacionOptima[0].power.porcentajePotencia + '%');

                    //Page3_Result
                    //$('#inpPagoAnteriorProm').val(rspt.combinacionEconomica[0]. + '$');
                    //$('#inpPagoNuevoProm').val(rspt.combinacionEconomica[0]. + '$');
                    //$('#inpAhorroMensual').val(rspt.combinacionEconomica[0]. + '$');
                    //$('#inpAhorroAnual').val(rspt.combinacionEconomica[0]. + '$');
                    //$('#inpROIBruto').val(rspt.combinacionEconomica[0]. + 'años');
                    //$('#inpROIDeduccion').val(rspt.combinacionEconomica[0]. + 'años');
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
                    //Paneles
                    $('#inpPotencia').html('').val('');
                    $('#inpPanelS').html('').val('');
                    $('#inpMarcaPanelS').html('').val('');
                    $('#inpCostTotalPaneles').html('').val('');
                    $('#inpCostProyectoMXN').html('').val('');
                    //Estructuras
                    $('#inpCostTotalEstructuras').html('').val('');
                    //Inversores
                    $('#inpInversorS').html('').val('');
                    $('#inpMarcaInversorS').html('').val('');
                    $('#inpCostTotalInversores').html('').val('');
                    //Viaticos
                    $('#inpCostoTotalViaticos').html('').val('');
                    //Totales
                    $('#inpPrecio').html('').val('');
                    $('#inpPrecioIVA').html('').val('');
                    $('#inpPrecioMXN').html('').val('');
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

    /*#region Cliente */
    idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    /*#region Consumo */
    /* consumoMensual;
    consumoAnual;
    energiaNecesaria; */
    /*#endregion Consumo */
    /*#endregion Cliente */
    /*#region Proyecto */
    /*#region Panel */
    nombrePanel = $('#inpModeloPanel').val();
    marcaPanel = $('#inpMarcaPanelS').val();
    cantidadPanel = $('#inpCantidadPaneles').val();
    /*#endregion Panel */
    /*#region Inversor */
    nombreInversor = $('#inpModeloInversor').val();
    marcaInversor = $('#inpMarcaInversorS').val();
    cantidadInversor = $('#inpCantidadInvers').val();
    /*#endregion Inversor */
    /*#region Power */
    /* consumosAnterior = $('#').val();
    consumosNuevo = $('#').val();
    porcentajeAhorr = $('#').val(); */
    /*#endregion Power */
    /*#region Totales */
    costoTotalSinIVA = $('#inpCostProyectoSIVA').val();
    costoTotalConIVA = $('#inpCostProyectoCIVA').val();
    /*#endregion Totales */
    /*#endregion Proyecto */

    data = {
        cliente: {
            id: idCliente/* ,
            consumo: {
                consumoMensual: consumoMensual,
                consumoAnual: consumoAnual,
                energiaNecesaria: energiaNecesaria
            } */
        },
        proyecto: {
            panel: {
                nombre: nombrePanel,
                marca: marcaPanel,
                cantidad: cantidadPanel
            },
            inversor: {
                nombre: nombreInversor,
                marca: marcaInversor,
                cantidad: cantidadInversor
            },
            /* power: {
                consumosAnteriores: consumosAnteriores,
                consumosNuevos: consumosNuevos,
                porcentajeAhorro: porcentajeAhorro,

            }, */
            totales: {
                costoTotalSinIVA: costoTotalSinIVA,
                costoTotalConIVA: costoTotalConIVA
            }/* ,
            financiamiento: {

            } */
        }
    };

    console.log('catchDataResults() says: ');
    console.log(data);
}

function limpiarResultados(limpiaResult){
    /* 0 - paneles
    1 - inversores */

    if(limpiaResult == 0){
        /*Limpiar panel_result*/
        $('#inpCostTotalPaneles').val('').text('');
        /*Limpiar estructuras_result*/
        $('#inpCostTotalEstructuras').val('').text('');
    }
    else{
        /*Limpiar inversor_result*/
        $('#inpCostTotalInversores').val('').text('');
        /*Limpiar viaticos_result*/
        $('#inpCostoTotalViaticos').val('').text('');
        /*Limpiar totales_result*/
        $('#inpPrecio').val('').text('');
        $('#inpPrecioIVA').val('').text('');
        $('#inpPrecioMXN').val('').text('');
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