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

function pintarCliente(Cliente){
    $('#inpClienteId').val(Cliente.idCliente); //hidden
    $('#inpClienteNombre').val(Cliente.vNombrePersona);
    $('#inpClientePrimerAp').val(Cliente.vPrimerApellido);
    $('#inpClienteSegundoAp').val(Cliente.vSegundoApellido);
    $('#inpClienteTelefono').val(Cliente.vTelefono);
    $('#inpClienteCelular').val(Cliente.vCelular);
    $('#inpClienteMail').val(Cliente.vEmail);
    $('#inpCP').val(Cliente.cCodigoPostal);
    $('#inpClienteCalle').val(Cliente.vCalle);
    $('#inpClienteMunicipio').val(Cliente.vMunicipio);
    $('#inpClienteCiudad').val(Cliente.vCiudad);
    $('#inpClienteEstado').val(Cliente.vEstado);
}

function seleccionarCliente(optionSelected){
    let optionValue = optionSelected.value;
    let idDDL = optionSelected.id;
    
    if(optionValue != -1){
        //Obtener el sessionStorage de las coincidenciasClientes
        let _coincidenciasClientes = JSON.parse(sessionStorage.getItem('coincidenciaClientes'));
        
        //Concidencias Filtradas para pintar el cliente que se selecciono
        _coincidenciasClientes = _coincidenciasClientes.find(cliente => (cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido) === optionValue);

        /* Pintar / Cargar el cliente en los inputs */
        pintarCliente(_coincidenciasClientes);

        //
        $('#'+idDDL).css("display","none");
        $('#inpBuscarCliente').val('');
    }
}

function llenarDDLCoincidenciasClientes(_clientes){
    $.each(_clientes, function(index,cliente){
        $('#ddlCoincidenciasCliente').append(
            $('<option/>', {
                value: cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido,
                text: cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido
            })
        );
    });
}

function logicaFormularioCliente(estado){
    //Limpiar todos los campos
    $('.datosCliente').val('');

    switch(estado)
    {
        case 0: //[ Nuevo Cliente ]
            $('#btnAgregarCliente').prop("disabled",true);
            $('#searchCP').prop("disabled",false);
            $('.datosCliente').prop("readonly",false);
            $('.form-group-buttons').css("display",'');
        break;
        case 1: //[ Cancelar ]
            $('.form-group-buttons').css("display",'none');
            $('.datosCliente').prop("readonly",true);
            $('#btnAgregarCliente').prop("disabled",false);
            $('#searchCP').prop("disabled",true);
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
                //Guardar coincidencias en un sessionStorage
                sessionStorage.removeItem('coincidenciaClientes');
                sessionStorage.setItem('coincidenciaClientes',JSON.stringify(clientResult.message));

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
    let key = '20210930-4417258e230cddfe';
    let uri = 'https://apis.forcsec.com/api/codigos-postales/'+key+'/'+codigoPostal;

    if(codigoPostal.length >= 5){
        //Se activa el inpClienteMunicipio
        $('#inpClienteMunicipio').prop("disabled",false);
            
        $.ajax({
            type: 'GET',
            url: uri,
            success: function(coincidenciasCP){
                console.log(coincidenciasCP);
                //Validar si la coleccion -coincidenciasCP- *no viene vacia* o *no hubo error*
                if(coincidenciasCP.estatus === "si"){
                    //Se muestra la ddlMunicipio & ddlCiudad
                    estadoBusqueda(0);

                    //Se llenan los inputs de Ciudad && Estado
                    $('#inpClienteCiudad').val(coincidenciasCP.data.asentamientos[0].ciudad);
                    $('#inpClienteEstado').val(coincidenciasCP.data.estado);

                    //Se llena el ddlMuncipio
                    llenarDDLEntidad('ddlMunicipio', coincidenciasCP.data.asentamientos, 'asentamiento');
                }
            },
            error: function(error){
                console.log(error);
                alert('Se ha generado un error al intentar consultar el C.P. del Cliente');
            }
        });
    }
    else{
        alert('Formato de C.P. invalido o vacio');
    } 
}
/* #endregion */

/* #region Logica - Controls */
function llenarDDLEntidad(ddlEntidad, Entidades, propiedad){
    //Limpiar ListaDesplegable
    limpiarDDLEntidad(ddlEntidad);

    //Llenar ListaDesplegable
    for(let entidad of Entidades){
        $('#'+ddlEntidad).append(
            $('<option/>', {
                value: entidad.nombre,
                text: entidad.nombre
            })
        );
    }
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