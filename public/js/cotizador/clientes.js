/*#region Cliente*/
async function buscarCoincidenciaCliente(evento){
    let keyCode = evento.keyCode || evento;

    if(keyCode === 13 || keyCode.onclick){ ///Validar que la tecla -Enter- se haya presionado
        //Cliente a buscar
        let textoBusqueda = $('#inpBuscarCliente').val();
        textoBusqueda = textoBusqueda.trim();

        //Validar que el campo este lleno
        if(textoBusqueda.length > 0){
            let clienteResult = await buscarClientePorNombre(textoBusqueda);
            
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
        else{
            alert('Campo de -busqueda de cliente- VACIO!! Favor de rellenarlo');
        }
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

function pintarClienteDetails(Clientee){
    let Cliente = Clientee[0]; //Formating

    //Cliente - info
    $('#inpDetailsClienteNombre').val(Cliente.vNombrePersona);
    $('#inpDetailsCliente1erAp').val(Cliente.vPrimerApellido);
    $('#inpDetailsCliente2doAp').val(Cliente.vSegundoApellido);
    $('#inpDetailsClienteTel').val(Cliente.vTelefono);
    $('#inpDetailsClienteCel').val(Cliente.vCelular);
    //Direccion - info
    $('#inpDetailsClienteCP').val(Cliente.cCodigoPostal);
    $('#inpDetailsClienteCalle').val(Cliente.vCalle);
    $('#inpDetailsClienteMunic').val(Cliente.vMunicipio);
    $('#inpDetailsClienteCiud').val(Cliente.vCiudad);
    $('#inpDetailsClienteEstado').val(Cliente.vEstado);
}
/*#region Logica - Botones*/
async function mostrarClienteDetails(idCliente){

    let Cliente = await buscarClientePorId(idCliente);
    pintarClienteDetails(Cliente); //:void()

    let _propuestas = await getPropuestasByCliente(idCliente);
    pintarPropuestas(_propuestas);
}

function editarClienteDetails(state){
    switch(state)
    {
        case 0: //Editar
            //Ocultar boton de -editar-
            $('#editClienteDetails').css("display","none");
            //Mostrar conjunto de botones
            $('#grBttnsDetails').css("display","");
            //Habilitar todos los campos
            $('.inpDetailsCliente').attr("disabled",false);
        break;
        case 1: //Actualizar (guardar cambios - actualizar registro[details])

        break;
        case 2: //Cancel
            //Mostrar boton de -editar-
            $('#editClienteDetails').css("display","");
            //Ocultar conjunto de botones
            $('#grBttnsDetails').css("display","none");
            //Deshabilitar todos los campos
            $('.inpDetailsCliente').attr("disabled",true);
        break;
        case 3: //Click into -Cliente-
            //Mostrar boton de -editar-
            $('#editClienteDetails').css("display","");
        break;
        default: //Click into -Propuestas-
            //Ocultar boton de -editar-
            $('#editClienteDetails').css("display","none");
            //Deshabilitar todos los campos
            $('.inpDetailsCliente').attr("disabled",true);
        break;
    }
}

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

/*#region Server*/
function buscarClientePorId(idClientee){
    return new Promise((resolve,reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: '/consultarClientePorId',
            data: { id: idClientee },
            dataType: 'json',
            success: function(clienteEncontrado){
                resolve(clienteEncontrado.message);
            },
            error: function(error){
                console.log(error);
                reject('Se ha generado un error al intentar buscar al cliente por su Id');
            }
        });
    });
}

function buscarClientePorNombre(cliente){
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
                reject('Se ha generado un error al intentar buscar al cliente por su nombre');
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
/*#endregion*/
/*#endregion*/
/*#endregion*/
/*#region Propuestas*/
/*#region Funcionalidad */
function limpiarTablaPropuestas(){
    $('#tblPropuestas > tbody').html("");
}
/*#endregion*/
/*#region Server*/
function getPropuestasByCliente(idCliente){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: '/propuestasByClient',
            data: { idCliente: idCliente },
            dataType: 'json',
            success: function(propuestas){
                //Formating
                resolve(propuestas.message); 
            },
            error: function(error){
                console.log(error);
                reject('Al parecer hubo un error al intentar consultar las propuestas');
            }
        });
    });
}
/*#endregion*/
/*#region Logica - Botones*/
/*------Modales_Propuestas------*/
function openModalDetailsPropuesta(){
    $('.bd-example-modal-lg').modal('hide');
    $('.cd-example-modal-lg').modal('show');
}

function closeModalDetailsPropuesta(){
    $('.bd-example-modal-lg').modal('show');
    $('.cd-example-modal-lg').modal('hide');
}

function pintarPropuestas(_propuestas){
    let tblBodyPropuestas = $('#tblPropuestas > tbody');
    
    //Limpiar tabla - Propuestas
    limpiarTablaPropuestas();

    //Validar que tenga propuestas
    if(_propuestas.length > 0){
        $.each(_propuestas,(index, propuesta)=>{
            tblBodyPropuestas.append(`
                <tr class="trDataPropuesta">
                    <td id="tdTipoPropuesta">`+propuesta.cTipoCotizacion+`</td>
                    <td id="tdFechaCreacion">`+propuesta.created_at+`</td>
                    <td id="tdFechaExpiracion">`+propuesta.expired_at+`</td>
                    <td id="tdAcciones">
                        <div class="btn-group" role="group">
                            <a href="/detallesPropuesta/`+propuesta.idPropuesta+`" type="button" class="btn btn-sm btn-secondary btnVisualizarInfPropuesta" title="Visualizar detalles de propuesta">
                                <img src="https://img.icons8.com/ios-glyphs/14/000000/visible--v2.png"/>
                            </a>
                            <a href="/eliminarPropuesta/`+propuesta.idPropuesta+`" type="button" class="btn btn-sm btn-danger btnEliminarPropuesta" title="Eliminar propuesta">
                                <img src="https://img.icons8.com/ios-filled/14/000000/delete--v2.png"/>
                            </a>
                        </div>
                    </td>
                </tr>
            `);
        });
    }
    else{
        tblBodyPropuestas.append(`
            <tr>
                <td colspan="4">
                    <h1><strong>El cliente no cuenta con propuestas guardadas ! ! !</strong></h1>
                </td>
            </tr>
        `);
    }
}
/*#endregion*/
/*#endregion*/
