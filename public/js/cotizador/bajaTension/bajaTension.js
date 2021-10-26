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
    try{
        if(dataEdited === null){ //Cotizacio nueva
            //Se obtienen los datos de la propuesta
            let dataPropuesta = cacharDatosPropuesta();
    
            if(typeof dataPropuesta != "undefined"){
                data = dataPropuesta;
            }
            else{
                throw 'ERROR! La -data- de la Propuesta se encuentra vacia y es imposible cotizar';
            }

            /* Enviar Propuesta - Manipular resultado */
            await pintarVistaDeResultados();
    
            _combinaciones = await obtenerCombinaciones(data);
            vaciarCombinacionesEnModal(_combinaciones); // :void()
            $('#ddlCombinaciones').prop("disabled",false);//Se activa el ddlCombinaciones

            //Se obtienen paneles
            _cotizacion = await enviarCotizacion(data); 
            vaciarRespuestaPaneles(_cotizacion);
    
            //Se obtiene estructuras
            let estructuras = await getListEstructuras();
            llenarDropDownListEstructuras(estructuras.message);
            //El sistema selecciona una estructura
            seleccionaUnaEstructura('Everest');
        }
        else{ //Cotizacion ajustada
            dataPropuesta = cacharDatosPropuesta();
            dataPropuesta.porcentajePropuesta = dataEdited.porcentajePropuesta;
            dataPropuesta.porcentajeDescuento = dataEdited.porcentajeDescuento;
            data = dataPropuesta;
            
            ///Modificar las combinaciones
            _combinaciones = await obtenerCombinaciones(data);
            vaciarCombinacionesEnModal(_combinaciones); // :void()

            ///Enviar propuesta AJUSTADA
            _cotizacionAjustada = await enviarCotizacion(data);
            vaciarRespuestaPaneles(_cotizacionAjustada);
        }
    }
    catch(error){
        alert(error);
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
                    
                    //Consumos - Result [Formated]
                    sessionStorage.removeItem("_consumsFormated");
                    sessionStorage.setItem("_consumsFormated",JSON.stringify(respuesta[0]));

                    //Paneles - Result [Formated]
                    sessionStorage.removeItem("_respPaneles");
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
                "objPanelSelect": panelSeleccionado
            },
            dataType: 'json',
            success: function(_inversores){
                resolve(_inversores);
            },
            error: function(error){
                alert('Hubo un error al intentar obtener los inversores para el panel seleccionado');
                console.log(error);
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
                if(result.status === 200){
                    //Guardar en un SessionStorage el -ArrayCombinaciones-
                    sessionStorage.removeItem("arrayCombinaciones");
                    sessionStorage.setItem("arrayCombinaciones", JSON.stringify(result.message));

                    //\\
                    console.log('Combinaciones:');
                    console.log(result.message);

                    resolve(result.message);
                }
                else{
                    console.log(result.message);
                    reject('Ah ocurrido un problema con la solicitud de -combinaciones-:\n'+result.message);
                }
            },
            error: function(error){
                console.log(error);
                reject('Ah ocurrido un problema con la solicitud de -combinaciones-:\n'+error);
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
    let consumptions = JSON.parse(sessionStorage.getItem("_consumsFormated")); ///Consumos formateados -> promedioMensual,Bimestral,Anual,etc
    consumptions = consumptions.consumo;
    let descuento = 0, aumento = 0;

    let bndPropuestaNueva = sessionStorage.getItem("bndPropuestaEditada"); //Bandra Propuesta Nueva

    //Validacion de que no haya datos vacios
    if($('#listPaneles option:selected').val() != -1 || $('#listPaneles option:selected').val() != '-1'){
        if($('#listInversores option:selected').val() != -1 || $('#listInversores option:selected').val() != '-1'){
            if($('#listEstructura option:selected').val() != -1 || $('#listEstructura option:selected').val() != '-1'){
                if(bndPropuestaNueva === '1'){ //Propuesta modificada
                    descuento = sessionStorage.getItem("descuentoPropuesta");
                    aumento = sessionStorage.getItem("aumentoPropuesta");
                }
            
                if(objInversor === null || typeof objInversor === 'undefined'){
                    ssinversor = sessionStorage.getItem('__ssInversorSeleccionado');
                    ssinversor = ssinversor === null ? sessionStorage.getItem('ssInversorCostoBeneficio') : ssinversor;
                }
                else{
                    ssinversor = objInversor;
                }

                let estructuraSeleccionada = $('#listEstructura').val();
            
                objEquiposSeleccionados = { panel: sspanel, inversor: ssinversor, descuento, aumento };
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
                            "descuentoPropuesta": descuento,
                            "aumentoPropuesta": aumento,
                            "estructura": estructuraSeleccionada
                        },
                        dataType: 'json',
                        success: function(resultViaticos){
                            //Se limpia el storage
                            sessionStorage.removeItem('answPropuesta');
                            //Se llena el storage
                            sessionStorage.setItem('answPropuesta',JSON.stringify(resultViaticos.message));
                            
                            /*#region Graficos*/
                            //Se selecciona de primera instancia 'AhorroEnergetico' en el <select>
                            $('#ddlGraficoView option[value="ahorroEnergetico"]').attr("selected",true);
                            //Se pinta el grafico
                            // pintarGrafico();
                            /*#endregion*/
                            
                            resolve(resultViaticos);
                        },
                        error: function(error){
                            reject('Se produjo un error al intentar calcular viaticos: '+error);
                        }
                    });
                });
            }
            else{
                alert('Seleccione una estructura');
            }
        }
        else{
            alert('Seleccione un inversor');
        }
    }
    else{
        alert('Seleccione un panel');
    }
}
/*#endregion*/
/*#endregion*/
/*#region Logica*/
function cacharDatosPropuesta(){
    let banderaDelError = 0; //Bandera para validar si en algun proceso hubo un error
    let idCliente = $('#inpClienteId').val();

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
        let calle = $('#inpClienteCalle').val() || '';
        let asentamiento = $('#inpClienteMunicipio').val() || '';
        let ciudad = $('#inpClienteCiudad').val() || '';
        let codigoPostal = $('#inpCP').val() || '';
        let estado = $('#inpClienteEstado').val() || '';

        if(estado.length>0){
            return calle + ' ' + asentamiento + ' ' + ciudad + ' ' + codigoPostal + ' ' + estado;
        }
        else{
            banderaDelError = 1;
            alert('Falta cargar un cliente!');
        }
    };

    let tarifaSeleccionada = $('#tarifa-actual').val();
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
    $('.inpAnsw').val("");
    $('.tdAnsw').text("");
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
//     /* 0 - paneles
//     1 - inversores */

    if(limpiaResult == 0){
        /*Limpiar Resultados de -Paneles-*/
        $('#tdPanelPotencia').text('');
        $('#tdPanelCantidad').text('');
        $('#tdPanelModelo').text('');

        $('#tdCostoWatt').text('');
        $('#tdPanelPotenciaReal').text('');
    }
    else{ //Inversores
        $('#tdInversorModelo').text('');
        $('#tdInversorPotencia').text('');
        $('#tdInversorCantidad').text('');
        $('#tdSubtotalUSD').text('');
        $('#tdTotalUSD').text('');
        $('#tdSubtotalMXN').text('');
        $('#tdTotalMXN').text('');
    }
}

