/*#region Cliente*/
function agregarCliente(){
    logicaFormularioCliente(0);

}

function pintarCliente(cliente){
    
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
            type: 'GET',
            url: '/',
            data: { idUsuario, cliente },
            dataType: 'json',
            success: function(cliente){
                if(propuestas.status === 200){
                    
                }
            },
            error: function(error){
                reject('Se ha generado un error al intentar buscar al cliente\n'+error);
            }
        });
    });
}
/* #endregion */