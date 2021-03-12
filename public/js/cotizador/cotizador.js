/*#region Logica*/
/* Generar - PDF */
async function generarEntregable(){
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let _consummo = null;
    let data = {};
    let tipoCotizacion = '';
    
    if(tarifaMT === null || typeof tarifaMT === 'undefined'){ //Cotizacion BajaTension
        tipoCotizacion = "bajaTension";
        
        if($('#salvarCombinacion').prop('checked')){///Combinaciones
            let combSeleccionada = $('#listConvinaciones').val();
            let dataCombinaciones = sessionStorage.getItem("arrayCombinaciones");
    
            data = {
                idCliente: idCliente,
                dataCombinaciones: dataCombinaciones,
                combSeleccionada: combSeleccionada,
                tipoPropuesta: tipoCotizacion,
                combinacionesPropuesta: true
            };
        }   
        else{///Equipo seleccionado
            let valListInvers = $('#listInversores').val();
    
            //Se valida que la dropDownListInversores no este vacia
            if(valListInvers != -1){
                let ssObjPropuestaEquipoSeleccionado = sessionStorage.getItem("answPropuesta");
                _consummo = sessionStorage.getItem("_consumsFormated");
    
                data = {
                    idCliente: idCliente,
                    consumos: _consummo,
                    propuesta: ssObjPropuestaEquipoSeleccionado,
                    tipoPropuesta: tipoCotizacion,
                    combinacionesPropuesta: false
                };
            }
        }
    }
    else{ //Cotizacion MediaTension
        let ssObjPropuestaMT = sessionStorage.getItem("propuestaMT");
        _consummo = sessionStorage.getItem("_consumsFormated");

        data = {
            idCliente: idCliente,
            consumos: _consummo,
            propuesta: ssObjPropuestaMT,
            tipoPropuesta: "mediaTension",
            combinacionesPropuesta: false
        }
    }

    pdfBase64 = await generarPDF(data);
    nombreArchivoPDF = pdfBase64.fileName;
    pdfBase64 = pdfBase64.pdfBase64; //Se obtiene el base64 decodificado

    //Se activan los botones que generan el //QR || PDF//
    // $('#btnGenerarQrCode').prop("disabled",false);

    $('#btnGenerarPdfFileViewer').prop("disabled",false);
    $('#btnGenerarPdfFileViewer').on('click',function(){
        console.log('Generando pdf. . .');
        //Mostrar el pdfBase64 en un iFrame (ventana navegador nueva)
        let pdfWindow = window.open("");
        pdfWindow.document.write(
            "<iframe id='iframePDF' width='100%' height='100%' src='data:application/pdf;base64, " +encodeURI(pdfBase64)+ "' frameborder='0'></iframe>"
        );
    });
}
/*                  Agregados_CRUD                  */
var _agregado = [];

function addAgregado(element){
    let nombreAgregado = $('#inpAgregado').val();
    let cantidadAgregado = $('#inpCantidadAg').val();
    let precioAgregado = $('#inpPrecioAg').val();
    let contadorDeAgregados = parseInt(element.value);
    let objAgregado = {};

    if(validarInputsVaciosAg(nombreAgregado) == true && validarInputsVaciosAg(cantidadAgregado) == true && validarInputsVaciosAg(precioAgregado) == true){
        objAgregado = {
            nombreAgregado: nombreAgregado, 
            cantidadAgregado: cantidadAgregado, 
            precioAgregado: precioAgregado
        };
    
        //Guardo de 'Agregado' en Array
        _agregado.push(objAgregado);
    
        //Pintar 'Agregado' en tabla
        let tableBody = $('#tblAgregados > tbody');
        tableBody.append('<tr><td id="tdContAg'+contadorDeAgregados+'">'+(contadorDeAgregados+1)+'</td><td>'+_agregado[contadorDeAgregados].nombreAgregado+'</td><td>'+_agregado[contadorDeAgregados].cantidadAgregado+'</td><td>$'+_agregado[contadorDeAgregados].precioAgregado+'</td><td><button id="'+contadorDeAgregados+'" class="btn btn-xs btn-danger deleteAg" title="Eliminar" onclick="eliminarAgregado(event);"><img src="https://img.icons8.com/android/12/000000/delete.png"/></button></td></tr>');
        
        contadorDeAgregados++;
        $('#'+element.id).val(contadorDeAgregados);
        limpiarInputsAgregado();
    }
}

function eliminarAgregado(event){
    //Se borra el *obj* logicamente del array
    let posicionAgregado = event.target.id;
    _agregado.splice(posicionAgregado, 1);
    
    //Se elimina visualmente de la tabla
    event.preventDefault();
    $(this).closest('tr').remove();

    contadorDeAgregados--;
}

//Validaciones y eventos - *Agregados*
function limpiarInputsAgregado(){
    $('.inpAg').val('');
    $('#inpCantidadAg').focus();
}

function validarInputsVaciosAg(val){
    let valor = val == undefined ? "" : val;    
    valor = valor.replace("&nbsp;", "");

    if (!valor || 0 === valor.trim().length){
        alert('Campos pertenecientes a *Agregado*, vacios. Favor de llenar!');
        return false;
    }
    else{
        return true;
    }
}
/*#endregion*/
/*#region Botones*/
async function btnsGenerarEntregablePropuesta(control){ ///Generar PDF - Guardar Propuesta
    let idButton = control.id;

    if(idButton === "btnGenerarEntregable"){ ///GENERAR PDF
        await generarEntregable(); //:void
    }
    else{ ///GUARDAR RESULTADOS DE PROPUESTA  
        guardarPropuesta();
    }
}
/*#endregion*/
/*#region Solicitud-Servidor*/
function generarPDF(data){
    return new Promise((resolve, reject)=>{
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/PDFgenerate',
            dataType: 'json',
            data: data,
            success: function(pdfBase64){
                pdfBase64 = pdfBase64.message; //Formating

                resolve(pdfBase64);
            },
            error: function(error){
                reject('Hubo un error al intentar generar el PDF: '+error);
            }
        });
    });
}

function guardarPropuesta(){
    let dataToSent = { idCliente: null, propuesta: null };
    dataToSent.idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');

    if(tarifaMT === null || typeof tarifaMT === 'undefined'){ //BajaTension
        dataToSent.propuesta = sessionStorage.getItem("answPropuesta");
    }
    else if(tarifaMT == "indifidual"){ //Individual
        dataToSent.propuesta = sessionStorage.getItem("ssPropuestaIndividual");
    }
    else{ //Mediatension
        dataToSent.propuesta = sessionStorage.getItem("propuestaMT");
    }

    new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/GuardarPropuesta',
            dataType: 'json',
            data: dataToSent,
            success: function(respuesta){
                console.log('respuesta guardar propuesta');
                console.log(respuesta);

                if(respuesta.status === '200' || respuesta.status === 200){
                    alert('Propuesta guardada con exito');
                    $("#btnGuardarPropuesta").prop("disabled", true);
                }
            },
            error: function(error){
                reject('Hubo un error al intentar generar el PDF: '+error);
            }
        });
    });
}
/*#endregion*/