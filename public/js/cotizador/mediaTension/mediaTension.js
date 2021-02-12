var tarifaMT = '';
var _periodos = [];

/*#region Solicitudes Servidor*/
function calcularPropuestaMT(){
    //Validar que el cliente este cargado
    //Vaciar respuesta en AJAX
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
            //Crear propiedad del objeto y asignarle valor a la misma
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
    var iterador = option.value;
    var indexador = () => { 
        $('#lstPeriodosGDMTH option').each(function(){
            valueOption = parseInt($(this).text());
        })
        return valueOption; 
    };

    indexador = indexador();

    if(iterador != indexador){//Leer || Visualizar periodo
        crudState(3);
        //Se obtiene el nombre de las propiedades del objeto que se encuentra guardado en la posicion señalada dentro del array _periodos
        for(var key in _periodos[iterador-1])
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
            limpiarCampos();
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
    var indexador = () => { 
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

function limpiarCampos(){
    $('.inp'+tarifaMT).val('');
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
/*#endregion*/