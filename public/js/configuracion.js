/* 
    Validar que al menos los campos "Material" y  "Cantidad" no esten vacios.
    Para asi poder activar el botón de "+"
*/      
var contadorValidador = 0;
var arrayConfiguracion = [];

function agregarItem(){
    //var idItem;
    reglasAntesDeAgregarItem();
    /*Se obtiene los valores de los campos de la vista*/
    var material = document.getElementById('inpMaterial').value;
    var cantidad = document.getElementById('inpCantidad').value;
    var marca = document.getElementById('inpMarca').value;
    var caracteristicas = document.getElementById('inpCaracteristicas').value;

    var objConfiguracion = {
        /*Se define objeto y sus propiedades*/
        //idItemConf: idItem,
        materialConf: material,
        cantidadConf: cantidad,
        marcaConf: marca,
        caracteristicaConf: caracteristicas
    };
    //idItem = idItem + 1;

    /*Se agrega objeto seteado al array*/
    arrayConfiguracion.push(/*idItem,*/objConfiguracion);

    /*Mostrar el contenido del array en la tabla de la vista*/

    limpiarCampos();
    /*document.getElementById('btnAgregarItem').disabled = true; 
    -
    Volver a bloquear el boton de "+ - Agregar item"

    WARNING: CUANDO SE VUELVE A BLOQUEAR EL BOTON,
             NO SE PUEDE VOLVER A DESBLOQUEAR, CUANDO SE INTENTA
             LLENAR DE NUEVO EL FORMULARIO.
             ***HACER UN EVENTO QUE SIEMPRE ESTE A LA ESCUCHA PARA DESBLOQUEAR EL CONTROL***
    */
}

function mostrarItems(){
    if(arrayConfiguracion.length > 0){
        /*for(const i = 1; i <= arrayConfiguracion.length; i++) {
            
        }*/
        console.log(Object.values(arrayConfiguracion));
    }else{
        alert('Array vacio');
    }
}

function reglasAntesDeAgregarItem(){
    /* Comprueba si el botón de "Guardar" esta oculto */
    if ($('#btnGuardarConfiguracion').is(':hidden')){
        /* Si esta oculto lo pone visible */
        document.getElementById('btnGuardarConfiguracion').style.display = '';
    }
}

function validarCamposObligatoriosVacios(){
    inpMaterial = document.getElementById('inpMaterial');
    inpCantidad = document.getElementById('inpCantidad');

    contadorValidador = contadorValidador + 1;

    if(contadorValidador == 2){
        document.getElementById('btnAgregarItem').disabled = false;
    }
}

function limpiarCampos(){
    $('input[type="text"]').val('');
    $('input[type="number"]').val('');
}