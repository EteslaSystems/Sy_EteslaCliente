/*#region Logica*/

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

/* Generar - PDF */
/*#region Botones*/
function visualizandoPDF(){
    let respuesta = JSON.parse(sessionStorage.getItem("respuestaPDF"));

    let nombreArchivoPDF = respuesta.fileName;
    let pdfBase64 = respuesta.pdfBase64; //Se obtiene el base64 decodificado

    //Mostrar el pdfBase64 en un iFrame (ventana navegador nueva)
    let pdfWindow = window.open("");
    pdfWindow.document.write("<html<head><title>"+nombreArchivoPDF+"</title><style>body{margin: 0px;}iframe{border-width: 0px;}</style></head>");
    pdfWindow.document.write("<body><embed width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(pdfBase64)+"#toolbar=0&navpanes=0&scrollbar=0'></embed></body></html>");
    
    sessionStorage.removeItem("respuestaPDF");
    $('#btnGenerarPdfFileViewer').prop("disabled", true);
}
/*#endregion*/
/*#region Solicitud-Servidor*/
function generarPDF(){
    let data = {};

    //Validar que tipo de cotizacion se esta tratando de generarPDF
    let tipoCotizacion = sessionStorage.getItem("tarifaMT");

    if(tipoCotizacion === 'GDMTO' || tipoCotizacion === 'GDMTH'){ ///MediaTension
        data = sessionStorage.getItem("propuestaMT");
    }
    else if(tipoCotizacion === 'null' || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        data = sessionStorage.getItem("answPropuesta");
    }
    else{ ///Individual
        data = sessionStorage.getItem('ssPropuestaIndividual');
    }
    
    data = JSON.parse(data);
    data = data[0];

    return new Promise((resolve, reject)=>{
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/PDFgenerate',
            data: data,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(pdfResponse, status){
                if(status === 'success'){ ///PDF generado con exito
                    let blobPDF = new Blob([pdfResponse],{type: "application/pdf"});

                    // IE doesn't allow using a blob object directly as link href
                    // instead it is necessary to use msSaveOrOpenBlob
                    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                        window.navigator.msSaveOrOpenBlob(blobPDF);
                        return;
                    } 

                    let link = document.createElement('a');

                    let fileName = getPDFFileName(data);

                    link.href = window.URL.createObjectURL(blobPDF);
                    link.download = fileName;
                    link.click();

                    //Only Firefox Browser
                    setTimeout(function(){
                        // For Firefox it is necessary to delay revoking the ObjectURL
                        window.URL.revokeObjectURL(data);
                    }, 100);
                }
                else{
                    alert('Se presento una falla a la hora de querer generar el PDF - Error 500!');
                }
            },
            error: function(error){
                console.log(error);
                alert('Se presento una falla a la hora de querer generar el PDF');
            }
        });
    });
}

function getPDFFileName(dataPropuesta){
    let nombreCliente = dataPropuesta.cliente.vNombrePersona + dataPropuesta.cliente.vPrimerApellido + dataPropuesta.cliente.vSegundoApellido;
    let tipoCotizacion = dataPropuesta.tipoCotizacion;
    let potencia = dataPropuesta.paneles.potenciaReal;

    return nombreCliente + '_' + tipoCotizacion + '_' + potencia + 'w' + '_' + Date.now() + '.pdf';
}

function guardarPropuesta(){
    let dataToSent = { idCliente: null, propuesta: null };
    dataToSent.idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    if(tarifaMT === "null" || typeof tarifaMT === 'undefined'){ //BajaTension
        dataToSent.propuesta = sessionStorage.getItem("answPropuesta");
    }
    else if(tarifaMT == "individual"){ //Individual
        dataToSent.propuesta = sessionStorage.getItem("ssPropuestaIndividual");
    }
    else{ //Mediatension
        dataToSent.propuesta = sessionStorage.getItem("propuestaMT");
    }

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/GuardarPropuesta',
            dataType: 'json',
            data: dataToSent,
            success: function(respuesta){
                if(resolve.status == "200" || resolve.status == 200){
                    alert('Propuesta guardada con exito');
                    $("#btnGuardarPropuesta").prop("disabled", true);
                }
                else{
                    console.log('Ah ocurrido un problema al intentar guardar la propuesta:\n'+respuesta.message.toString());
                    alert('Ah ocurrido un problema al intentar guardar la propuesta');
                }
            },
            error: function(error){
                alert('Hubo un error al intentar guardar la propuesta: '+error.message);
            }
        });
    });
}
/*#endregion*/
/*#region Graficos*/
function pintarGrafico(){
    var grafico = document.getElementById('crtGraficos').getContext('2d');
    var configChart = {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } }
        }
    };

    window.grafico = new Chart(grafico, configChart);
}
/*#endregion*/