function selectOptionEntregable(chbx){
    let idChbx = chbx.id;
    let bandera = false;

    if($('#'+idChbx).is(":checked")){
        //Comprobar si la opcion de "PDF" esta seleccionada
        if($('#rbtnPDF').is(":checked")){
            //Habilitar boton de *pdf-configuration*
            $('#configPDF').attr("disabled",false);
        }
        else{
            //Deshabilitar boton de *pdf-configuration*
            $('#configPDF').attr("disabled",true);
        }
        
        bandera = true;
    }

    idChbx = idChbx === "rbtnQR" ? "rbtnPDF" : "rbtnQR";

    $('#'+idChbx).prop("disabled",bandera);
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
function seleccionaUnaEstructura(vMarcaSelected){
    $('#listEstructura option[value="'+vMarcaSelected+'"]').attr("selected", true);
}

function llenarDropDownListEstructuras(estructuras){
    let listEstructuras = $('#listEstructura');

    limpiarDropDownListEstructuras();

    for(let i=0; i<estructuras.length; i++)
    {
        listEstructuras.append(
            $('<option/>', {
                value: estructuras[i].vMarca,
                text: estructuras[i].vMarca
            })
        );
    }

    listEstructuras.attr("disabled", false);
}

function limpiarDropDownListEstructuras(){
    //Se borran los options
    $('#listEstructura option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function vaciarRespuestaPaneles(resultPaneles){
    let dropDownListPaneles = $('#listPaneles');

    //Valida que la coleccion de paneles no venga vacia
    if(resultPaneles.length > 0){
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

        //Habilita lista de paneles
        dropDownListPaneles.prop("disabled", false);
    }
    else{
        alert('Error! Coleccion de paneles vacia');
    }
}

async function mostrarPanelSeleccionado(){
    let valueDDLPaneles = $('#listPaneles').val();

    limpiarCampos();

    if(valueDDLPaneles != "-1" || typeof valueDDLPaneles === "undefined"){
        /*#region Formating _respuestaPaneles*/
        let _paneles = sessionStorage.getItem('_respPaneles');
        _paneles = JSON.parse(_paneles);
        /*#endregion*/

        //void:
        mostrarRespuestaConsumos(_paneles[0].consumo);
        //void:
        mostrarRespuestaPaneles(_paneles[valueDDLPaneles].panel);

        //Se guarda - Panel seleccionado
        sessionStorage.removeItem('__ssPanelSeleccionado');
        sessionStorage.setItem('__ssPanelSeleccionado',JSON.stringify(_paneles[valueDDLPaneles].panel));

        //[Inversores]
        //Se obtienen los inveresores
        let _inversores = await obtenerInversoresParaPanelSeleccionado(_paneles[valueDDLPaneles].panel);
        _inversores = _inversores.message; //Formating
        sessionStorage.removeItem("_respInversores");
        sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));

        //:void() = Se pintan las MARCAS de inversores
        vaciarRespuestaInversores(_inversores);

        /* Se pinta el mejor CostoBeneficio en INVERSORES */
        let InversorCostoBeneficio = getInversorCostoBeneficio(0);

        //Guardar Inversor-CostoBeneficio [sessionStorage]
        sessionStorage.removeItem('ssInversorCostoBeneficio');
        sessionStorage.setItem('ssInversorCostoBeneficio',JSON.stringify(InversorCostoBeneficio));

        //:void() = Se pintan los MODELOS de inversores
        vaciarModelosInversores(InversorCostoBeneficio.vMarca);

        ///Se seleccionan DDL - MarcaInversor & ModeloInversor
        $('#listInversores option[value="'+InversorCostoBeneficio.vMarca+'"]').attr("selected", true);
        $('#listModelosInversor option[value="'+InversorCostoBeneficio.vNombreMaterialFot+'"]').attr("selected", true);

        //Viaticos
        let _viaticos = await calcularViaticosBT(InversorCostoBeneficio);
        mostrarRespuestaViaticos(_viaticos); //:void()
    }
    else{
        $('#listInversores').prop("disabled", true);
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

async function mostrarInversorSeleccionado(){ //Muestra segun la MARCA, el mejor MODELO *CostoBeneficio*
    let ddlInversoresValue = $('#listInversores').val(); //DDL - Marca del Inversor

    limpiarResultados(1);
    limpiarDropDownListModelosInversores();
    
    if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
        activarDesactivarBotones(1,0); //Se desactivan controles
    }
    else{
        activarDesactivarBotones(1,1); //Se activan controles
    
        let objInversorCB = getInversorCostoBeneficio(1);

        //Se llena el DDL-Modelos
        vaciarModelosInversores(objInversorCB.vMarca);

        //Se pinta en el DDL - ModelosInversores, el mejor equipo *CostoBeneficio*
        $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);
            
        let _viaticos = await calcularViaticosBT(objInversorCB);
        mostrarRespuestaViaticos(_viaticos); //:void()
    }
}

