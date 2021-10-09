/*#section Panel*/
function editarPanel(idPanel){
    return new Promise((resolve, reject) => {
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

function getAllMicroInversores(vTipoInversor){ //Obtener todos los microInversores
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "PUT",
            url: "/get-micros",
            dataType: "json",
            data: { vTipoInversor: vTipoInversor },
            success: function(microinversores){
                if(microinversores.status === 200){
                    resolve(microinversores.message);
                }
                else{
                    reject('Al parecer surgio un error al consultar info. del Panel seleccionado');
                }
            },
            error: function(error){
                console.log(error);
                reject(error);
            }
        });
    });
}
/*#endsection*/
/*#section Inversor*/
async function selectTipoInversor(){
    let tipoInversorSeleccionado = $('#ddlTipoInversor').val();

    if(tipoInversorSeleccionado != "-1"){
        if(tipoInversorSeleccionado === 'Inversor' || tipoInversorSeleccionado === 'MicroInversor'){
            stateRegistroEquInversores(0);
            $('#btnGuardarInversor').show();
        }
        else{ //Combinaciones Micros
            stateRegistroEquInversores(1);
        }

        switch(tipoInversorSeleccionado)
        {
            case 'Inversor':
                $('#contenedorPaneleSoportados').hide();
            break;
            case 'MicroInversor':
                $('#contenedorPaneleSoportados').show();
            break;
            case 'Combinacion': ///Combinaciones de -MicroInversores-
                //Se llenan ambos ddl Equipos -Micros-
                await llenarDDLEMicros(); //:void()
            break;
            default: 
                -1;
            break;
        }
    }
    else{
        $('#contenedorPaneleSoportados').css('display','none');
        $('#btnGuardarInversor').hide();
        stateRegistroEquInversores(0);
    }
}

function selectEquipo1o2(optionValue){
    if(optionValue.value != -1){
        $('#btnGuardarInversor').show();
    }
    else{
        $('#btnGuardarInversor').hide();
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

function stateRegistroEquInversores(state){
    if(state === 0){ //Inversores && Micros
        $('.equipoNormal').show();
        $('.equipoCombin').hide();
    }
    else{ //Combinaciones de micros
        $('.equipoNormal').hide();
        $('.equipoCombin').show();
    }
}

async function llenarDDLEMicros(){
    let ddlNames = ['ddlMicroInv1','ddlMicroInv2'];

    let _micros = await getAllMicroInversores('MicroInversor');

    for(let ddlName of ddlNames){
        //
        limpiarDDLEquiTipo(ddlName);

        $.each(_micros, (index, micro) => {
            $('#'+ddlName).append(
                $('<option/>', {
                    value: micro.vNombreMaterialFot,
                    text: micro.vNombreMaterialFot
                })
            );
        });
    }
}

function limpiarDDLEquiTipo(ddl){
    $('#'+ ddl + ' option').each(function(option){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
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