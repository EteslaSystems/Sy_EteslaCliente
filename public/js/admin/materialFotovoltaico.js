/*#section Panel*/
function editarPanel(idPanel){
    new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "/",
            traditional: true,
            data: idPanel,
            succes: function(panelFiltrado){
                if(panelFiltrado.status === 200){

                }
                else{
                    alert('Al parecer surgio un error al consultar info. del Panel seleccionado');
                }
            }
        });
    });

    //Abrir modal
    $('#modalPanel').modal('show');
}
/*#endsection*/
/*#section Inversor*/
function selectTipoInversor(){
    let tipoInversorSeleccionado = $('#tipoInversor').val();

    if(tipoInversorSeleccionado != "-1"){
        if(tipoInversorSeleccionado === 'Inversor'){ ///Inversor central
            $('#contenedorPaneleSoportados').css('display','none');
        }
        else{ ///Microinversor
            $('#contenedorPaneleSoportados').css('display','');
        }

        $('#btnGuardarInversor').css('display','');
    }
    else{
        $('#contenedorPaneleSoportados').css('display','none');
        $('#btnGuardarInversor').css('display','none');
    }
}

function editarInversor(idInversor){
    new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "/",
            traditional: true,
            data: idInversor,
            succes: function(inversorFiltrado){
                if(inversorFiltrado.status === 200){

                }
                else{
                    alert('Al parecer surgio un error al consultar info. del Inversor seleccionado');
                }
            }
        });
    });



    //Abrir modal
    $('#modalInversor').modal('show');
}
/*#endsection*/
/*#section Estructura*/
async function editarEstructura(idEstructura){
    let estructuraFiltrada = await filtrarEstructura(idEstructura);

    //Abrir modal
    // $('#modalEstructura').modal('show');
}

function filtrarEstructura(idEstruct){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: "/editar-estructura",
            data: { idEstructura: idEstruct },
            succes: function(estructuraFiltrada){
                console.log(estructuraFiltrada);

                // if(estructuraFiltrada.status === 200){
                //     console.log(estructuraFiltrada);
                // }
                // else{
                //     alert('Al parecer surgio un error al consultar info. de la Estructura seleccionada');
                //     console.log(estructuraFiltrada.message);
                // }
            },
            error: function(error){
                alert('Al parecer surgio un error al consultar info. de la Estructura seleccionada');
                console.log(error.message);
            }
        });
    });
}
/*#endsection*/