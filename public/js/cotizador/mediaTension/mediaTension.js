var _periodos = [];

$(document).ready(function(){
    sessionStorage.removeItem("tarifaMT");
    sessionStorage.setItem("tarifaMT", "GDMTO"); ///Tarifa seleccionada -(Inicia en GDMTO, porque es la primera propuesta que se muestra en pantalla)-
    $('#xmlEnero').on('click', function () {
        $('#urlxmlEnero').click();
    });

    $('#urlxmlEnero').on('change', function () {
        var form = $('#fileUploadForm')[0];
        var data = new FormData(form);
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/extractInfoCFEXml",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                try{
                    const xmlStr = data;
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(xmlStr, "application/xml");
                    // print the name of the root element or error message
                    const errorNode = doc.querySelector("parsererror");
                    if (errorNode) {
                        console.log("error while parsing");
                    } else {
                        let rootElement = doc.documentElement;
                        let receptor = rootElement.getElementsByTagName('cfdi:Receptor');

                        let addenda = rootElement.getElementsByTagName('cfdi:Addenda');
                        console.log(2);
                        let clsRegArchFact = addenda[0].getElementsByTagName('clsRegArchFact');
                        console.log(3);

                        let nombre = clsRegArchFact[0].getElementsByTagName('NOMBRE')[0].textContent;
                        console.log(4);
                        let direccion = clsRegArchFact[0].getElementsByTagName('DIRECC')[0].textContent;
                        let colonia = clsRegArchFact[0].getElementsByTagName('COLONIA')[0].textContent;
                        let poblacion = clsRegArchFact[0].getElementsByTagName('NOMPOB')[0].textContent;
                        let estado = clsRegArchFact[0].getElementsByTagName('NOMEST')[0].textContent;
                        let rpu = clsRegArchFact[0].getElementsByTagName('RPU')[0].textContent;

                        // firstTier el la NodeList de los hijos directos del elemento raízof the direct children of the root element
                        document.getElementById("nombre").innerHTML = nombre;
                        document.getElementById("direccion").innerHTML = direccion;
                        document.getElementById("colonia").innerHTML = colonia;
                        document.getElementById("poblacion").innerHTML = poblacion;
                        document.getElementById("estado").innerHTML = estado;
                        document.getElementById("rpu").innerHTML = rpu;

                        let Distribucion = clsRegArchFact[0].getElementsByTagName('IMPTE_KW_REG_2')[0].textContent;
                        let Transmision = clsRegArchFact[0].getElementsByTagName('IMPTE_KWH_REG_3')[0].textContent;
                        let Generacion_B  = clsRegArchFact[0].getElementsByTagName('IMPTE_KWH_REG_5')[0].textContent;
                        let Generacion_I  = clsRegArchFact[0].getElementsByTagName('IMPTE_KWH_REG_6')[0].textContent;
                        let Generacion_P  = clsRegArchFact[0].getElementsByTagName('IMPTE_KWH_REG_7')[0].textContent;
                        let Capacidad  = clsRegArchFact[0].getElementsByTagName('IMPTE_KW_REG_8')[0].textContent;

                        let Capacidad2  = clsRegArchFact[0].getElementsByTagName('IMPTE_KW_REG_6')[0].textContent;

                        let tarifaReg = clsRegArchFact[0].getElementsByTagName('TARIFA_REG')[0].textContent;

                        console.log(tarifaReg);


                        if(tarifaReg==='GDMTO'){
                             let consumo_kWh_intermedia = clsRegArchFact[0].getElementsByTagName('CONSUMO_R')[0].textContent;
                             let demanda_kWh_intermedia = clsRegArchFact[0].getElementsByTagName('DEMANDA')[0].textContent;
                            document.getElementById("consumo_kWh_base").innerHTML = 0
                            document.getElementById("consumo_kWh_intermedia").innerHTML = consumo_kWh_intermedia;
                            document.getElementById("consumo_kWh_punta").innerHTML = 0
                            document.getElementById("demanda_kWh_base").innerHTML = 0;
                            document.getElementById("demanda_kWh_intermedia").innerHTML = demanda_kWh_intermedia;
                            document.getElementById("demanda_kWh_punta").innerHTML = 0;

                            document.getElementById("Distribucion").innerHTML = Distribucion;
                            document.getElementById("Transmision").innerHTML = Transmision;
                            document.getElementById("Generacion_B").innerHTML = 0;
                            document.getElementById("Generacion_I").innerHTML = Generacion_B;
                            document.getElementById("Generacion_P").innerHTML = 0;
                            document.getElementById("Capacidad").innerHTML = Capacidad2;
                        }else{
                            let consumo_kWh_base = clsRegArchFact[0].getElementsByTagName('CONSUMO3F')[0].textContent;
                             let consumo_kWh_intermedia = clsRegArchFact[0].getElementsByTagName('CONSUMO2F')[0].textContent;
                            let consumo_kWh_punta = clsRegArchFact[0].getElementsByTagName('CONSUMO1F')[0].textContent;

                            let demanda_kWh_base = clsRegArchFact[0].getElementsByTagName('DEMANDA3P')[0].textContent;
                             let demanda_kWh_intermedia = clsRegArchFact[0].getElementsByTagName('DEMANDA2P')[0].textContent;
                            let demanda_kWh_punta = clsRegArchFact[0].getElementsByTagName('DEMANDA1P')[0].textContent;

                            document.getElementById("consumo_kWh_base").innerHTML = consumo_kWh_base;
                            document.getElementById("consumo_kWh_intermedia").innerHTML = consumo_kWh_intermedia;
                            document.getElementById("consumo_kWh_punta").innerHTML = consumo_kWh_punta;


                            if (clsRegArchFact[0].getElementsByTagName("OCR_MM_NOM")[0].textContent === 'ABR'){
                                document.getElementById("demanda_kWh_base").innerHTML = demanda_kWh_base;
                                document.getElementById("demanda_kWh_intermedia").innerHTML = demanda_kWh_intermedia;
                                document.getElementById("demanda_kWh_punta").innerHTML = demanda_kWh_punta;
                            }else if(clsRegArchFact[0].getElementsByTagName("OCR_MM_NOM")[0].textContent === 'OCT'){
                                demanda_kWh_base = clsRegArchFact[0].getElementsByTagName('KWB15')[0].textContent;
                                demanda_kWh_intermedia = clsRegArchFact[0].getElementsByTagName('KWI15')[0].textContent;
                                demanda_kWh_punta = clsRegArchFact[0].getElementsByTagName('KWP15')[0].textContent;
                                document.getElementById("demanda_kWh_base").innerHTML = demanda_kWh_base;
                                document.getElementById("demanda_kWh_intermedia").innerHTML = demanda_kWh_intermedia;
                                document.getElementById("demanda_kWh_punta").innerHTML = demanda_kWh_punta;
                            }else{

                                document.getElementById("demanda_kWh_base").innerHTML = demanda_kWh_base;
                                document.getElementById("demanda_kWh_intermedia").innerHTML = demanda_kWh_intermedia;
                                document.getElementById("demanda_kWh_punta").innerHTML = demanda_kWh_punta;
                            }
                            document.getElementById("Distribucion").innerHTML = Distribucion;
                            document.getElementById("Transmision").innerHTML = Transmision;
                            document.getElementById("Generacion_B").innerHTML = Generacion_B;
                            document.getElementById("Generacion_I").innerHTML = Generacion_I;
                            document.getElementById("Generacion_P").innerHTML = Generacion_P;
                            document.getElementById("Capacidad").innerHTML = Capacidad;


                        }














                    }
                    //console.log(data);
                    /*const obj = JSON.parse(data);
                    if(obj.error=="") {
                        console.log(data);
                    }else{
                        alert(data.error);
                    }*/
                }catch (e) {
                    alert(e.message);
                }
            },
            error: function (e) {
                console.log("ERROR : ", e);
            }
        });

    });
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

                //
                console.log(cotizacionPaneles);

                vaciarRespuestaPaneles(cotizacionPaneles);

                //Se obtiene estructuras
                let estructuras = await getListEstructuras();
                llenarDropDownListEstructuras(estructuras.message);
                //El sistema selecciona una estructura
                seleccionaUnaEstructura('Everest');
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
                    //Acceder a la data de la respuesta
                    respuesta = respuesta.message; //Array paneles

                    //Guardar [periodos] para futura consulta/implementacion
                    sessionStorage.removeItem("_periodosMT");
                    sessionStorage.setItem("_periodosMT", JSON.stringify(respuesta[0]));

                    //Guardar en -SS- los paneles para su futura iteracion
                    sessionStorage.removeItem('_respPaneles');
                    sessionStorage.setItem('_respPaneles',JSON.stringify(respuesta));

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

