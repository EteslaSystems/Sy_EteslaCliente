var _periodos = [];

$(document).ready(function(){
    sessionStorage.removeItem("tarifaMT");
    sessionStorage.setItem("tarifaMT", "GDMTO"); ///Tarifa seleccionada -(Inicia en GDMTO, porque es la primera propuesta que se muestra en pantalla)-
});

/*#region Solicitudes Servidor*/
async function calcularPropuestaMT(dataEditada){
    let dataEdited = dataEditada || null; //Propuesta nueva o editada
    let dataSent = {arrayPeriodos:'', direccionCliente:'', idCliente:'', tarifa:'', porcentajePropuesta:0, porcentajeDescuento:0};
    let tarifaMT = sessionStorage.getItem("tarifaMT");
    //Validar que el cliente este cargado
    let clienteCargado = validarClienteCargado();

    dataSent.arrayPeriodos = _periodos;
    dataSent.direccionCliente = clienteCargado.direccion;
    dataSent.idCliente = clienteCargado.id;
    dataSent.tarifa = tarifaMT;

    if(dataEdited != null){ ///Propuesta editada
        dataSent.porcentajePropuesta = dataEdited.porcentajePropuesta;
    }

    if(clienteCargado != false){
        if(validarPeriodosVacios() === true){
            if(dataEdited === null){ ///Cotizacion Nueva
                //Pintar vista de resultados
                await getVistaResultados();
                
                //Mandar a calcular la propuesta
                let cotizacionPaneles = await sendMediaTensionCotizacion(dataSent);
                vaciarRespuestaPaneles(cotizacionPaneles);

                //Se obtiene estructuras
                let estructuras = await getListEstructuras();
                llenarDropDownListEstructuras(estructuras.message);
                //El sistema selecciona una estructura
                seleccionaUnaEstructura('Everest');

                //Experimental
                mostrarPanelSelected();
            }
            else{ ///Cotizacion Editada
            
            }
        }
    }
    else{
        alert('Falta cargar un cliente!!');
    }  
}

function getVistaResultados(){
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
            $('#divCotizacionMediaTension').css("display","none");
            $('#btnCalcularMT').css("display","none");
            $('#divResultCotizacion').css("display","");
            $('#divResult').html(vistaResultados);
        })
        .catch(error => {
            alert(error);
        });
    });
}

function calcularViaticosMT(obInversor){
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let panel = sessionStorage.getItem("__ssPanelSeleccionadoMT");
    let inversor = {};
    let direccion = $('#municipio').val();
    let periodos = sessionStorage.getItem("_consumsFormated"); ///Periodos recolectados (sin calcular)
    periodos = JSON.parse(periodos);
    
    _agregado = _agregado; ///Arreglo de objAgregados*
    _agregado = _agregado == null || _agregado.length == 0 ? null : _agregado;///Comprobacion de que no venga vacio

    if(obInversor == null || typeof tipoCotizacion === 'undefined'){ //El inversor es seleccionado por el sistema
        inversor = JSON.parse(sessionStorage.getItem("__ssInversorSeleccionado"));
    }
    else{ //El inversor es seleccionado por el usuario
        inversor = obInversor;
    }

    let estructuraSeleccionada = $('#listEstructura').val();
    estructuraSeleccionada = estructuraSeleccionada != '-1' || estructuraSeleccionada != -1 ? estructuraSeleccionada : null;

    let objPropuesta = { panel: panel, inversor: inversor, periodos: periodos, estructura: estructuraSeleccionada };

    //Se obtiene tarifa_mediaTension (GDMTO/GDMTH)
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/calcularVT',
            data: { 
                "idCliente": idCliente,
                "propuesta": objPropuesta,
                "direccionCliente": direccion,
                "tarifa": tarifaMT,
                "_agregados": _agregado
            },                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
            dataType: 'json',
            success: function(resultViaticos){
                if(resultViaticos.status === "200" || resultViaticos.status === 200){
                    //Se guarda la propuesta calculada (c/Viaticos)
                    sessionStorage.removeItem("propuestaMT");
                    sessionStorage.setItem('propuestaMT',JSON.stringify(resultViaticos.message));

                    resolve(resultViaticos);
                }
                else{
                    console.log('Error, calcular viaticos: '+resultViaticos.message);
                    alert('Error, calcular viaticos: \nChecar "console.log() del navegador"');
                }
            },
            error: function(error){
                reject('Se produjo un error al intentar calcular viaticos: '+error);
            }
        });
    });
}

