var direccionCliente = '';
var bandera;
var arrayPeriodosGDMTH = [];
var _cotizaViaticos = [];
var objPeriodosGDMTH = {};
var msjConfirm = false;

var _potenciaReal = 0;
var porcentajePerdida = 0;
var descuento = 0;

$(document).ready(function(){
    mostrarPeriodo();
}); 

/*#region Controles*/
function agregarPeriodo(){
    var BkWh = document.getElementById('inpBkWh').value;
    var IkWh = document.getElementById('inpIkWh').value;
    var PkWh = document.getElementById('inpPkWh').value;
    var BkW = document.getElementById('inpBkw').value;
    var IkW = document.getElementById('inpIkw').value;
    var PkW = document.getElementById('inpPkw').value;
    var Bmxn = document.getElementById('B(mxn/kWh)').value;
    var Imxn = document.getElementById('I(mxn/kWh)').value;
    var Pmxn = document.getElementById('P(mxn/kWh)').value;
    var pagoTransmision = document.getElementById('inpPagoTransmision').value;
    var Cmxn = document.getElementById('C(mxn/kW)').value;
    var Dmxn = document.getElementById('D(mxn/kW)').value;

    /*Validar campos vacios*/
    if(validateEmptyInputs(BkWh) || validateEmptyInputs(IkWh) || validateEmptyInputs(PkWh) || validateEmptyInputs(BkW) || validateEmptyInputs(IkW) || validateEmptyInputs(PkW) || validateEmptyInputs(Bmxn) || validateEmptyInputs(Imxn) || validateEmptyInputs(Pmxn) || validateEmptyInputs(pagoTransmision) || validateEmptyInputs(Cmxn) || validateEmptyInputs(Dmxn))
    {
        alert('Todos los campos pertenecientes a los datos de consumo, deben ser llenados');
       
        /* msj = 'Todos los campos pertenecientes a los datos de consumo, deben ser llenados';
        modalMsj(msj,this.msjConfirm);  */
    }
    else{
        objPeriodosGDMTH = {
            bkwh: BkWh || null,
            ikwh: IkWh || null,
            pkwh: PkWh || null,
            bkw: BkW || null,
            ikw: IkW || null,
            pkw: PkW || null,
            bmxn: Bmxn || null,
            imxn: Imxn || null,
            pmxn: Pmxn || null,
            pagoTransmi: pagoTransmision || null,
            cmxn: Cmxn || null,
            dmxn: Dmxn || null
        };
    
        arrayPeriodosGDMTH.push(objPeriodosGDMTH);
        sumarAlIndexador();
        limpiarCampos();
    }

    console.log('Longitud de array: '+arrayPeriodosGDMTH.length);
    console.log(arrayPeriodosGDMTH);
}

function eliminarPeriodo(){
    msj = '¿Deseas eliminar el periodo?';
    msjConfirm = true;
    bandera = 1;

    seleccionado = (parseInt(lista.selectedIndex));

    logicaBotones(bandera);
    // arrayPeriodosGDMTH.splice(0,(seleccionado));
    console.log('periodo antes de eliminar:');
    console.log(arrayPeriodosGDMTH);
    delete(arrayPeriodosGDMTH[seleccionado]);
    console.log('periodo despues de eliminar:');
    console.log(arrayPeriodosGDMTH);
    /*Actualizar el indexador de la lista desplegable*/
    restarAlIndexador();

    /* if(modalMsj(msj,msjConfirm) == true){
        
    } */
}

function editarPeriodo(){
    bandera = 2;
    logicaBotones(bandera);
}

function actualizarPeriodo(){
    seleccionado = parseInt(lista.selectedIndex);
    bandera = 3;
    logicaBotones(bandera);

    arrayPeriodosGDMTH[seleccionado].bkwh = document.getElementById('inpBkWh').value || null;    ;
    arrayPeriodosGDMTH[seleccionado].ikwh = document.getElementById('inpIkWh').value || null || null;
    arrayPeriodosGDMTH[seleccionado].pkwh = document.getElementById('inpPkWh').value || null;
    arrayPeriodosGDMTH[seleccionado].bkw = document.getElementById('inpBkw').value || null;
    arrayPeriodosGDMTH[seleccionado].ikw = document.getElementById('inpIkw').value || null;
    arrayPeriodosGDMTH[seleccionado].pkw = document.getElementById('inpPkw').value || null;
    arrayPeriodosGDMTH[seleccionado].bmxn = document.getElementById('B(mxn/kWh)').value || null;
    arrayPeriodosGDMTH[seleccionado].imxn = document.getElementById('I(mxn/kWh)').value || null;
    arrayPeriodosGDMTH[seleccionado].pmxn = document.getElementById('P(mxn/kWh)').value || null;
    arrayPeriodosGDMTH[seleccionado].pagoTransmi = document.getElementById('inpPagoTransmision').value || null;
    arrayPeriodosGDMTH[seleccionado].cmxn = document.getElementById('C(mxn/kW)').value || null;
    arrayPeriodosGDMTH[seleccionado].dmxn = document.getElementById('D(mxn/kW)').value || null;
}

