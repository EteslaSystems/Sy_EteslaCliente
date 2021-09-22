$(document).on('ready',function(){
    sessionStorage.removeItem("_agregados");
    sessionStorage.removeItem("contadorAgregados");
});

/*#region Logica*/
/*                  Agregados_CRUD                  */
function addAgregado(){
    let _agregados = [];
    let Agregado = { nombreAgregado: null, cantidadAgregado: null, precioAgregado: null };
    let nombreAgregao = $('#inpAgregado').val();
    let cantidadAgregado = $('#inpCantidadAg').val();
    let precioAgregado = $('#inpPrecioAg').val();
    let contadorDeAgregados = 0;

    /* Contador - Agregados */
    contadorDeAgregados = sessionStorage["contadorAgregados"] ? parseInt(sessionStorage.getItem("contadorAgregados")) : contadorDeAgregados;

    if(validarInputsVaciosAg(nombreAgregao) == true && validarInputsVaciosAg(cantidadAgregado) == true && validarInputsVaciosAg(precioAgregado) == true){
        Agregado.nombreAgregado = nombreAgregao;
        Agregado.cantidadAgregado = cantidadAgregado;
        Agregado.precioAgregado = precioAgregado;

        //[]
        if(contadorDeAgregados === 0){
            _agregados[contadorDeAgregados] = Agregado;
        }
        else{
            _agregados = JSON.parse(sessionStorage.getItem("_agregados"))
            _agregados[contadorDeAgregados] = Agregado;
        }

        //Pintar 'Agregado' en tabla
        let tableBody = $('#tblAgregados > tbody');
        tableBody.append('<tr id="trContAg'+contadorDeAgregados+'"><td id="tdAgregado'+contadorDeAgregados+'">'+(contadorDeAgregados+1)+'</td><td>'+_agregados[contadorDeAgregados].nombreAgregado+'</td><td>'+_agregados[contadorDeAgregados].cantidadAgregado+'</td><td>$'+_agregados[contadorDeAgregados].precioAgregado+'</td><td><button id="'+contadorDeAgregados+'" class="btn btn-xs btn-danger deleteAg" title="Eliminar" onclick="eliminarAgregado(this);"><img src="https://img.icons8.com/android/12/000000/delete.png"/></button></td></tr>');

        //
        sessionStorage.setItem("_agregados", JSON.stringify(_agregados));

        contadorDeAgregados++; //Se incrementa el contadorDeAgregados
        sessionStorage.setItem("contadorAgregados", contadorDeAgregados); //Se modifica por el nuevo -valor- al sessionStorage
        limpiarInputsAgregado();
    }
}

