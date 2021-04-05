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

                    console.log(_propuestas);

                    //Se limpia la tabla
                    $(".filaPropuesta").remove();

                    //Se vacia la inform. en la tabla
                    for(let x=0; x<_propuestas.length; x++)
                    {
                        $('#tbPropuestas>tbody').append('<tr class="filaPropuesta"><td>'+_propuestas[x].cTipoCotizacion+'</td><td>'+_propuestas[x].created_at+'</td><td>'+_propuestas[x].expire_at+'</td><td><button type="button" class="btn btn-sm btn-success" title="Detalles"><img src="https://img.icons8.com/ios/20/000000/details-pane.png"/></button><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-trash.png"/></button></td></tr>');
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