function mostrarPeriodo(){
    lista = $("#lstPeriodosGDMTH");

    /*Se desplega el contenido del array en los campos*/ 
    lista.change(function(){
        seleccionado = parseInt(lista.selectedIndex);
        index = lista.length;

        console.log('Seleccionado: '+seleccionado+' Indexador:' +index);

        if((seleccionado+1) === index && (seleccionado+1) < 13){
            /*Aqui hay un bug*/
            bandera = 0;
            logicaBotones(bandera);
        }
        else if(seleccionado < index && seleccionado < 12){
            bandera = 4;
            logicaBotones(bandera);

            document.getElementById('inpBkWh').value = arrayPeriodosGDMTH[seleccionado].bkwh.toString() || '';
            document.getElementById('inpIkWh').value = arrayPeriodosGDMTH[seleccionado].ikwh.toString() || '';
            document.getElementById('inpPkWh').value = arrayPeriodosGDMTH[seleccionado].pkwh.toString() || '';
            document.getElementById('inpBkw').value = arrayPeriodosGDMTH[seleccionado].bkw.toString() || '';
            document.getElementById('inpIkw').value = arrayPeriodosGDMTH[seleccionado].ikw.toString() || '';
            document.getElementById('inpPkw').value = arrayPeriodosGDMTH[seleccionado].pkw.toString() || '';
            document.getElementById('B(mxn/kWh)').value = arrayPeriodosGDMTH[seleccionado].bmxn.toString() || '';
            document.getElementById('I(mxn/kWh)').value = arrayPeriodosGDMTH[seleccionado].imxn.toString() || '';
            document.getElementById('P(mxn/kWh)').value = arrayPeriodosGDMTH[seleccionado].pmxn.toString() || '';
            document.getElementById('inpPagoTransmision').value = arrayPeriodosGDMTH[seleccionado].pagoTransmi.toString() || '';
            document.getElementById('C(mxn/kW)').value = arrayPeriodosGDMTH[seleccionado].cmxn.toString() || '';
            document.getElementById('D(mxn/kW)').value = arrayPeriodosGDMTH[seleccionado].dmxn.toString() || '';
        }
        else {
            bandera = 'x';
            logicaBotones(bandera);
        }
    });
}

function sumarAlIndexador(){
    lista = document.getElementById("lstPeriodosGDMTH");
    indexador = lista.length;
    option = document.createElement("option");
    option.text = indexador + 1;
    lista.add(option);
    lista.selectedIndex = indexador.toString();
    validarLimiteSumarPeriodos(indexador);
}

function restarAlIndexador(){
    lista = document.getElementById("lstPeriodosGDMTH");
    ultimoIndex = lista.length - 1;
    lista.remove(ultimoIndex);
    /*Cada vez que se elimine un elemento de la lista, este debera mostrar el elemento anterior al eliminado*/
    newUltimoIndex = lista.length - 1;
}

function bloquearCampos(){
    $('input[type="number"]').attr("readOnly",true);
}

function desbloquearCampos(){
    $('input[type="number"]').attr("readOnly",false);
}

function limpiarCampos(){
    $('input[type="number"]').val('');
}