function eliminarAgregado(control){
    let contadorDeAgregados = 0;
    let posicionAgregado = control.id;//Se borra el *obj* logicamente del array
    let _agregado = JSON.parse(sessionStorage.getItem('_agregados'));

    _agregado.splice(posicionAgregado, 1);

    //Se remplaza el antiguo 'sessionStorage' con el nuevo array -_agregado-
    sessionStorage.removeItem('_agregados');
    sessionStorage.setItem('_agregados', JSON.stringify(_agregado));
    
    //Se elimina visualmente de la tabla
    $('#trContAg'+posicionAgregado).remove();

    /* Contador - Agregados */
    //Disminuye el contador de agregados
    contadorDeAgregados = parseInt(sessionStorage.getItem("contadorAgregados")); //Se obtiene el contador del 'value' del -btnAddAg-
    contadorDeAgregados--;
    sessionStorage.setItem("contadorAgregados", contadorDeAgregados); //Se modifica por el nuevo -valor-
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
function generarEntregable(){
    
}

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
    data = data.tipoCotizacion ? data : data[0];

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
                if(resolve.status == "500" || resolve.status == 500){
                    console.log('Ah ocurrido un problema al intentar guardar la propuesta:');
                    console.log(respuesta.message);
                    alert('Ah ocurrido un problema al intentar guardar la propuesta');
                }
                else{
                    alert(respuesta.message.message);
                    $("#btnGuardarPropuesta").prop("disabled", true);
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
    let tipoCotizacion = null;
    let grafico = document.getElementById('crtGraficos').getContext('2d');
    let confingChart = {};
    let dataToSetGraphic = { sinPaneles: null, conPaneles: null };
    let data = {};

    let optionSelected = $('#ddlGraficoView').val();

    //Formating... * BajaTension || MediaTension *
    tipoCotizacion = JSON.parse(sessionStorage.getItem("answPropuesta")); //get - [data_propuesta]
    tipoCotizacion = tipoCotizacion[0].tipoCotizacion;

    try{
        if(optionSelected != '-1'){
            //Llenado de la DATA para pintar las graficas [ 'energetico' || 'economico' ]
            if(tipoCotizacion === 'bajaTension'){ //BajaTension
                data = JSON.parse(sessionStorage.getItem('answPropuesta'));

                if(optionSelected == 'ahorroEnergetico'){ //[DATA] Ahorro energetico
                    dataToSetGraphic.sinPaneles = data[0].power._consumos._promCons._consumosBimestrales;
                    dataToSetGraphic.conPaneles = data[0].power.nuevosConsumos._consumosNuevosBimestrales;
                }
                else{ //[DATA] Ahorro economico
                    dataToSetGraphic.sinPaneles = data[0].power.objConsumoEnPesos._pagosBimestrales;
                    dataToSetGraphic.conPaneles = data[0].power.objGeneracionEnpesos._pagosBimestrales;
                }
            }
            // else{ //MediaTension

            // }

            //Configuracion - Graficos
            switch(tipoCotizacion)
            {
                case 'bajaTension':
                    confingChart = {
                        type: 'bar',
                        data: {
                            labels: ['1er', '2do', '3ro', '4to', '5to', '6to'],
                            datasets: [
                                {
                                    label: 'Consumo actual',
                                    data: null,
                                    borderColor: 'rgb(235, 68, 65)',
                                    backgroundColor: 'rgb(235, 68, 65, 0.51)',
                                },
                                {
                                    label: 'Nuevo consumo',
                                    data: null,
                                    borderColor: 'rgb(109, 198, 20)',
                                    backgroundColor: 'rgba(109, 198, 20, 0.21)',
                                }
                            ]
                        },
                        options: {
                            title:{
                                display: true,
                                position: 'top',
                                text: null
                            },
                            scales: {
                                yAxes: []
                            } 
                        }
                    };

                    if(optionSelected == 'ahorroEnergetico'){ //[DATA] Ahorro energetico
                        //Title graphic
                        confingChart.options.title.text = 'Ahorro energetico';

                        //Formateado de data - Ahorro energetico
                        confingChart.data.datasets[0].data = dataToSetGraphic.sinPaneles;
                        confingChart.data.datasets[1].data = dataToSetGraphic.conPaneles;

                        //Formateado -Eje Y- 'kw'
                        confingChart.options.scales.yAxes[0] = {
                            ticks: {
                                //Incluye -'kw'- a los valores que se muestran en el eje Y
                                callback: function(value, index, values) {
                                    return value.toLocaleString('es-MX') + ' kw';
                                }
                            }
                        };
                    }
                    else{ //[DATA] Ahorro economico
                        //Title graphic
                        confingChart.options.title.text = 'Ahorro economico';

                        //Formateado de data - Ahorro energetico
                        confingChart.data.datasets[0].data = dataToSetGraphic.sinPaneles;
                        confingChart.data.datasets[1].data = dataToSetGraphic.conPaneles;

                        //Formateado de -Eje Y- '$'
                        confingChart.options.scales.yAxes[0] = {
                            ticks: {
                                //Incluye -'kw'- a los valores que se muestran en el eje Y
                                callback: function(value, index, values) {
                                    return '$' + value.toLocaleString('es-MX');
                                }
                            }
                        };
                    }
                break;
                case 'mediaTension':
                    confingChart = {};
                break;
                default:
                    -1;
                break;
            }

            window.grafico = new Chart(grafico, confingChart);
        }
    }
    catch(error){
        console.log(error);
        alert('Error al intentar pintar las graficas');
    }
}
/*#endregion*/