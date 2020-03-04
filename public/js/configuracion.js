/* 
    Validar que al menos los campos "Material" y  "Cantidad" no esten vacios.
    Para asi poder activar el botón de "+"
*/      
var contadorValidador = 0;
var objConfiguracion = {};
var arrayConfiguracion = []; //Este va al server
var arrayConfigTable = []; //Este es el alimenta la tabla dinamica

function agregarItem(){
    //var idItem;
    /*Se obtiene los valores de los campos de la vista*/
    var material = document.getElementById('inpMaterial').value;
    var cantidad = document.getElementById('inpCantidad').value;
    var marca = document.getElementById('inpMarca').value;
    var caracteristicas = document.getElementById('inpCaracteristicas').value;

    objConfiguracion = {
        /*Se define objeto y sus propiedades*/
        //idItemConf: idItem,
        materialConf: material,
        cantidadConf: cantidad,
        marcaConf: marca,
        caracteristicaConf: caracteristicas
    };
    //idItem = idItem + 1;

    /*Se agrega objeto seteado a los arrays*/
    arrayConfigTable.push(objConfiguracion);
    arrayConfiguracion.push(/*idItem,*/objConfiguracion);
    
    reglasAntesDeAgregarItem();
    limpiarCampos();
    mostrarItems();
    document.getElementById('inpMaterial').focus();
    document.getElementById('btnAgregarItem').disabled = true; 
}

function mostrarItems(){
    /*Muestra contenido del array de objetos dentro de una tabla dinamica en la vista*/
    document.getElementById("tblConfigurationPrevious").insertRow(-1).innerHTML = 
            '<tr><td>'+arrayConfiguracion[0].materialConf/*+'</td>'+'<td>'+element.cantidadConf+'</td>'+'<td>'+element.marcaConf+'</td>'+'<td>'+element.caracteristicaConf+'</td>'+'<td>'+'<button id="btnEditRegisterConf" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>'+'</td>'+'<td>'+'<button id="btnDeletRegisterConf" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>'*/+'</td>'+'</tr>'; 
    //console.log(arrayConfiguracion);

    /*if(arrayConfiguracion.length > 0){
        arrayConfiguracion.forEach(element => {
            console.log(element.materialConf);
        });
        document.getElementById("tblConfigurationPrevious").insertRow(-1).innerHTML = 
            '<tr><td>'+arrayConfiguracion[objConfiguracion.materialConf]+'</td>'/*+'<td>'+element.cantidadConf+'</td>'+'<td>'+element.marcaConf+'</td>'+'<td>'+element.caracteristicaConf+'</td>'+'<td>'+'<button id="btnEditRegisterConf" class="btn btn-lg btn-warning" title="editar"><img src="https://img.icons8.com/material-outlined/18/000000/multi-edit.png"></button>'+'</td>'+'<td>'+'<button id="btnDeletRegisterConf" class="btn btn-lg btn-danger" title="eliminar"><img src="https://img.icons8.com/material-outlined/18/000000/delete-trash.png"></button>'+'</td>'+'</tr>'; 
            /*
                (1)Empujar el objeto con sus propiedades a un nuevo array, el cual sera mandado a la 
                peticion del server.
                (2)Mientras que a 'arrayConfiguracion' se limpia para darle lugar a los demas objConfiguracion
            
    }else{
        alert('Array vacio');
    }*/
}

function reglasAntesDeAgregarItem(){
    /* Comprueba si el botón de "Guardar" esta oculto */
    if ($('#btnGuardarConfiguracion').is(':hidden')){
        /* Si esta oculto lo pone visible */
        document.getElementById('btnGuardarConfiguracion').style.display = '';
    }
}

function validarCamposObligatoriosVacios(){
    /* Se validan los campos que son obligatorios para poder habilitar el boton de "+"*/
    inpMaterial = document.getElementById('inpMaterial');
    inpCantidad = document.getElementById('inpCantidad');

    contadorValidador = contadorValidador + 1;

    if(contadorValidador == 2){
        document.getElementById('btnAgregarItem').disabled = false;
        contadorValidador = 0;
    }
}

function limpiarCampos(){
    $('input[type="text"]').val('');
    $('input[type="number"]').val('');
}

function enviarDatosAlServer()
{
    console.log(arrayConfiguracion);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/enviarConfiguracion",
        traditional: true,
        data: {arrayConfiguracion}
    });
}