function logicaBotones(bandera){
    /*
                    Estados de bandera -> Logica botones
        *0 - Crear
        *1 - Eliminar
        *2 - Editar
        *3 - Actualizar
        *4 - Leer
        *default - Bloquear todo
    */

    switch(bandera)
    {
        case 0:
            //Crear
            limpiarCampos();
            desbloquearCampos();
            $('#btnAgregarPeriodo').prop("disabled",false);
            $('#btnEliminarPeriodo').prop("disabled",true);
            $('#btnEditarPeriodo').prop("disabled",true);
            $('#btnActualizarPeriodo').prop("disabled",true);
        break;
        case 1:
            //Eliminar
            //Tiene bugs... Checar para poder implementar la funcionalidad
            bloquearCampos();
            limpiarCampos();
            $('#btnAgregarPeriodo').prop("disabled",true);
            $('#btnEliminarPeriodo').prop("disabled",true);
            $('#btnEditarPeriodo').prop("disabled",false);
            $('#btnActualizarPeriodo').prop("disabled",true);
        break;
        case 2:
            //Editar
            desbloquearCampos();
            $('#btnAgregarPeriodo').prop("disabled",true);
            $('#btnEliminarPeriodo').prop("disabled",true);
            $('#btnEditarPeriodo').prop("disabled",true);
            $('#btnActualizarPeriodo').prop("disabled",false);
        break;
        case 3:
            //Actualizar
            bloquearCampos();
            $('#btnAgregarPeriodo').prop("disabled",true);
            $('#btnEliminarPeriodo').prop("disabled",true);
            $('#btnEditarPeriodo').prop("disabled",false);
            $('#btnActualizarPeriodo').prop("disabled",true);
        break;
        case 4:
            //Leer
            bloquearCampos();
            $('#btnAgregarPeriodo').prop("disabled",true);
            $('#btnEliminarPeriodo').prop("disabled",false);
            $('#btnEditarPeriodo').prop("disabled",false);
            $('#btnActualizarPeriodo').prop("disabled",true);
        break;
        default:
            limpiarCampos();
            bloquearCampos();
            $('#btnAgregarPeriodo').prop("disabled",true);
            $('#btnEliminarPeriodo').prop("disabled",true);
            $('#btnEditarPeriodo').prop("disabled",true);
            $('#btnActualizarPeriodo').prop("disabled",true);
        break;
    }
}

function backToCotizacion(){
    $("#divCotizacionMediaTension").css("display","");
    $("#divBtnCalcularMT").css("display","");
    $("#divResultCotizacion").css("display","none");
}
/*#region Validaciones_Controles*/
function checkAddItems(){
    if($('#chbAddItemGDMTH').prop("checked") == true){
        porcentajePerdida = $('#inpPerdidaGDMTH').val();
        descuento = $('#inpDescuentoGDMTH').val();
        return 1;
    }
    else if($('#chbAddItemGDMTH').prop("checked") == false){
        confirmacion = confirm("Se tomaran como datos \n-Eficiencia: 18% \n-Descuento: 0");
        if(confirmacion == true){
            porcentajePerdida = 18;
            descuento = 0;
            return 1;
        }
        else{
            return -1;
        }
    }
}

function validateEmptyInputs(valor){
    valor = valor == undefined ? "" : valor;    
    valor = valor.replace("&nbsp;", "");
    
    if (!valor || 0 === valor.trim().length){
        return true;
    }
    else{
        return false;
    }
}

function validarLimiteSumarPeriodos(indexador){
    if(indexador >= 12){
        bandera = 'x';
        logicaBotones(bandera);
    }
}

function validarLimiteEliminarPeriodos(){

}

