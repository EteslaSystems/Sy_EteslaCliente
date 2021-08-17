/*
- @description: 		Archivo correspondiente a las funciones de los controles de la cotizacion_individual.
- @author: 				LH420
- @date: 				19/05/2020
*/

var idPanel;
var idInversor;
var direccionCliente = '';

$(document).ready(function(){
    var loader = $('#loader');

    /* readyLoader(loader); */
});

/* function readyLoader(loader){
    $(document)
    .ajaxStart(function(){
        loader.fadeIn();
    })
    .ajaxStop(function(){
        loader.fadeOut();
        $('#divResultCotIndv').css("display","");
    });
} 

function loadMenuAddItem(){    
    document.getElementById("menuContent").classList.toggle("menu-active");
}
*/


/*#region Server*/
function getCotizacionIndividual(dataCotInd){
    sessionStorage.removeItem("tarifaMT");
    sessionStorage.setItem("tarifaMT", "individual");

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/enviarCotizIndiv',
            data: { dataCotInd: dataCotInd },
            dataType: 'json',
            success: function(cotizacionIndividual){
                if(cotizacionIndividual.status == 200){
                    cotizacionIndividual = cotizacionIndividual.message;

                    //Activar botones de -guardar- y -generar
                    $('#generarPDF').prop('disabled',false);
                    $('#guardarPropuesta').prop('disabled',false);

                    resolve(cotizacionIndividual);
                }
                else{
                    reject('Error! Status Server 500!')
                    console.log(cotizacionIndividual);
                }
            },
            error: function(error){
                reject(error);
            }
        });
    });
}
/*#endregion*/

/*#region Logica Botones*/
async function calcularCotizacionIndividual(){ //:Main()
    try{
        let dataCotizacionIndividual = catchDataCotizacionIndividual();
        let CotizacionIndividual = await getCotizacionIndividual(dataCotizacionIndividual);
        pintarResultadoCotizacion(CotizacionIndividual); //:void
    }
    catch(error){
        alert(error);
    }
}

function activarInputsDDL(listDesplegable){ //Activa los campos debajo de los DropDownList (paneles, inversores, estructuras)
    let dropDownListId = listDesplegable.id;
    let inputDropDownListId = '';

    switch(dropDownListId)
    {
        case 'optPaneles':
            inputDropDownListId = 'inpCantPaneles';
        break;
        case 'optInversores':
            inputDropDownListId = 'inpCantInversores';
        break;
        case 'optEstructuras':
            inputDropDownListId = 'inpCantEstructuras';
        break;
        default:
            -1;
        break;
    }

    if(listDesplegable.value != '-1' || listDesplegable.value != -1){
        $('#'+inputDropDownListId).prop('disabled', false);
    }
    else{
        limpiarInput(inputDropDownListId);
        $('#'+inputDropDownListId).prop('disabled', true);
    }
}

function cambiaValorCheckBox(checkBox){
    let checkBoxValue = checkBox.value;
    checkBoxValue = checkBoxValue == 1 ? 0 : 1;

    //Se cambia el valor del checkBox clickeado
    checkBox.value = checkBoxValue;

    //Se valida si el checkBox clickeado es el de viaticos
    if(checkBox.id == 'chbViaticos'){
        let _chbComponentesViaticos = ["chbPasaje","chbHospedaje","chbComida"];

        if(checkBoxValue == 0){
            //Se deseleccionan todos los checkbox -componentes- de *Viaticos*
            $.each(_chbComponentesViaticos, function(i, nombreChbox){
                $('#'+nombreChbox).prop('checked', false);
                $('#'+nombreChbox).prop('disabled', true);
            });
        }
        else{
            $.each(_chbComponentesViaticos, function(i, nombreChbox){
                $('#'+nombreChbox).prop('checked', true);
                $('#'+nombreChbox).prop('disabled', false);
            });
        }
    }
}

function limpiarInput(nombreInput){
    if(nombreInput.length > 0){
        $('#'+nombreInput).val('');
    }
    else{
        $('.inputResult').val('');
    }
}
/*#endregion*/