async function mostrarInversorModeloSeleccionado(){
    let valueListModlsInv = $('#listModelosInversor').val(); //Nombre - Modelo de inversor
    let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
    
    limpiarResultados(1);

    if(valueListModlsInv != '-1' || valueListModlsInv != -1){
        let modelosInversorFiltrado = searchInversor(_inversors,valueListModlsInv); //Se obtiene los modelos que le pertenecen a la MARCA_SELECCIONADA

        sessionStorage.removeItem('__ssInversorSeleccionado');
        sessionStorage.setItem('__ssInversorSeleccionado', JSON.stringify(modelosInversorFiltrado));

        let _viatico = await calcularViaticosBT(modelosInversorFiltrado);
        mostrarRespuestaViaticos(_viatico);
    }
}

function searchInversor(_inversor,marcaInv){
    /* Retorna todos los *modelos - filtrados* relacionados con la MARCA que se pase por parametro */

    let Result = {};
    
    for(let i=0; i<_inversor.length; i++)
    {
        if(_inversor[i].vNombreMaterialFot == marcaInv){
            Result = _inversor[i];
        }
    }

    return Result;
}

function getInversorCostoBeneficio(banderaMarcaSelected){ ///Retorna un Objeto {marca,modelo}
    let Respuesta = {};
    let _inversors = JSON.parse(sessionStorage.getItem("_respInversores")); //Lista de inversores
    let filtrarModelosInversores = (_inversores, marcaSelect) => { //Return: []
        let Response = [];

        _inversores.forEach(inversor => {
            if(inversor.vMarca === marcaSelect){
                Response.push(inversor);
            }
        });
        return Response;
    };
    let obtenerCostoBeneficio = (_inversores) => {
        let objResult = {};
        let costoMin = 0;

        _inversores.filter((inversor, index, _inversore) => {
            if(index > 0){
                //Se obtiene el -precioTotal- mas economico
                if(costoMin > inversor.precioTotal){
                    costoMin = inversor.precioTotal;
                    objResult = inversor;
                }
            }
            else if(index === 0 && _inversore.length > 1){ //Cuando -index- es igual a 0, pero la coleccion de inversores tiene mas de 1 equipo
                costoMin = inversor.precioTotal;
                objResult = inversor;
            }
            else if(index === 0 && _inversore.length === 1){ //Cuando -index- es igual a 0, pero la coleccion de inversores solo tiene 1 equipo
                objResult = inversor;
            }
        });

        return objResult;
    };

    switch(banderaMarcaSelected)
    {
        case 0:
            //El sistema selecciona el equipo
            Respuesta = obtenerCostoBeneficio(_inversors);
        break;
        case 1:
            //El usuario a seleccionado la -MARCA-, se le debe de retornar el MODELO mas economico
            let marcaSeleccionada = $('#listInversores').val();
            let _equiposPorMarca = filtrarModelosInversores(_inversors,marcaSeleccionada);
    
            //Se selecciona el mejor costo beneficio
            Respuesta = obtenerCostoBeneficio(_equiposPorMarca);
        break;
        default:
            -1;
        break;
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
    sessionStorage.removeItem('InversoresGroupByMerch');
    sessionStorage.setItem('InversoresGroupByMerch', JSON.stringify(InversoresGroupByMerch));

    //Limpiar dropdownlist
    limpiarDropDownListInversores();

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

    //Activar lista de inversores
    dropDownListInversores.prop("disabled", false);
}

function vaciarModelosInversores(marcaSeleccionada){//Se limpia el DDL - ModelosInversor de los antiguos elementos y se agregan nuevos
    let ddlModelosInversores = $('#listModelosInversor');

    /*#region Formating _respuestaInversores*/
    let _inversores = sessionStorage.getItem('_respInversores');
    _inversores = JSON.parse(_inversores);
    /*#endregion*/

    limpiarDropDownListModelosInversores();

    _inversores.forEach(inversor => {
        if(inversor.vMarca === marcaSeleccionada){
            ddlModelosInversores.append(
                $('<option/>', {
                    value: inversor.vNombreMaterialFot,
                    text: inversor.vNombreMaterialFot
                })
            );
        }
    });

    ddlModelosInversores.prop('disabled',false);
}

function mostrarRespuestaConsumos(Consumo){
    let promedioConsumoMensual = Consumo._promCons.consumoMensual.promedioConsumoMensual;

    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
}

function mostrarRespuestaPaneles(Panel){
    $('#tdPanelCantidad').text(Panel.noModulos);
    $('#tdPanelModelo').text(Panel.nombre);
    $('#tdPanelPotencia').text(Panel.potencia.toLocaleString('es-MX') + ' W');
    $('#tdPanelPotenciaReal').text(Panel.potenciaReal + ' Kw');
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
    
    if(_viaticos[0].inversores.combinacion){
        $('#tdInversorCantidad').text(_viaticos[0].inversores.numeroDeInversores.MicroUno.vNombreMaterialFot + ': ' + _viaticos[0].inversores.numeroDeInversores.MicroUno.numeroDeInversores + '\n' + _viaticos[0].inversores.numeroDeInversores.MicroDos.vNombreMaterialFot + ': ' + _viaticos[0].inversores.numeroDeInversores.MicroDos.numeroDeInversores);
    }
    else{
        $('#tdInversorCantidad').text(_viaticos[0].inversores.numeroDeInversores);
        $('#tdInversorCantidad').text(_viaticos[0].inversores.numeroDeInversores);
    }
    
    $('#tdInversorPotencia').text(_viaticos[0].inversores.fPotencia + ' W');
    $('#tdInversorModelo').text(_viaticos[0].inversores.vNombreMaterialFot);
    
    //Se pintan los resultados de -POWER-
    let generacionMensual = 0, generacionBimestral = 0;
    let nuevoConsumoBimestral = 0, nuevoConsumoMensual = 0;
    let promedioConsumoMensual = 0, promedioConsumoBimestral = 0;

    if(_viaticos[0].tipoCotizacion === 'mediaTension'){ //MediaTension
        ///KW
        promedioConsumoMensual = objResp.consumo._promCons.promedioConsumosMensuales;
        promedioConsumoBimestral = objResp.consumo._promCons.promConsumosBimestrales;
        generacionMensual = _viaticos[0].power.generacion.promedioGeneracionMensual;
        generacionBimestral = _viaticos[0].power.generacion.promedioGeneracionBimestral;
        nuevoConsumoMensual = promedioConsumoMensual - generacionMensual;
        nuevoConsumoBimestral = nuevoConsumoMensual * 2;
    }
    else{ //BajaTension
        ///KW
        promedioConsumoMensual = objResp.consumo._promCons.consumoMensual.promedioConsumoMensual;
        
        if(_viaticos[0].power.generacion.promedioDeGeneracion){
            generacionMensual = _viaticos[0].power.generacion.promedioDeGeneracion;
            generacionBimestral = _viaticos[0].power.generacion.promeDGeneracionBimestral;
            promedioConsumoBimestral = _viaticos[0].power._consumos._promCons.promConsumosBimestrales;
        
            if(_viaticos[0].power.nuevosConsumos.promedioNuevoConsumoBimestral){ //Kw
                nuevoConsumoBimestral = _viaticos[0].power.nuevosConsumos.promedioNuevoConsumoBimestral;
                nuevoConsumoMensual = _viaticos[0].power.nuevosConsumos.promedioNuevosConsumosMensuales;
            }
        }
        else{
            generacionMensual = _viaticos[0].power.generacion.promedioGeneracionMensual;
        }
    }

    //Se pintan 
    switch(_viaticos[0].tipoCotizacion)
    {
        case 'bajaTension':
            //Tarifas (actual y nueva)
            $('#tdTarifaActual').text(_viaticos[0].power.old_dac_o_nodac);
            $('#tdTarifaNueva').text(_viaticos[0].power.new_dac_o_nodac);
            
            //Ahorro energetico
            $('#tdConsumoActualKwMes').text(promedioConsumoMensual.toLocaleString('es-MX') + ' kW');
            $('#tdConsumoActualKwBim').text(promedioConsumoBimestral.toLocaleString('es-MX') + ' kW');
            $('#tdGeneracionKwMes').text(generacionMensual.toLocaleString('es-MX') + ' kW');
            $('#tdGeneracionKwBim').text(generacionBimestral.toLocaleString('es-MX') + ' kW');
            $('#tdNuevoConsumoMes').text(nuevoConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoBim').text(nuevoConsumoBimestral.toLocaleString('es-MX') + ' kw');
            
            //Ahorro en dinero
            $('#tdConsumoActualDinMes').text('$ '+ _viaticos[0].power.objConsumoEnPesos.pagoPromedioMensual.toLocaleString('es-MX') +' MXN');
            $('#tdConsumoActualDinBim').text('$ '+ _viaticos[0].power.objConsumoEnPesos.pagoPromedioBimestral.toLocaleString('es-MX') +' MXN');
            $('#tdNuevoConsumoDinMes').text('$ ' + _viaticos[0].power.objGeneracionEnpesos.pagoPromedioMensual.toLocaleString('es-MX') +' MXN');
            $('#tdNuevoConsumoDinBim').text('$ ' + _viaticos[0].power.objGeneracionEnpesos.pagoPromedioBimestral.toLocaleString('es-MX') +' MXN');
            
            $('#tdPorcentajePropuesta').text(_viaticos[0].power.porcentajePotencia + '%');
        break;
        case 'mediaTension':
            //Tarifas (actual y nueva)
            $('#tdTarifaActual').text(_viaticos[0].power.old_dac_o_nodac);
            $('#tdTarifaNueva').text(_viaticos[0].power.new_dac_o_nodac);
            $('#trTarifaNueva').css('display','none'); //Se esconde celda de 'tarifaNueva'
            
            //Ahorro energetico
            $('#tdConsumoActualKwMes').text(promedioConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdConsumoActualKwBim').text(promedioConsumoBimestral.toLocaleString('es-MX') + ' kw');
            $('#tdGeneracionKwMes').text(generacionMensual.toLocaleString('es-MX') + ' kw');
            $('#tdGeneracionKwBim').text(generacionBimestral.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoMes').text(nuevoConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoBim').text(nuevoConsumoBimestral.toLocaleString('es-MX') + ' kw');
            
            //Ahorro en dinero
            $('#tdConsumoActualDinMes').text('$ ' + _viaticos[0].roi.consumo.consumoMensualPesosMXN.toLocaleString('es-MX') + ' MXN');
            $('#tdConsumoActualDinBim').text('$ ' + _viaticos[0].roi.consumo.consumoBimestralPesosMXN.toLocaleString('es-MX') + ' MXN');
            $('#tdNuevoConsumoDinMes').text('$ ' + (_viaticos[0].roi.generacion.nuevoPagoBimestral / 2).toLocaleString('es-MX') + ' MXN');
            $('#tdNuevoConsumoDinBim').text('$ ' + _viaticos[0].roi.generacion.nuevoPagoBimestral.toLocaleString('es-MX') + ' MXN');
            
            //Porcentaje propuesta
            $('#tdPorcentajePropuesta').text(_viaticos[0].power.porcentajePotencia + '%');
        break;
        default:
            -1;
        break;
    }

    //Se pintan los resultados del calculo de viaticos
    $('#tdSubtotalUSD').text('$ ' + _viaticos[0].totales.precio.toLocaleString('es-MX'));
    $('#tdTotalUSD').text('$ ' + _viaticos[0].totales.precioMasIVA.toLocaleString('es-MX'));
    $('#tdSubtotalMXN').text('$ ' + _viaticos[0].totales.precioMXNSinIVA.toLocaleString('es-MX'));
    $('#tdTotalMXN').text('$ ' + _viaticos[0].totales.precioMXNConIVA.toLocaleString('es-MX'));
    
    $('#tdCostoWatt').text('$ ' + _viaticos[0].totales.precio_watt + ' USD');
    
    $('#tdROIbruto').text(+_viaticos[0].roi.roiEnAnios+' año(s)');
    $('#tdROIdeduccion').text(+_viaticos[0].roi.roiConDeduccion+' año(s)');
        
    ///Porcentaje de propuesta que aparece en el panelAjustePropuesta
    $('#inpSliderPropuesta').val(_viaticos[0].power.porcentajePotencia);
    $('#rangeValuePropuesta').val(_viaticos[0].power.porcentajePotencia);
        
    //Porcentaje de descuentoPropuesta que aparece en el panelAjustePropuesta
    $('#inpSliderDescuento').val(_viaticos[0].descuento.porcentaje);
    $('#rangeValueDescuento').val(_viaticos[0].descuento.porcentaje);
}
/*#endregion*/
/*#region Combinaciones*/
function seleccionarCombinacion(ddlCombinaciones){
    let _combinaciones = JSON.parse(sessionStorage.getItem("arrayCombinaciones"));

    if(ddlCombinaciones.value != -1){
        let ddlCombinacionesValor = ddlCombinaciones.value;

        //Llenado de celdas de *RESULTADOS*
        /* PotenciaInstalada / CostoPorWatt  */
        $('#tdPanelPotenciaReal').text(_combinaciones[0][ddlCombinacionesValor][0].paneles.potenciaReal + ' Kw');
        $('#tdCostoWatt').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].totales.precio_watt + ' USD');

        /* Tarifas */
        $('#tdTarifaActual').text(_combinaciones[0][ddlCombinacionesValor][0].power.old_dac_o_nodac);
        $('#tdTarifaNueva').text(_combinaciones[0][ddlCombinacionesValor][0].power.new_dac_o_nodac);

        /* % Generacion */
        $('#tdPorcentajePropuesta').text(_combinaciones[0][ddlCombinacionesValor][0].power.porcentajePotencia + ' %');
        /* ROI */
        $('#tdROIbruto').text(_combinaciones[0][ddlCombinacionesValor][0].roi.roiEnAnios + ' años');
        $('#tdROIdeduccion').text(_combinaciones[0][ddlCombinacionesValor][0].roi.roiConDeduccion + ' años');

        /* Panel */
        $('#tdPanelModelo').text(_combinaciones[0][ddlCombinacionesValor][0].paneles.nombre);
        $('#tdPanelPotencia').text(_combinaciones[0][ddlCombinacionesValor][0].paneles.potencia + ' W');
        $('#tdPanelCantidad').text(_combinaciones[0][ddlCombinacionesValor][0].paneles.noModulos);
        
        /* Inversor */
        $('#tdInversorModelo').text(_combinaciones[0][ddlCombinacionesValor][0].inversores.vNombreMaterialFot);
        $('#tdInversorPotencia').text(_combinaciones[0][ddlCombinacionesValor][0].inversores.fPotencia + ' W');
        $('#tdInversorCantidad').text(_combinaciones[0][ddlCombinacionesValor][0].inversores.numeroDeInversores);

        /* [AhorroEnergetico] */
        //ConsumoActual
        $('#tdConsumoActualKwMes').text(_combinaciones[0][ddlCombinacionesValor][0].power._consumos._promCons.promedioConsumosMensuales.toLocaleString('es-MX') + ' Kw');
        $('#tdConsumoActualKwBim').text(_combinaciones[0][ddlCombinacionesValor][0].power._consumos._promCons.promConsumosBimestrales.toLocaleString('es-MX') + ' Kw');
        //Generacion
        $('#tdGeneracionKwMes').text(_combinaciones[0][ddlCombinacionesValor][0].power.generacion.promedioDeGeneracion.toLocaleString('es-MX') + ' Kw');
        $('#tdGeneracionKwBim').text(_combinaciones[0][ddlCombinacionesValor][0].power.generacion.promeDGeneracionBimestral.toLocaleString('es-MX') + ' Kw');
        //NuevoConsumo
        $('#tdNuevoConsumoMes').text((_combinaciones[0][ddlCombinacionesValor][0].power._consumos._promCons.promedioConsumosMensuales - _combinaciones[0][ddlCombinacionesValor][0].power.generacion.promedioDeGeneracion).toLocaleString('es-MX') + ' Kw');
        $('#tdNuevoConsumoBim').text(((_combinaciones[0][ddlCombinacionesValor][0].power._consumos._promCons.promedioConsumosMensuales - _combinaciones[0][ddlCombinacionesValor][0].power.generacion.promedioDeGeneracion) * 2).toLocaleString('es-MX') + ' Kw');
        /* [AhorroEconomico] */
        //ConsumoActual
        $('#tdConsumoActualDinMes').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].power.objConsumoEnPesos.pagoPromedioMensual.toLocaleString('es-MX') + ' MXN');
        $('#tdConsumoActualDinBim').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].power.objConsumoEnPesos.pagoPromedioBimestral.toLocaleString('es-MX') + ' MXN');
        //NuevoConsumo
        $('#tdNuevoConsumoDinMes').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].power.objGeneracionEnpesos.pagoPromedioMensual.toLocaleString('es-MX') + ' MXN');
        $('#tdNuevoConsumoDinBim').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].power.objGeneracionEnpesos.pagoPromedioBimestral.toLocaleString('es-MX') + ' MXN');

        /* Totales */
        $('#tdSubtotalUSD').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].totales.precio.toLocaleString('es-MX') + ' USD');
        $('#tdTotalUSD').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].totales.precioMasIVA.toLocaleString('es-MX') + ' USD');
        $('#tdSubtotalMXN').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].totales.precioMXNSinIVA.toLocaleString('es-MX') + ' MXN');
        $('#tdTotalMXN').text('$ ' + _combinaciones[0][ddlCombinacionesValor][0].totales.precioMXNConIVA.toLocaleString('es-MX') + ' MXN');
    }
    else{
        limpiarCampos();
    }
}