/*#endregion*/

/*#region Data*/
function sendMediaTensionCotizacion(cotiData){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/enviarPeriodos',
            data: cotiData,
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status == '500'){
                    alert('Error al intentar ejecutar su propuesta!');
                }
                else{
                    respuesta = respuesta.message; //Array paneles

                    //Se guarda la respuesta de los *PERIODOS-PROCESADOS*
                    sessionStorage.removeItem('_consumsFormated');
                    sessionStorage.setItem('_consumsFormated',JSON.stringify(respuesta[0]));

                    //Formatear sessionStorage
                    sessionStorage.removeItem('_respPanelesMT');
                    //Se guarda la respuesta paneles para su futura implementacion
                    sessionStorage.setItem('_respPanelesMT',JSON.stringify(respuesta));

                    //Retornar _arrayPaneles
                    resolve(respuesta);
                }
            },
            error: function(error){
                reject('Estatus: 500! \n Al parecer hubo un error con la peticion AJAX de la cotizacion MediaTension\n'+error);
            }
        });
    });
}

function agregarPeriodo(){
    var periodo = {};
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    if(validarCamposVacios() === true){
        //Se obtiene todos los inputs pertenecientes a la tarifa que esta seleccionada
        _inputs = document.getElementsByClassName('inp'+tarifaMT); 
        //Parsea htmlElement _input => array
        _inputs = [].slice.call(_inputs);
        //Se itera la coleccion de inputs para poder obtener su ID y su VALUE y asi agregarlo a un *PERIODO*
        _inputs.forEach(input => {
            //Obtener id de input que se encuentra iterando
            idInput = input.id;
            //Se formatea el "id" para obtener el *nombre* de la nueva-propiedad del objeto que sera un *PERIODO*
            idInput = idInput.slice(3);
            //Crear propiedad/nombre_propiedad del objeto y asignarle valor a la misma
            periodo[idInput] = input.value;
        });

        _periodos.push(periodo);
        sumarIndexador();
        crudState(0);
    }
}

function actualizarPeriodo(){
    var iterador = $('#lstPeriodosGDMTH option:selected').val();
    let tarifaMT = sessionStorage.getItem(tarifaMT);

    //Se obtiene todos los inputs pertenecientes a la tarifa que esta seleccionada
    _inputs = document.getElementsByClassName('inp'+tarifaMT); 
    //Parsea htmlElement _input => array
    _inputs = [].slice.call(_inputs);
    //Se itera la coleccion de inputs para poder obtener su ID y su VALUE y asi agregarlo a un *PERIODO*
    _inputs.forEach(input => {
        //Obtener el valor del input que se encuentra iterando
        input.value;

        //Obtener id de input que se encuentra iterando
        idInput = input.id;
        //Se formatea el "id" para obtener el *nombre* de la nueva-propiedad del objeto que sera un *PERIODO*
        idInput = idInput.slice(3);
        //Leer el objeto que se encuentra dentro de la posicion *iterador-1* del array... En la propiedad *idInput* que le corresponde
        _periodos[iterador-1][idInput] = input.value;
    });
    
    crudState(2);
}
/*#endregion*/

/*#region Logica*/
function visualizarPeriodos(option){
    let iterador = option.value;
    let indexador = () => { 
        $('#lstPeriodosGDMTH option').each(function(){
            valueOption = parseInt($(this).text());
        })
        return valueOption; 
    };

    indexador = indexador();

    if(iterador != indexador){//Leer || Visualizar periodo
        crudState(3);
        //Se obtiene el nombre de las propiedades del objeto que se encuentra guardado en la posicion señalada dentro del array _periodos
        for(let key in _periodos[iterador-1])
        {
            //Vaciado/Visualizado de los periodos *grabados* en los inputs
            document.getElementById('inp'+key).value = _periodos[iterador-1][key];
        }
    }
    else{ //Nuevo periodo
        crudState(0);
    }
}