/*#region Funcionalidad*/
function catchDataCotizacionIndividual(){
    let dataCotIndividual = { cliente: { id: null, direccion: null }, complementos: { manoObra: null, otros: null, viaticos: {  }, fletes: null }, agregados: null, equipos: null };
    dataCotIndividual.cliente.id = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    dataCotIndividual.cliente.direccion = document.getElementById('municipio').value;

    /*Cliente*/
    if(validarUsuarioCargado(dataCotIndividual.cliente.id) == true){
        /*Equipos*/
        if(validarInputsEquipos() === true){
            /*Equipos (paneles, inversores, estructuras)*/
            dataCotIndividual.equipos = catchDataEquipos();

            /*Complementos [ManoObra, Otros, Viaticos, Fletes]*/
            dataCotIndividual.complementos.manoObra = $('#chbMO').val();
            dataCotIndividual.complementos.otros = $('#chbOtros').val();
            dataCotIndividual.complementos.viaticos = {
                /* Viaticos - Complementos */
                viaticos: $('#chbViaticos').val(),
                hospedaje: $('#chbHospedaje').val(),
                pasaje: $('#chbPasaje').val(),
                comida: $('#chbComida').val()
            };
            dataCotIndividual.complementos.fletes = $('#chbFletes').val();

            /*Agregados*/
            _agregado = _agregado; ///Arreglo de objAgregados (var - global)*
            _agregado = _agregado == null || _agregado.length == 0 ? null : _agregado;///Comprobacion de que no venga vacio
            dataCotIndividual.agregados = _agregado;

            return dataCotIndividual;
        }
    }

    //return false;
}

function pintarResultadoCotizacion(cotizacionResult){

}

function catchDataEquipos(){
    let equipos = { paneles: null, inversores: null, estructuras: null };

    if($('#optPaneles').val() != '-1' || $('#optPaneles').val() != -1){
        equipos.paneles = {
            modelo: $('#optPaneles').val(),
            cantidad: $('#inpCantPaneles').val()
        };
    }
    
    if($('#optInversores').val() != '-1' || $('#optInversores').val() != -1){
        equipos.inversores = {
            modelo: $('#optInversores').val(),
            cantidad: $('#inpCantInversores').val()
        };
    }
    
    if($('#optEstructuras').val() != '-1' || $('#optEstructuras').val() != -1){
        equipos.estructuras = {
            modelo: $('#optEstructuras').val(),
            cantidad: $('#inpCantEstructuras').val()
        };
    }

    return equipos;
}
/*#endregion*/

/*#region Validaciones*/
function validarUsuarioCargado(direccion_Cliente){
    if(direccion_Cliente){
        return true;
    }
    else{
        throw "Falto cargar un cliente";
    }
}

function validarInputsEquipos(){ //Valida solo los inputs vacios de los *dropDownList que fueron ocupados*
    let _listasDesplegables = ['optPaneles','optInversores','optEstructuras']
    let inputDropDownListId = '', valorInput = '';

    //Iteras coleccion de dropDownList
    $.each(_listasDesplegables, function(i, nombreDDL){
        //Se valida que el dropDownList haya sido usado
        if($('#'+nombreDDL).val() != '-1'){
            //Se identifica el -input- del dropDownList ocupado
            switch(nombreDDL)
            {
                case 'optPaneles':
                    inputDropDownListId = 'inpCantPaneles';
                break;
                case 'optInversores':
                    inputDropDownListId = 'inpCantInversores';
                break;
                case 'optEstructuras':
                    inputDropDownListId = 'inpCantEstructuras';
                break;
                default:
                    -1;
                break;
            }

            //Se valida que dicho -input- NO ESTE VACIO
            valorInput = $('#'+inputDropDownListId).val();

            if(valorInput.length < 1){
                throw 'Input '+inputDropDownListId+', se encuentra vacio.\nFavor de llenarlo o inhabilitar la lista desplegable correspondiente';
            }
            else if(valorInput === 0){
                throw 'El valor del Input '+inputDropDownListId+', no puede ser 0.\nFavor de ingresar un valor mayor a 0';
            }
        }
        else if(i === 2 && valorInput === ""){ //En caso de que todas las listas desplegables esten inhabilitadas
            throw 'No se a seleccionado ningun equipo';
        }
    });

    return true;
}
/*#endregion*/