function validarEnvioDePeriodo(){
    
    if(arrayPeriodosGDMTH.length == 0 || arrayPeriodosGDMTH.length == 1){
        msj = 'Ups! Número de periodos insuficientes para calcular';
        modalMsj(msj,this.msjConfirm);
    }
    else if(arrayPeriodosGDMTH.length < 12){
        this.msjConfirm = true;
        msj = 'No se estan obteniendo los 12 periodos esperados, se realizara un promedio de los datos faltantes ¿Desea enviar?';
        if(modalMsj(msj,msjConfirm) == true){
            sendPeriodsToServer();
            limpiarCampos();
            //console.log(arrayPeriodosGDMTH);
            /*
                -Desplegar un spinner que simule la carga/calculo de la cotización, en lo 
                el servidor realiza las operaciones necesarias
            */
        }
    }
    else if(arrayPeriodosGDMTH.length == 12){
        sendPeriodsToServer();
        limpiarCampos();
        /* this.arrayPeriodosGDMTH = [];
        console.log(arrayPeriodosGDMTH); */
        /*
            -Desplegar un spinner que simule la carga/calculo de la cotización, en lo 
             el servidor realiza las operaciones necesarias
        */
    } 
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
/*#endregion*/
/*#region DataToServer*/
function sendPeriodsToServer(){
    direccionCliente = document.getElementById('municipio').value;
    var idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');

    if(checkAddItems() != -1){
        if(validarUsuarioCargado(direccionCliente) === true)
        {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'POST',
                url: '/enviarPeriodos',
                data: {
                    "_token": $("meta[name='csrf-token']").attr('content'),
                    'arrayPeriodosGDMTH': arrayPeriodosGDMTH,
                    'direccionCliente': direccionCliente,
                    'idCliente': idCliente
                },
                dataType: 'json'
            })
            .fail(function(){
                alert('Al parecer hubo un error con la peticion AJAX de la cotizacion GDMTH');
            })
            .done(function(respuesta){
                respuesta = respuesta.message; //Energia requerida y Convinacion de paneles
                console.log('Energia y Panel requerido:');
                console.log(respuesta);

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    url: '/resultados'
                })
                .fail(function(){
                    alert('Hubo un error al tratar de enviar datos a la vista de -RESULTADOS-');
                })
                .done(function(data){

                    $('#divCotizacionMediaTension').css("display","none");
                    $('#divBtnCalcularMT').css("display","none");
                    $('#divResultCotizacion').css("display","");
                    
                    $('#divResult').html(data);
        
                    //Consumo - /Tabla_oculta\
                    $('#consumoAnual').html(respuesta[0].consumo.consumoAnual + 'W');
                    $('#potenciaNecesaria').html(respuesta[0].consumo.potenciaNecesaria + 'W');
                    $('#promedioConsumo').html(respuesta[0].consumo.promedioConsumo + 'W');
                    
                    //DropDownList-Paneles
                    for(var i=1; i<respuesta.length; i++)
                    {
                        $('#listPaneles').append(
                            $('<option/>', {
                                value: i,
                                text: respuesta[i].panel.nombre
                            })
                        );
                    }
        
                    $('#listPaneles').change(function(){
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
                            _potenciaReal = respuesta[x].panel.potenciaReal;

                            //Paneles - /Tabla_oculta\
                            $('#numeroModulos').html(respuesta[x].panel.noModulos).val(respuesta[x].panel.noModulos);
                            $('#potenciaModulo').html(respuesta[x].panel.potencia + 'W').val(respuesta[x].panel.potencia);
                            $('#potenciaReal').html(_potenciaReal + 'W').val(_potenciaReal);
                            $('#precioModulo').html(respuesta[x].panel.precioPanel + '$').val(respuesta[x].panel.precioPanel);
                            $('#costoEstructuras').html(respuesta[x].panel.costoDeEstructuras + '$').val(respuesta[x].panel.costoDeEstructuras);
                            $('#costoPorWatt').html(respuesta[x].panel.precioPorWatt + '$').val(respuesta[x].panel.precioPorWatt);
                            $('#costoTotalModulos').html(respuesta[x].panel.costoTotalPaneles + '$').val(respuesta[x].panel.costoTotalPaneles);
                            
                            //Aparece cantidad (numerito) de -Paneles y Estructuras-
                            $('#txtCantidadPaneles').html('<strong> ('+respuesta[x].panel.noModulos+')</strong>');
                            $('#txtCantidadEstructuras').html('<strong> ('+respuesta[x].panel.noModulos+')</strong>');

                            $('#listInversores').prop("disabled", false);
                            $('#inpCostTotalPaneles').val(respuesta[x].panel.costoTotalPaneles + '$');
                            $('#inpCostTotalEstructuras').val(respuesta[x].panel.costoDeEstructuras + '$');

                            /*[Hoja: POWER]*/
                            $.ajax({
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                type: 'POST',
                                url: '/firstStepPower',
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
                    });

                    $.ajax({
                        type: 'GET',
                        url: '/inversores'
                    })
                    .fail(function(){
                        alert('Hubo un error al intentar cargar el dropdownlist de Inversores');
                    }).
                    done(function(response){
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
                                $('#txtCantidadPaneles').html('<strong> ('+response[0].numeroDeInversores+')</strong>');
                                

                                var idInversor = response[xi].idInversor;

                                console.log('porcentajePerdida: \n' +porcentajePerdida);
                                console.log('arrayPeriodosGDMTH');
                                console.log(arrayPeriodosGDMTH);

                                $.ajax({
                                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                    type: 'POST',
                                    url: '/enviarInvSeleccionado',
                                    data: {
                                        "_token": $("meta[name='csrf-token']").attr('content'),
                                        "idInversor": idInversor,
                                        "_potenciaReal": _potenciaReal
                                    },
                                    dataType: 'json'
                                })
                                .fail(function(){
                                    alert('Hubo un error al intentar calcular el numero de inversorse MediaTension');
                                })
                                .done(function(reply){
                                    reply = reply.message;
                                    console.log(reply);

                                    //Inversores  - /Tabla_oculta\
                                    $('#cantidadInversores').html(reply[0].numeroDeInversores).val(reply[0].numeroDeInversores);
                                    $('#potenciaInversor').html(reply[0].potenciaInversor + 'W').val(reply[0].potenciaInversor);
                                    $('#potenciaMaximaInv').html(reply[0].potenciaMaximaInversor + 'W').val(reply[0].potenciaMaximaInversor);
                                    $('#potenciaNominalInv').html(reply[0].potenciaNominalInversor + 'W').val(reply[0].potenciaNominalInversor);
                                    $('#potenciaPicoInv').html(reply[0].potenciaPicoInversor + 'W').val(reply[0].potenciaPicoInversor);
                                    $('#porcentajeSobreDim').html(reply[0].porcentajeSobreDimens + '%').val(reply[0].porcentajeSobreDimens);
                                    $('#precioInv').html(reply[0].precioInversor + '$').val(reply[0].precioInversor); 
                                    $('#costoTotalInversores').html(reply[0].precioTotalInversores + '$').val(reply[0].precioTotalInversores);

                                    // /Interfaz_visible\
                                    $('#inpCostTotalInversores').val(reply[0].precioTotalInversores + '$');

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
                                    };

                                    _cotizaViaticos.push(objPeriodosGDMTH);

                                    $.ajax({
                                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                        type: 'POST',
                                        url: '/calcularVT',
                                        data: {
                                            "_token": $("meta[name='csrf-token']").attr('content'),
                                            "arrayPeriodosGDMTH": _cotizaViaticos,
                                            "direccionCliente": direccionCliente
                                        },
                                        dataType: 'json'
                                    })
                                    .fail(function(){
                                        alert('Hubo un error al intentar de obtener los viaticos y totales');
                                    })
                                    .done(function(answer){
                                        answer = answer.message;
                                        
                                        /* //Cuadrillas
                                        $('#noCuadrillas').html(answer[0].viaticos_costos.noCuadrillas);
                                        $('#noPersonasReq').html(answer[0].viaticos_costos.noPersonasRequeridas);
                                        $('#noDias').html(answer[0].viaticos_costos.noDias);
                                        $('#noDiasReales').html(answer[0].viaticos_costos.noDiasReales);

                                        //Viaticos
                                        $('#pagoPasaje').html(answer[0].viaticos_costos.pagoPasaje + '$');
                                        $('#pagoTotalPasajes').html(answer[0].viaticos_costos.pagoTotalPasaje + '$');
                                        $('#pagoTotalComida').html(answer[0].viaticos_costos.pagoTotalComida + '$');
                                        $('#pagoTotalHosp').html(answer[0].viaticos_costos.pagoTotalHospedaje + '$');
                                        $('#totalViaticsMT').html(answer[0].totales.totalViaticosMT);

                                        //Costos_totales
                                        $('#manoObra').html(answer[0].totales.manoDeObra);
                                        $('#totalOtros').html(answer[0].totales.otrosTotal);
                                        $('#totalFletes').html(answer[0].totales.costoTotalFletes);
                                        $('#costTPIE').html(answer[0].totales.totalPanelesInversoresEstructuras);
                                        $('#subtOFMPIE').html(answer[0].totales.subTotalOtrosFleteManoDeObraTPIE);
                                        $('#margen').html(answer[0].totales.margen);
                                        $('#totalTodo').html(answer[0].totales.totalDeTodo);
                                        $('#precioDollars').html(answer[0].totales.precio);
                                        $('#precioDollarsMasIVA').html(answer[0].totales.precioMasIVA);
                                        $('#costWatt').html(answer[0].totales.costForWatt); */  

                                        // /Interfaz_visible\
                                        $('#inpCostoTotalViaticos').val(answer[0].totales.totalViaticosMT + '$');
                                        $('#inpPrecio').val(answer[0].totales.precio + '$');
                                        $('#inpPrecioIVA').val(answer[0].totales.precioMasIVA + '$');
                                        $('#inpPrecioMXN').val(answer[0].totales.precioTotalMXN + '$');
                                    });
                                    /*#endregion*/
                                }); 
                            }
                        });
                    });
                });
            });
        }
    }
}

function guardarGenerarPDF(){
    
}
/*#endregion*/



function modalMsj(msj,msjConfirm){
    if(msjConfirm == true){
        var confirmacion = confirm(msj);

        return confirmacion ? true : false; 
    }
    else{
        alert(msj);
    }
}

function GDMTH(){
    document.getElementById('divGDMTO').style.display = 'none';
    document.getElementById('divGDMTH').style.display = '';
}