var tarifaMT = '';
var _periodos = [];

/*#region Solicitudes Servidor*/
async function calcularPropuestaMT(dataEditada){
    let dataEdited = dataEditada || null; //Propuesta nueva o editada
    let dataSent = {arrayPeriodos:'', direccionCliente:'', idCliente:'',porcentajePropuesta:0, porcentajeDescuento:0};

    //Validar que el cliente este cargado
    let clienteCargado = validarClienteCargado();

    dataSent.arrayPeriodos = _periodos;
    dataSent.direccionCliente = clienteCargado.direccion;
    dataSent.idCliente = clienteCargado.id;

    if(dataEdited != null){
        dataSent.porcentajePropuesta = dataEdited.porcentajePropuesta;
    }

    if(clienteCargado != false){
        if(validarPeriodosVacios() === true){
            if(dataEdited === null){ ///COTIZACION_NUEVA
                //Pintar vista de resultados
                await getVistaResultados();
            }

            new Promise((resolve, reject) => {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    url: '/enviarPeriodos',
                    data: dataSent,
                    dataType: 'json',
                    success: function(respuesta){
                        if(respuesta.status == '500'){
                            alert('Error al intentar ejecutar su propuesta!');
                        }
                        else{
                            respuesta = respuesta.message; //Array paneles
                            
                            //Retornar _arrayPaneles
                            resolve(respuesta);
                        }
                    },
                    error: function(){
                        reject('Al parecer hubo un error con la peticion AJAX de la cotizacion MediaTension');
                    }
                });
            })
            .then(resultPaneles => {
                //Se guarda la respuesta paneles para su futura implementacion
                sessionStorage.setItem('_respPanelesMT',JSON.stringify(resultPaneles));
                
                //Llenar dropDownList de paneles
                vaciarRespuestaPaneles(resultPaneles);
                
                //Dotar de funcionalidad al DropDownListPaneles
                mostrarPanelSelected();
            });
        }
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
    let panel = sessionStorage.getItem("__ssPanelSeleccionadoMT");
    let inversor = '';
    let direccion = $('#municipio').val();
    let periodos = sessionStorage.getItem("_respPanelesMT"); ///Periodos recolectados (sin calcular)
    periodos = JSON.parse(periodos);
    periodos = periodos[0];

    if(obInversor == null){
        inversor = sessionStorage.getItem("__ssInversorSeleccionadoMT");
    }
    else{
        inversor = obInversor
    }

    let objPropuesta = { panel: panel, inversor: inversor, periodos: periodos };

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/calcularVT',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'), 
                "propuesta": objPropuesta,
                "direccionCliente": direccion,
                "tarifa": tarifaMT
            },
            dataType: 'json',
            success: function(resultViaticos){
                sessionStorage.setItem('propuestaMT',JSON.stringify(resultViaticos));
                resolve(resultViaticos);
            },
            error: function(error){
                reject('Se produjo un error al intentar calcular viaticos: '+error);
            }
        });
    });
}

/*#endregion*/

/*#region Data*/
function agregarPeriodo(){
    var periodo = {};

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
    tarifaMT = botonTarifa.id == "btnTarifGDMTH" ? "GDMTH" : "GDMTO";
    tarifaOff = tarifaMT == "GDMTH" ? "GDMTO" : "GDMTH";
    $('#div'+tarifaOff).hide();
    $('#div'+tarifaMT).show();
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
    var ddlPaneles = $('#listPaneles');

    $('#listPaneles').change(async function(){
        var ddlPanelesValue = parseInt(ddlPaneles.val());
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
            sessionStorage.setItem('__ssPanelSeleccionadoMT',JSON.stringify(_paneles[ddlPanelesValue].panel));
    
            //Se carga dropDownList -Inversores-
            let _inversores = await obtenerInversoresParaPanelSeleccionado(_paneles[ddlPanelesValue]);
            _inversores = _inversores.message;
            sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));
            
            ///EXPERIMENTAL
            mostrarInversorSelected(); //MARCA
            mostrarInversorModeloSelected(); //MODELO

            vaciarRespuestaInversores(_inversores); //:void() = Se pintan las marcas de los inversores
            let objInversorCB = getInversorCostoBeneficio(0); //Se obtiene la mejor opcion 'Costo-Beneficio'
            
            //Se selecciona MARCA en el dropDownListInversoresMarca
            $('#listInversores option[value="'+objInversorCB.vMarca+'"]').attr("selected", true);
            
            vaciarModelosInversores(); //:void() = Se pitan los modelos de la marca seleccionada

            //Se selecciona MODELO en el dropDownListInversoresModelos
            $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);
            let _viaticos = await calcularViaticosMT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void() =
            ///EXPERIMENTAL
        }
    });
}

function mostrarInversorSelected(){
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
            let _viaticos = await calcularViaticosMT(objInversorCB);
            mostrarRespuestaViaticos(_viaticos); //:void() =
        }
    });
}

function mostrarInversorModeloSelected(){
    let ddlModelosInversor = $('#listModelosInversor');
    
    ddlModelosInversor.on('change', async function(){
        let valueListModlsInv = ddlModelosInversor.val(); //Nombre - Modelo de inversor
        let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
        
        limpiarResultados(1);

        if(valueListModlsInv != '-1' || valueListModlsInv != -1){
            let inversorFiltrado = searchInversor(_inversors,valueListModlsInv);
            let _viatico = await calcularViaticosMT(inversorFiltrado);
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
    var respuesta = '';
    $(".inpGDMTH").each(function(){
        respuesta = $(this).val() === "" ? false : true;
    });

    if(respuesta === false){
        alert('Favor de llenar todos los inputs!!')
        return respuesta;
    }
    
    return respuesta;
}

function validarClienteCargado(){
    var idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    var direccionCliente = $('#municipio').val();

    if(idCliente != "" && direccionCliente != ""){
        objResult = { id: idCliente, direccion: direccionCliente };
        return objResult;
    }
    else{
        alert('Falta cargar un cliente!!');
        return false;
    }
}

function validarPeriodosVacios(){
    if(_periodos.length === 0){
        alert('Periodos insuficientes para calcular');
        return false;
    }
    else{
        return true;
    }
}
/*#endregion*/