function crudState(opcion){
    switch(opcion)
    {
        case 0: //Crear
            $('.inpGDMTH').attr("disabled",false);
            $('#btnAgregarPeriodo').attr("disabled",false);
            $('#btnEditarPeriodo').attr("disabled",true);
            $('#btnActualizarPeriodo').attr("disabled",true);
            limpiarCamposPeriodo();
        break;
        case 1: //Editar
            $('#btnAgregarPeriodo').attr("disabled",true);
            $('#btnEditarPeriodo').attr("disabled",true);
            $('#btnActualizarPeriodo').attr("disabled",false);
            $('.inpGDMTH').attr("disabled",false);
        break;
        case 2: //Actualizar
            $('#btnEditarPeriodo').attr("disabled",false);
            $('.inpGDMTH').attr("disabled",true);
        break;
        case 3: //Visualizar
            $('.inpGDMTH').attr("disabled",true);
            $('#btnAgregarPeriodo').attr("disabled",true);
            $('#btnEditarPeriodo').attr("disabled",false);
        break;
        default: //Bloquear todo
            -1;
        break;
    }
}

function tarifaSelected(botonTarifa){
    let tarifaMT = botonTarifa.id == "btnTarifGDMTH" ? "GDMTH" : "GDMTO";
    tarifaOff = tarifaMT == "GDMTH" ? "GDMTO" : "GDMTH";

    sessionStorage.setItem("tarifaMT", tarifaMT);

    $('#div'+tarifaOff).hide();
    $('#div'+tarifaMT).show();

    _periodos = []; //Se reinicia/formatea el array de periodos-mediatension
    limpiarlistPeriodos(); //Se limpia el dropdownlist que va contabilisando los periodos
    limpiarCamposPeriodo(); //Se limpian los campos pertenecientes al periodo
}

function limpiarlistPeriodos(){
    //Se borran los options
    $('#lstPeriodosGDMTH option').each(function(){
        if($(this).val() != "1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function sumarIndexador(){
    let indexador = () => { 
        $('#lstPeriodosGDMTH option').each(function(){
            valueOption = parseInt($(this).text());
        })
        return valueOption; 
    };

    indexador = indexador();

    if(indexador < 12){
        $('#lstPeriodosGDMTH').append('<option value="'+(indexador+1)+'">'+(indexador+1)+'</option>');
        $('#lstPeriodosGDMTH option').prop('selected',true);
    }
}

function mostrarPanelSelected(){
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
            let _paneles = sessionStorage.getItem('_respPanelesMT');
            _paneles = JSON.parse(_paneles);
            /*#endregion*/
    
            $('#inpMarcaPanelS').val(_paneles[ddlPanelesValue].panel.vMarca);
    
            //Consumos
            let promedioConsumoMensual = _paneles[0].consumo._promCons.consumoMensual.promedioConsumoMensual;
            $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
            
            //Pintada de resultados - Paneles
            $('#tdPanelCantidad').text(_paneles[ddlPanelesValue].panel.noModulos);
            $('#tdPanelModelo').text(_paneles[ddlPanelesValue].panel.nombre);
            $('#tdPanelPotencia').text(_paneles[ddlPanelesValue].panel.potencia.toLocaleString('es-MX') + ' W');
            $('#tdPanelPotenciaReal').text(_paneles[ddlPanelesValue].panel.potenciaReal + ' Kw');
    
            //Equipo seleccionado - Panel seleccionado
            sessionStorage.removeItem('__ssPanelSeleccionadoMT');
            sessionStorage.setItem('__ssPanelSeleccionadoMT',JSON.stringify(_paneles[ddlPanelesValue].panel));

            //Se carga dropDownList -Inversores-
            let _inversores = await obtenerInversoresParaPanelSeleccionado(_paneles[ddlPanelesValue]);
            _inversores = _inversores.message;

            //SessionStorage
            sessionStorage.removeItem("_respInversores");
            sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));
            
            ///EXPERIMENTAL
            mostrarInversorSelected(); //MARCA - DropDownList
            mostrarInversorModeloSelected(); //MODELO - DropDownList

            vaciarRespuestaInversores(_inversores); //:void() = Se pintan las marcas de los inversores
            let objInversorCB = getInversorCostoBeneficio(0); //Se obtiene la mejor opcion 'Costo-Beneficio'
            
            //Guardar inversor
            sessionStorage.removeItem('__ssInversorSeleccionado')
            sessionStorage.setItem('__ssInversorSeleccionado', JSON.stringify(objInversorCB));

            //Se selecciona MARCA en el dropDownListInversoresMarca
            $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
            
            vaciarModelosInversores(); //:void()

            //Se selecciona MODELO en el dropDownListInversoresModelos
            $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);
            let _viaticos = await calcularViaticosMT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void()
            ///EXPERIMENTAL
        }
    });
}

