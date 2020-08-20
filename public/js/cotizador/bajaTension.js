var direccionCliente = '';
var tarifaSelected = '';
$(function(){
    chooseSwitch();
});

/*#region Logica_controles*/
function catchConsumption(){
    const dictionaryTarifas = {"1":1, "1a":1, "1b":1, "1c":1, "1d":1, "1e":1, "1f":1, "2":1, "IC":1};
    var consumos = 0;
    var demandas = 0;
    var _consumDems = [];
    var objConsumDems = {};
    tarifaSelected = $('#tarifa-actual').val().toString();

    if(dictionaryTarifas.hasOwnProperty(tarifaSelected) === true){
        if($('#switch-2').is(':checked')){
            consumos = $('#men-val-1').val() || 0;
            demandas = $('#men-val-1a').val() || 0;

            objConsumDems = {
                consumos: consumos,
                demandas: demandas
            };

            _consumDems.push(objConsumDems);
        }
        else{
            for(var i=0; i<12; i++)
            {
                consumos = $('#men-val-'+i.toString()).val() || 0;
                demandas = $('#men-val-'+i.toString()+'a').val() || 0;

                objConsumDems = {
                    consumos: consumos,
                    demandas: demandas
                };

                _consumDems.push(objConsumDems);
            }
        }

        return _consumDems;
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
        if(valor === 0){
            $('#lblConvEquip').text('Equipos');
            $('#lblSwitchConvEquip').text("Elegir convinacion");
            $('#divConvinaciones').css("display","none");
            $('#divElegirEquipo').css("display","");
            valor = 1;
        }
        else{
            $('#lblConvEquip').text('Convinaciones');
            $('#lblSwitchConvEquip').text("Elegir equipo");
            $('#divConvinaciones').css("display","");
            $('#divElegirEquipo').css("display","none");
            valor = 0;
        }
    });
}
/*#endregion*/
/*#region Validaciones*/
function validarInputsVacios(){

}

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
    var idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    var direccionCliente = document.getElementById('municipio').value;

    if(validarUsuarioCargado(direccionCliente) === true){
        var _consumos = catchConsumption();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                'idCliente': idCliente,
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

            //Se pinta vista de -Resultados- y se carga dropDownList -Paneles-
            getResultsView(respuesta);
            
            //Se carga dropDownList -Inversores-
            // fullDropDownListInversores();
        });
    }
}

function getResultsView(_respuesta){
    var _respuesta = _respuesta.message;

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

        console.log('_respuesta says: ');
        console.log(_respuesta);

        //Se pintan resultados de -Energia/Paneles_Requeridos-
        //Consumo - /Tabla_oculta\
        $('#consumoAnual').html(_respuesta[0].consumo.consumoAnual + 'W');
        $('#potenciaNecesaria').html(_respuesta[0].consumo.potenciaNecesaria + 'W');
        $('#promedioConsumo').html(_respuesta[0].consumo.promedioConsumo + 'W');
        
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

        $('#listPaneles').change(function(){
            $('#listInversores').val(-1);
            var x = $('#listPaneles').val(); //Iteracion
                        
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
            }
            else{
                _potenciaReal = _respuesta[x].panel.potenciaReal;

                //Paneles - /Tabla_oculta\
                $('#numeroModulos').html(_respuesta[x].panel.noModulos).val(_respuesta[x].panel.noModulos);
                $('#potenciaModulo').html(_respuesta[x].panel.potencia + 'W').val(_respuesta[x].panel.potencia);
                $('#potenciaReal').html(_potenciaReal + 'W').val(_potenciaReal);
                $('#precioModulo').html(_respuesta[x].panel.precioPanel + '$').val(_respuesta[x].panel.precioPanel);
                $('#costoEstructuras').html(_respuesta[x].panel.costoDeEstructuras + '$').val(_respuesta[x].panel.costoDeEstructuras);
                $('#costoPorWatt').html(_respuesta[x].panel.precioPorWatt + '$').val(_respuesta[x].panel.precioPorWatt);
                $('#costoTotalModulos').html(_respuesta[x].panel.costoTotalPaneles + '$').val(_respuesta[x].panel.costoTotalPaneles);
                
                //Aparece cantidad (numerito) de -Paneles y Estructuras-
                $('#txtCantidadPaneles').html('<strong> ('+_respuesta[x].panel.noModulos+')</strong>');
                $('#txtCantidadEstructuras').html('<strong> ('+_respuesta[x].panel.noModulos+')</strong>');

                $('#listInversores').prop("disabled", false);
                $('#inpCostTotalPaneles').val(_respuesta[x].panel.costoTotalPaneles + '$');
                $('#inpCostTotalEstructuras').val(_respuesta[x].panel.costoDeEstructuras + '$');

                // cargarPowerPage();
            }
        });
    });
}

function cargarPowerPage(){
    /*[Hoja: POWER]*/
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/firstStepPower',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "arrayPeriodosGDMTH": arrayPeriodosGDMTH,
            "porcentajePerdida": porcentajePerdida,
            "potenciaReal": _potenciaReal,
            "tipoCotizacion": tipoCotizacion
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

        $('#tdProduccionAnualKwh').text(resp[0].arrayProduccionAnual[0].produccionAnualKwh);
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
        });

        $('#navPower').css("display","");
        $('#power').css("display","");
    });
}

function fullDropDownListInversores(){
    $.ajax({
        type: 'GET',
        url: '/inversores'
    })
    .fail(function(){
        alert('Hubo un error al intentar cargar el dropdownlist de Inversores');
    })
    .done(function(){
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
                $('#cantidadInversores').html('');
                $('#potenciaInversor').html('');
                $('#potenciaMaximaInv').html('');
                $('#potenciaNominalInv').html('');
                $('#potenciaPicoInv').html('');
                $('#porcentajeSobreDim').html('');
                $('#precioInv').html('');
                $('#divTotalesProject').css("display","");

                // /Interfaz_visible\
                $('#inpCostTotalInversores').val('').text('');

                //Panel de ajuste de cotizacion - Desaparece
                $('#tblAjusteCotiMT').css("display","none");
                
                //Se desaparece numerito -Cantidad_Inversores-
                $('#txtCantidadPaneles').html('');
            }
            else{
                //Panel de ajuste de cotizacion - Aparece
                $('#tblAjusteCotiMT').css("display","");

                //Se agrega nmerito -Cantidad_Inversores-
                $('#txtCantidadInversores').html('<strong> ('+response[0].numeroDeInversores+')</strong>');

                var idInversor = response[xi].idInversor;

                console.log('porcentajePerdida: \n' +porcentajePerdida);
                console.log('arrayPeriodosGDMTH');
                console.log(arrayPeriodosGDMTH);

                //--> *Se calculan viaticos
            }
        });
    });
}

// function calcularViaticosBT(){
//     /*Se cargan las variables que se enviaran por la solicitud, a traves de la extraccion del val() del control/input que lo contiene*/

//     $.ajax({
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//         type: 'POST',
//         url: '/calcularVT',
//         data: {
//             "_token": $("meta[name='csrf-token']").attr('content'),
//             "arrayPeriodosGDMTH": _cotizaViaticos,
//             "direccionCliente": direccionCliente
//         },
//         dataType: 'json'
//     })
//     .fail(function(){
//         alert('Hubo un error al intentar de obtener los viaticos y totales');
//     })
//     .done(function(){

//     });
// }
/*#endregion*/