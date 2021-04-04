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

                    for(let x=0; x<_propuestas.length; x++)
                    {
                        $('#tbPropuestas>tbody').append('<tr><td>'+_propuestas[x].cTipoCotizacion+'</td><td>'+_propuestas[x].created_at+'</td><td><button type="button" class="btn btn-sm btn-success" title="Detalles"><img src="https://img.icons8.com/ios/20/000000/details-pane.png"/></button><button type="button" class="btn btn-sm btn-warning" title="Editar"><img src="https://img.icons8.com/ios/20/000000/edit--v1.png"/></button><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><img src="https://img.icons8.com/ios/20/000000/delete-trash.png"/></button></td></tr>');
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