// function mostrarInversorSelected(){
//     let ddlInversores = $('#listInversores');

//     ddlInversores.on("change", async function(){
//         let ddlInversoresValue = ddlInversores.val(); //Marca del Inversor

//         //Limpieza de dropDownList y campos -Inversores-
//         limpiarResultados(1);
//         limpiarDropDownListModelosInversores();
    
//         /*Cuando el dropDownList de inversores *NO TIENE* un equipo seleccionado*/
//         if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
//             //Se desactivan controles
//             activarDesactivarBotones(1,0);
//         }
//         else{
//             /*Cuando el dropDownList de inversores *TIENE* un equipo seleccionado*/

//             //Se activan controles
//             activarDesactivarBotones(1,1); 
    
//             //Se obtiene el mejor inversor -CostoBeneficio-
//             let objInversorCB = getInversorCostoBeneficio(1);

//             //Se pinta en los dropDownList -el inversor seleccionado *CostoBeneficio*-
//             $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
//             vaciarModelosInversores(); //:void()
//             $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);

//             //Se calculan viaticos del equipo 
//             let _viaticos = await calcularViaticosMT(objInversorCB);
//             mostrarRespuestaViaticos(_viaticos); //:void()
//         }
//     });
// }

// function mostrarInversorModeloSelected(){
//     /* Muestra todos los modelos relacionados dependiendo de la -MARCA- pintada en el primer <select>*/

//     let ddlModelosInversor = $('#listModelosInversor'); //ModelosInversores
    
//     ddlModelosInversor.on('change', async function(){
//         let valueListModlsInv = ddlModelosInversor.val(); //obtener - Modelo de inversor
//         let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
        
//         limpiarResultados(1);

//         if(valueListModlsInv != '-1' || valueListModlsInv != -1){
//             let inversorFiltradoh = searchInversor(_inversors,valueListModlsInv);

//             sessionStorage.removeItem('__ssInversorSeleccionado');
//             sessionStorage.setItem('__ssInversorSeleccionado', JSON.stringify(inversorFiltradoh));

//             let _viatico = await calcularViaticosMT(inversorFiltradoh);
//             mostrarRespuestaViaticos(_viatico);
//         }
//     });
// }

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