/*#region Cliente*/
async function buscarCoincidenciaCliente(){
    let textoBusqueda = $('#inpBuscarCliente').val(); //Cliente a buscar
    textoBusqueda = textoBusqueda.trim();

    let clienteResult = await buscarCliente(textoBusqueda);

    console.log(clienteResult);

    //Validar si hubo coincidencia con la -busquedaCliente-
    if(clienteResult.length > 0){
        //Limpiar ddlCoincidenciasClientes
        limpiarDDLEntidad('ddlCoincidenciasCliente');

        //Se llena ddlCoincidenciasClientes
        llenarDDLCoincidenciasClientes(clienteResult);
        
        //Se muestra ddlCoincidenciasClientes
        statusControlsBusqueda(0);
    }
    else{
        //Se muestra ddlCoincidenciasClientes
        statusControlsBusqueda(1);
    }
}

function pintarCliente(cliente){
    
}

function llenarDDLCoincidenciasClientes(_clientes){
    $.each(_clientes, function(index,cliente){
        $('#ddlCoincidenciasCliente').append(
            $('<option/>', {
                value: cliente.NombreCompleto,
                text: cliente.NombreCompleto
            })
        );
    });
}

function logicaFormularioCliente(estado){
    switch(estado)
    {
        case 0: //[ Nuevo Cliente ]
            $('#btnAgregarCliente').prop("disabled",true);
            $('.datosCliente').prop("readonly",false);
            $('.form-group-buttons').css("display",'');
        break;
        case 1: //[ Cancelar ]
            $('.form-group-buttons').css("display",'none');
            $('.datosCliente').prop("readonly",true);
            $('#btnAgregarCliente').prop("disabled",false);
        break;
        default:
            -1;
        break;
    }
}

function statusControlsBusqueda(opcion){
    switch(opcion)
    {
        case 0: //Con coincidencias
            //Se muestra la lista desplegable de -Coincidencias-
            $('#ddlCoincidenciasCliente').css("display","");
            //
            $('#txtNoHayCoincidencia').css("display","none");
        break;
        case 1: //Sin coincidencias
            //Se muestra el mensaje -Sin coincidencias-
            $('#txtNoHayCoincidencia').css("display","");
            //
            $('#ddlCoincidenciasCliente').css("display","none");
        break;
        default:
            -1;
        break;
    }
}
/*#endregion*/

/*#region Propuestas*/
function getDetailsPropuesta(){
    openModalDetailsPropuesta();
}

/*------Modales_Propuestas------*/
function openModalDetailsPropuesta(){
    $('.bd-example-modal-lg').modal('hide');
    $('.cd-example-modal-lg').modal('show');
}

function closeModalDetailsPropuesta(){
    $('.bd-example-modal-lg').modal('show');
    $('.cd-example-modal-lg').modal('hide');
}
/*#endregion*/

/* #region Server */
function getPropuestasByCliente(idCliente){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/propuestasByClient',
            data: { idCliente: idCliente },
            dataType: 'json',
            success: function(propuestas){
                if(propuestas.status === 200){
                    let _propuestas = propuestas.message;

                    //Se limpia la tabla
                    $(".filaPropuesta").remove();

                    //Se vacia la inform. en la tabla
                    for(let x=0; x<_propuestas.length; x++)
                    {
                        $('#tbPropuestas>tbody').append('<tr class="filaPropuesta"><td>'+_propuestas[x].cTipoCotizacion+'</td><td>'+_propuestas[x].created_at+'</td><td>'+_propuestas[x].expire_at+'</td><td><button type="button" class="btn btn-sm btn-success" title="Detalles" onclick="getDetailsPropuesta()"><img src="https://img.icons8.com/ios/20/000000/details-pane.png"/></button><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-trash.png"/></button></td></tr>');
                    }
                }
                else{
                    alert("Ha ocurrido un error al intentar consultar las propuestas!");
                }
            },
            error: function(){
                reject('Al parecer hubo un error al intentar consultar las propuestas');
            }
        });
    });
}

function buscarCliente(cliente){
    return new Promise((resolve,reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: '/buscarCliente',
            data: { nombre: cliente },
            dataType: 'json',
            success: function(clientResult){
                resolve(clientResult.message);
            },
            error: function(error){
                console.log(error);
                reject('Se ha generado un error al intentar buscar al cliente');
            }
        });
    });
}

function buscarCPInfo(){
    let codigoPostal = $('#inpCP').val();
    let token = 'e607b483-300d-43f2-aa43-79deee41b818';
    let uri = 'https://api.copomex.com/query/info_cp/'+codigoPostal+'?token='+token;

    //Se activa el inpClienteMunicipio
    $('#inpClienteMunicipio').prop("disabled",false);
    
    $.ajax({
        type: 'GET',
        url: uri,
        success: function(coincidenciasCP){
            console.log(coincidenciasCP);

            //Se muestra la ddlMunicipio & ddlCiudad
            estadoBusqueda(0);

            //Se llenan los inputs de Ciudad && Estado
            $('#inpClienteCiudad').val(coincidenciasCP[0].response.ciudad);
            $('#inpClienteEstado').val(coincidenciasCP[0].response.estado);

            //Se llena el ddlMuncipio
            llenarDDLEntidad('ddlMunicipio', coincidenciasCP, 'asentamiento');
        },
        error: function(error){
            console.log(error);
            alert('Se ha generado un error al intentar consultar el C.P. del Cliente');
        }
    });
}
/* #endregion */

/* #region Logica - Controls */
function llenarDDLEntidad(ddlEntidad, _entidades, propiedad){
    //Limpiar ListaDesplegable
    limpiarDDLEntidad(ddlEntidad);

    //Llenar ListaDesplegable
    $.each(_entidades, function(index,entidad){
        $('#'+ddlEntidad).append(
            $('<option/>', {
                value: entidad.response[propiedad],
                text: entidad.response[propiedad]
            })
        );
    });
}

function selectOptEntidad(selectControl){ // :onChange
    let optionValue = selectControl.value;

    //Se pinta en el input correspondiente
    $('#inpClienteMunicipio').val(optionValue);

    //Se bloquea el input correspondiente
    $('#inpClienteMunicipio').prop("disabled",true);

    //Status: Selected
    estadoBusqueda(1);
}

function limpiarDDLEntidad(ddlEntidad){
    $('#'+ddlEntidad+' option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function cambioEstado(nombreControl, propiedad, estado){ /* Busqueda / Seleccion de [ Municipio && Ciudad ] */
    let status = '';

    switch(estado)
    {
        case 0:
            status = true;
        break;
        case 1:
            status = false;
        break;
        default:
            status = status;
        break;
    }

    $('#'+nombreControl).prop(propiedad,status);
} 

function estadoBusqueda(estado){
    /* 0: Selection - 1: Selected */
    switch(estado)
    {
        case 0:
            //ListaDesplegables
            $('#ddlMunicipio').css("display","");
            //Inputs
            $('#inpClienteMunicipio').css("display","none");
        break;
        case 1:
            //ListaDesplegables
            $('#ddlMunicipio').css("display","none");
            //Inputs
            $('#inpClienteMunicipio').css("display","");
        break;
        default:
            -1;
        break;
    }
}
/* #endregion */