function mostrarInversorSelected(){
    let ddlInversores = $('#listInversores');

    ddlInversores.on("change", async function(){
        let ddlInversoresValue = ddlInversores.val(); //Marca del Inversor

        //Limpieza de dropDownList y campos -Inversores-
        limpiarResultados(1);
        limpiarDropDownListModelosInversores();
    
        /*Cuando el dropDownList de inversores *NO TIENE* un equipo seleccionado*/
        if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
            //Se desactivan controles
            activarDesactivarBotones(1,0);
        }
        else{
            /*Cuando el dropDownList de inversores *TIENE* un equipo seleccionado*/

            //Se activan controles
            activarDesactivarBotones(1,1); 
    
            //Se obtiene el mejor inversor -CostoBeneficio-
            let objInversorCB = getInversorCostoBeneficio(1);

            //Se pinta en los dropDownList -el inversor seleccionado *CostoBeneficio*-
            $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
            vaciarModelosInversores(); //:void()
            $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);

            //Se calculan viaticos del equipo 
            let _viaticos = await calcularViaticosMT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void()
        }
    });
}

function mostrarInversorModeloSelected(){
    /* Muestra todos los modelos relacionados dependiendo de la -MARCA- pintada en el primer <select>*/

    let ddlModelosInversor = $('#listModelosInversor'); //ModelosInversores
    
    ddlModelosInversor.on('change', async function(){
        let valueListModlsInv = ddlModelosInversor.val(); //obtener - Modelo de inversor
        let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
        
        limpiarResultados(1);

        if(valueListModlsInv != '-1' || valueListModlsInv != -1){
            let inversorFiltradoh = searchInversor(_inversors,valueListModlsInv);

            sessionStorage.removeItem('__ssInversorSeleccionado');
            sessionStorage.setItem('__ssInversorSeleccionado', JSON.stringify(inversorFiltradoh));

            let _viatico = await calcularViaticosMT(inversorFiltradoh);
            mostrarRespuestaViaticos(_viatico);
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

function limpiarCamposPeriodo(){
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    $('.inp'+tarifaMT).val('');
} 

function backToCotizacion(){
    $("#divCotizacionMediaTension").css("display","");
    $("#btnCalcularMT").css("display","");
    $("#divResultCotizacion").css("display","none");
}
/*#endregion*/

/*#region Validaciones*/
function validarCamposVacios(){
    let respuesta = '';
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    $(".inp"+tarifaMT).each(function(){
        respuesta = $(this).val() === "" ? false : true;
    });

    if(respuesta === false){
        alert('Favor de llenar todos los inputs!!')
        return respuesta;
    }
    
    return respuesta;
}

function validarClienteCargado(){
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let direccionCliente = $('#municipio').val();

    if(idCliente != "" && direccionCliente != ""){
        objResult = { id: idCliente, direccion: direccionCliente };
        return objResult;
    }
    else{
        return false;
    }
}

function validarPeriodosVacios(){
    if(_periodos.length === 0){
        alert('Periodos insuficientes para calcular');
    }
    else{
        return true;
    }
}
/*#endregion*/