function vaciarCombinacionesEnModal(combinaciones){
    let CombinacionA = combinaciones[0].combinacionEconomica[0]; //CombinacionEconomica
    let CombinacionB = combinaciones[0].combinacionMediana[0]; //CombinacionMediana
    let CombinacionC = combinaciones[0].combinacionOptima[0]; //CombinacionOptima

    /* CombinacionA */
    ///ImagenesLogos
    $('#imgPanelA').prop("src","../img/equipos/logos/panel/" + CombinacionA.paneles.marca + '.png');
    $('#imgInversorA').prop("src","../img/equipos/logos/inversor/" + CombinacionA.inversores.vMarca + '.jpg');
    $('#imgEstructuraA').prop("src","../img/equipos/logos/estructura/" + CombinacionA.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattA').text('$ '+CombinacionA.totales.precio_watt+' USD');
    ///Potencia instalada
    $('#tdPotenciaInstaladaA').text(CombinacionA.paneles.potenciaReal + ' Kw');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaA').text(CombinacionA.power.porcentajePotencia + ' %');
    ///Panel
    $('#tdModeloPanelA').text(CombinacionA.paneles.nombre);
    $('#tdCantidadPanelA').text(CombinacionA.paneles.noModulos);
    $('#tdPotenciaPanelA').text(CombinacionA.paneles.potencia + ' W');
    ///Inversor
    $('#tdModeloInversorA').text(CombinacionA.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorA').text(CombinacionA.inversores.numeroDeInversores);
    $('#tdPotenciaInversorA').text(CombinacionA.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraA').text(CombinacionA.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraA').text(CombinacionA.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoA').text(CombinacionA.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoA').text('$' + CombinacionA.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalA').text('$ ' + CombinacionA.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalA').text('$ ' + CombinacionA.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');

    /* CombinacionB */
    ///ImagenesLogos
    $('#imgPanelB').prop("src","../img/equipos/logos/panel/" + CombinacionB.paneles.marca + '.png');
    $('#imgInversorB').prop("src","../img/equipos/logos/inversor/" + CombinacionB.inversores.vMarca + '.jpg');
    $('#imgEstructuraB').prop("src","../img/equipos/logos/estructura/" + CombinacionB.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattB').text('$ ' + CombinacionB.totales.precio_watt + ' USD');
    $('#tdPotenciaInstaladaB').text(CombinacionB.paneles.potenciaReal + ' Kw');
    ///Panel
    $('#tdModeloPanelB').text(CombinacionB.paneles.nombre);
    $('#tdCantidadPanelB').text(CombinacionB.paneles.noModulos);
    ///Potencia instalada
    $('#tdPotenciaPanelB').text(CombinacionB.paneles.potencia + ' W');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaB').text(CombinacionB.power.porcentajePotencia + ' %');
    ///Inversor
    $('#tdModeloInversorB').text(CombinacionB.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorB').text(CombinacionB.inversores.numeroDeInversores);
    $('#tdPotenciaInversorB').text(CombinacionB.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraB').text(CombinacionB.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraB').text(CombinacionB.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoB').text(CombinacionB.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoB').text('$' + CombinacionB.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalB').text('$ ' + CombinacionB.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalB').text('$ ' + CombinacionB.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');

    /* CombinacionC */
    ///ImagenesLogos
    $('#imgPanelC').prop("src","../img/equipos/logos/panel/" + CombinacionC.paneles.marca + '.png');
    $('#imgInversorC').prop("src","../img/equipos/logos/inversor/" + CombinacionC.inversores.vMarca + '.jpg');
    $('#imgEstructuraC').prop("src","../img/equipos/logos/estructura/" + CombinacionC.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattC').text('$ ' + CombinacionC.totales.precio_watt+' USD');
    ///Potencia instalada
    $('#tdPotenciaInstaladaC').text(CombinacionC.paneles.potenciaReal + ' Kw');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaC').text(CombinacionC.power.porcentajePotencia + ' %');
    ///Panel
    $('#tdModeloPanelC').text(CombinacionC.paneles.nombre);
    $('#tdCantidadPanelC').text(CombinacionC.paneles.noModulos);
    $('#tdPotenciaPanelC').text(CombinacionC.paneles.potencia + ' W');
    ///Inversor
    $('#tdModeloInversorC').text(CombinacionC.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorC').text(CombinacionC.inversores.numeroDeInversores);
    $('#tdPotenciaInversorC').text(CombinacionC.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraC').text(CombinacionC.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraC').text(CombinacionC.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoC').text(CombinacionC.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoC').text('$' + CombinacionC.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalC').text('$ ' + CombinacionC.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalC').text('$ ' + CombinacionC.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');
}

function salvarCombinacion(){
    let ddlCombinacionesValue = $('#ddlCombinaciones').val();

    //Valida que se haya seleccionado alguna combinacion
    if(ddlCombinacionesValue != -1){
        //Se vacia el sessionStorage de la propuesta -SIN COMBINACIONES-
        sessionStorage.removeItem('answPropuesta');

        //Se obtiene el sessionStorage de -COMBINACIONES-
        let _combinaciones = JSON.parse(sessionStorage.getItem("arrayCombinaciones"));

        /*#region CombinacionSafe - Guardar Propuesta Salvada*/
        //Formatea el Object [CombinacionSalvada]
        let CombinacionSalvada = { propuesta: _combinaciones[0][ddlCombinacionesValue][0] };

        //Settear las propiedades[Object] de ->cliente && ->vendedor
        CombinacionSalvada.propuesta.cliente = _combinaciones[0].cliente;
        CombinacionSalvada.propuesta.vendedor = _combinaciones[0].vendedor;

        //Guardar en -sessionStorage- la combinacion a -salvar/guardar-
        sessionStorage.removeItem('combinacionSafe');
        sessionStorage.setItem('combinacionSafe', JSON.stringify(CombinacionSalvada.propuesta));
        /*#endregion */

        //Validar si el chbSalvarCombinacion, esta 'checked' o 'no-checked'
        if($('#salvarCombinacion').is(':checked')){
            //Se bloquea la lista desplegable de -combinaciones-
            $('#ddlCombinaciones').prop("disabled", true);

            //Habilitar botones de -GUARDAR- && -GENERAR-
            $('#btnGuardarPropuesta').prop("disabled",false);
            $('#btnGenerarEntregable').prop("disabled",false);
        }
        else{
            //Se desbloquea la lista desplegable de -combinaciones-
            $('#ddlCombinaciones').prop("disabled", false);

            //Deshabilitar botones de -GUARDAR- && -GENERAR-
            $('#btnGuardarPropuesta').prop("disabled",true);
            $('#btnGenerarEntregable').prop("disabled",true);
        }
    }
    else{
        //Desmarcar el -checklist-
        $('#salvarCombinacion').prop("checked", false);
        //Deshabilitar botones de -GUARDAR- && -GENERAR-
        $('#btnGuardarPropuesta').prop("disabled",true);
        $('#btnGenerarEntregable').prop("disabled",true);

        alert('No se a seleccionado ninguna de las -combinaciones-');
    }
}

function getDataCombinacionesFiltrada(_Combinaciones){
    /* Optimiza los nodos de la data de combinaciones. Eliminando todo lo innecesario y asi aligerando
       en tamaño y volumen la data.
    */
    ///Cachar el nombre de la [combinacionSalvada]
    let nameCombinSalvada = $('#ddlCombinaciones').val();

    //Propuesta seleccionada
    let dataFiltrada = { propuesta: _Combinaciones[nameCombinSalvada][0], propuestaSeleccionada: nameCombinSalvada };

    //Se *Settea* la data de -Cliente- && -Vendedor- al objeto Propuesta
    dataFiltrada.propuesta.cliente = _Combinaciones.cliente;
    dataFiltrada.propuesta.vendedor = _Combinaciones.vendedor;

    //Iterar toda la data para extraer las combinaciones *DISTINTAS* a la que fue seleccionada
    $.each(_Combinaciones, (iteracion, Combinacion) => {
        //Validar que son array (Solo las combinaciones *son Array*)
        if(Array.isArray(Combinacion) === true){
            //Filtrar las demas combinaciones, *menos la "salvada" / seleccionada*
            //Tratar la data[combinacion] y retornar la data solo con las propiedades necesarias/filtrada
            let dataTratada = {
                paneles: { 
                    potenciaReal: Combinacion[0].paneles.potenciaReal,
                    nombre: Combinacion[0].paneles.nombre,
                    noModulos: Combinacion[0].paneles.noModulos,
                    potencia: Combinacion[0].paneles.potencia,
                    marca: Combinacion[0].paneles.marca
                },
                inversores: { 
                    vNombreMaterialFot: Combinacion[0].inversores.vNombreMaterialFot,
                    numeroDeInversores: Combinacion[0].inversores.numeroDeInversores,
                    fPotencia: Combinacion[0].inversores.fPotencia,
                    marca: Combinacion[0].inversores.vMarca
                },
                estructura: { 
                    cantidad: Combinacion[0].estructura.cantidad,
                    marca: Combinacion[0].estructura._estructuras.vMarca,
                    costoTotal: Combinacion[0].estructura.costoTotal
                },
                power: { 
                    porcentajePotencia: Combinacion[0].power.porcentajePotencia,
                    Ahorro: { ahorroBimestral: Combinacion[0].power.Ahorro.ahorroBimestral }
                },
                roi: { 
                    ahorro: { ahorroBimestralEnPesosMXN: Combinacion[0].roi.ahorro.ahorroBimestralEnPesosMXN }
                },
                totales: { 
                    precio_watt: Combinacion[0].totales.precio_watt,
                    precio: Combinacion[0].totales.precio,
                    precioMasIVA: Combinacion[0].totales.precioMasIVA
                }
            };

            //Se mezcla *dataTratada* -To- *dataFiltrada*
            Object.defineProperty(dataFiltrada, iteracion, {
                enumerable: true,
                value: dataTratada
            }); 
        }
    });

    return dataFiltrada;
}
/*#endregion*/

function cambiarModalidad(control){
    let valor = control.value;

    //
    if($('#ddlCombinaciones').is(":disabled")){
        $('#ddlCombinaciones').prop("disabled",false);
    }

    //
    $('#ddlCombinaciones').val(-1);
    $('#listPaneles').val(-1);
    $('#listInversores').val(-1);
    $('#crtGraficos').remove();//Se -elimina- el canvas[grafico]
    $('#btnGuardarPropuesta').prop("disabled",true);//Bloquear boton -Guardar-
    $('#btnGenerarEntregable').prop("disabled",true);//Bloquear boton -Generar-
    limpiarCampos();

    if(valor === "0"){
        /* div_ElegirEquipo */
        $('#lblConvEquip').text('Equipos');
        $('#lblSwitchConvEquip').text("Elegir combinacion");
        $('#divConvinaciones').css("display","none");
        $('#divPlusEquipos').css("display","none");
        $('#divElegirEquipo').css("display","");

        //
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
        $('#btnDivCombinaciones').css("display","");

        //Resetean dropdownlist
        $('#listPaneles').val(-1);
        $('#listInversores').val(-1).prop("disabled",true);
        $('#listModelosInversor').val(-1).prop("disabled",true);

        $('#switchConvEquip').val("0");
    }
}

function sliderModificarPropuesta(){
    if($('#btnModificarPropuesta').is(":disabled")){ //El boton de "modificar_propuesta" se encuentra inhabilitado
        $('#btnModificarPropuesta').attr("disabled",false); //Se habilita el boton de "modificar_propuesta"
    }

    if($('#inpSliderDescuento').val() >= 1 || $('#inpSliderDescuento').val() >= '1'){
        //Inhabilitar y dejar en 0 el slider de AUMENTO
        $('#inpSliderAumento').val(0);
        $('#rangeValueAumento').val(0);
        $('#inpSliderAumento').prop("disabled", true);
    }
    else if($('#inpSliderDescuento').val() == 0){
        //Habilitar el slider de AUMENTO
        $('#inpSliderAumento').prop("disabled", false);
    }
}

async function modificarPropuesta(){
    let tipoCotizacion = sessionStorage.getItem('tarifaMT');

    //Modificar sessionStorage de "propuestaNueva" o "propuestaModificada" *0 = Nueva* *1 = Modificada*
    sessionStorage.removeItem("bndPropuestaEditada");
    sessionStorage.setItem("bndPropuestaEditada", 1);

    //Se cambia de estado los dropDownList de Equipos [ Paneles, Inversores ]
    $('listPaneles').val('-1');
    $('listInversores').val('-1');

    // //Se limpian inputs de resultados
    limpiarCampos();

    // //Cachar los valores de los porcentajes / panel de ajuste
    let porcentajePropuesta = parseFloat($('#inpSliderPropuesta').val()) || 0;
    let porcentajeDescuento = parseFloat($('#inpSliderDescuento').val()) || 0; 
    let porcentajeAumento = parseFloat($('#inpSliderAumento').val()) || 0; 

    // //Se guarda el porcentaje de descuento, para su futura implementacion (ya que el descuento se aplica hasta el step:"cobrar_viaticos")
    sessionStorage.removeItem("descuentoPropuesta");
    sessionStorage.setItem("descuentoPropuesta",porcentajeDescuento);
    sessionStorage.removeItem("aumentoPropuesta");
    sessionStorage.setItem("aumentoPropuesta",porcentajeAumento);

    // //Se arma la data para editar la propuesta
    let dataPorcentajes = { porcentajePropuesta, porcentajeDescuento, porcentajeAumento };

    // //Se realiza nuevamente la propuesta
    if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension
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

/*#region Estructuras*/
function getListEstructuras(){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'GET',
            url: '/estructuras',
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status == '500'){
                    reject('Error al intentar consultar estructuras!');
                    console.log('Error estructuras:');
                    console.log(respuesta.message);
                }
                else{
                    resolve(respuesta);
                }
            },
            error: function(error){
                alert('Hubo un error al consultar las estructuras');
                console.log('Error estructuras:\n'+error);
            }
        });
    });
}

async function cambiarEstructura(){
    let tipoCotizacion = sessionStorage.getItem('tarifaMT');
    let viaticosResult = null;

    if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        viaticosResult = await calcularViaticosBT();
    }
    else{ ///MediaTension
        viaticosResult = await calcularViaticosMT();
    }

    mostrarRespuestaViaticos(viaticosResult);
}
/*#endregion*/