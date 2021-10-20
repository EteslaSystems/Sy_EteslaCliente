$(document).on('ready',function(){
    sessionStorage.removeItem("_agregados");
    sessionStorage.removeItem("contadorAgregados");
});

/*   Agregados_CRUD   */
/*#region Logica*/
function addAgregado(){
    let _agregados = [];
    let Agregado = { nombreAgregado: null, cantidadAgregado: null, precioAgregado: null };
    let nombreAgregao = $('#inpAgregado').val();
    let cantidadAgregado = $('#inpCantidadAg').val();
    let precioAgregado = $('#inpPrecioAg').val();
    let contadorDeAgregados = 0;

    /* Contador - Agregados */
    contadorDeAgregados = sessionStorage.getItem('contadorAgregados');
    contadorDeAgregados = contadorDeAgregados != null ? parseInt(contadorDeAgregados) : 0;

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

        //Pintar <td>'Agregado'</td> en tabla
        let tableBody = $('#tblAgregados > tbody');
        tableBody.append('<tr id="trContAg'+contadorDeAgregados+'"><td id="tdAgregado'+contadorDeAgregados+'">'+(contadorDeAgregados+1)+'</td><td>'+_agregados[contadorDeAgregados].nombreAgregado+'</td><td>'+_agregados[contadorDeAgregados].cantidadAgregado+'</td><td id="tdPrecioUnitario">$ '+_agregados[contadorDeAgregados].precioAgregado.toLocaleString('es-MX')+' MXN</td><td id="tdSubtotal">$ '+(_agregados[contadorDeAgregados].cantidadAgregado * _agregados[contadorDeAgregados].precioAgregado).toLocaleString('es-MX')+' MXN</td><td><button id="'+contadorDeAgregados+'" class="btn btn-xs btn-danger deleteAg" title="Eliminar" onclick="eliminarAgregado(this);"><img src="https://img.icons8.com/android/12/000000/delete.png"/></button></td></tr>');

        //Se afecta[SUMA] el contador -costoTotalAgregados-
        costoTotalAgregados(0, (_agregados[contadorDeAgregados].cantidadAgregado * _agregados[contadorDeAgregados].precioAgregado));

        //
        sessionStorage.setItem("_agregados", JSON.stringify(_agregados));

        contadorDeAgregados++; //Se incrementa el contadorDeAgregados
        sessionStorage.setItem("contadorAgregados", contadorDeAgregados); //Se modifica por el nuevo -valor- al sessionStorage
        limpiarInputsAgregado();
    }
}

function eliminarAgregado(){
    let _agregado = JSON.parse(sessionStorage.getItem('_agregados'));
    let contadorDeAgregados = parseInt(sessionStorage.getItem("contadorAgregados")); //Se obtiene el contador del 'value' del -btnAddAg-

    //Se afecta[RESTA] el contador -costoTotalAgregados-
    costoTotalAgregados(1, (_agregado[contadorDeAgregados - 1].cantidadAgregado * _agregado[contadorDeAgregados - 1].precioAgregado));

    _agregado.splice((contadorDeAgregados - 1), 1);


    //Se remplaza el antiguo 'sessionStorage' con el nuevo array -_agregado-
    sessionStorage.removeItem('_agregados');
    sessionStorage.setItem('_agregados', JSON.stringify(_agregado));
    
    //Se elimina visualmente de la tabla
    $('#trContAg'+(contadorDeAgregados - 1)).remove();

    /* Contador - Agregados */
    //Disminuye el contador de agregados
    contadorDeAgregados--;
    sessionStorage.setItem("contadorAgregados", contadorDeAgregados); //Se modifica por el nuevo -valor-
}

//Validaciones y eventos - *Agregados*
function costoTotalAgregados(operacion, costoTotal){ //Afecta el -contador- de *CostoTotal* de Agregados y pintarlo/mostrarlo
    /* 
        ->operacion [suma || resta]
        ->costoTotal [cantidadDeAgregados * costoUnitarioAgregado]
    */
    let costoTotalAgregados = 0;

    //Leer el sessionStorage del contador -costoTotal-
    costoTotalAgregados = sessionStorage.getItem('costoTotalAgregados');
    costoTotalAgregados = costoTotalAgregados != null ? costoTotalAgregados : 0; //Si encuentra el sessionStorage de -costoTotalAgregados-, lo settea y si no, se le inicializa 0
    costoTotalAgregados = parseFloat(costoTotalAgregados);

    //Captar que operacion se realizara
    switch(operacion)
    {
        case 0: //Suma
            //Se realiza la operacion correspondiente
            costoTotalAgregados = costoTotalAgregados + costoTotal;

            //Se settea el valor al -sessionStorage-
            sessionStorage.removeItem('costoTotalAgregados');
            sessionStorage.setItem('costoTotalAgregados',costoTotalAgregados);
        break;
        case 1: //Resta
            //Se realiza la operacion correspondiente
            costoTotalAgregados = costoTotalAgregados - costoTotal;

            //Se settea el valor al -sessionStorage-
            sessionStorage.removeItem('costoTotalAgregados');
            sessionStorage.setItem('costoTotalAgregados',costoTotalAgregados);
        break;
        default:
            -1;
        break;
    }

    //Pintar resultado del -contador-
    $('#costoTotalAgregados').text('$ ' + costoTotalAgregados.toLocaleString('es-MX') + ' MXN');
}

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

/* PDF */
/*#region Funcionalidad */
function catchPDFConfiguration(){ ///Return [Object]
    /* Se obtiene un Objeto de como se configurara/imprimira el PDF */

    let PDFConfiguration = {};

    let subDesglozados = $('#swtSubtDesglozados').is(":checked"); //Subtotales desglozados

    PDFConfiguration = {
        subtotalesDesglozados: subDesglozados
    };

    return PDFConfiguration;
}
/*#endregion*/
/*#region Botones*/
async function generarEntregable(){ //:void()
    //Se comprueba que opcion fue seleccionada -QrCode- o -PdfFile-
    let opcSeleccionada = null;
    
    try{
        //
        if($('#rbtnPDF').is(":checked") && !$('#rbtnQR').is(":checked")){
            opcSeleccionada = "rbtnPDF";
        }
        else if(!$('#rbtnPDF').is(":checked") && $('#rbtnQR').is(":checked")){
            opcSeleccionada = "rbtnQR";
        }

        switch(opcSeleccionada)
        {
            case 'rbtnPDF':
                let pdfResponse = await generarPDF(); //Retur: PDFFile encode
                visualizandoPDF(pdfResponse); //:void()
            break;
            case 'rbtnQR':

            break;
            default: 
                alert('Favor de escoger una opcion de -Generar- el entregable PDF/CodigoQr');
            break;
        }
    }
    catch(error){
        console.log(error);
        alert(error);
    }
}

function visualizandoPDF(pdfFile){
    let blobPDF = new Blob([pdfFile.pdfResponse],{type: "application/pdf"});

    // IE doesn't allow using a blob object directly as link href
    // instead it is necessary to use msSaveOrOpenBlob
    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
        window.navigator.msSaveOrOpenBlob(blobPDF);
        return;
    } 

    let link = document.createElement('a');

    // let fileName = getPDFFileName(pdfFile.data);
    let fileName = 'test.pdf';

    link.href = window.URL.createObjectURL(blobPDF);
    link.download = fileName;
    link.click();

    //Only Firefox Browser
    setTimeout(function(){
        // For Firefox it is necessary to delay revoking the ObjectURL
        window.URL.revokeObjectURL(pdfFile.data);
    }, 100);
}
/*#endregion*/
/*#region Solicitud-Servidor*/
function generarPDF(){
    let data = {};

    //Validar que tipo de cotizacion se esta tratando de generarPDF
    let tipoCotizacion = sessionStorage.getItem("tarifaMT");

    //Obtener la configuracion del PDF
    let PdfConfig = catchPDFConfiguration();

    if(tipoCotizacion === 'GDMTO' || tipoCotizacion === 'GDMTH'){ ///MediaTension
        data = sessionStorage.getItem("propuestaMT");
    }
    else if(tipoCotizacion === 'null' || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        data = sessionStorage.getItem("answPropuesta"); //Sin Combinaciones
        data = data != null ? data : sessionStorage.getItem("arrayCombinaciones"); //Con Combinaciones
    }
    else{ ///Individual
        data = sessionStorage.getItem('ssPropuestaIndividual');
    }
    
    data = JSON.parse(data);
    data = data.tipoCotizacion ? data : data[0];

    //Se agrega a la [data] el Objeto de -PDFConfig-
    Object.assign(data,{PdfConfig: PdfConfig});

    //Si tiene -COMBINACIONES- se manda la data de la -CombinacionSeleccionada- && -arrayCombinaciones-
    if(data.combinaciones){
        data.tipoCotizacion = 'CombinacionCotizacion';
        Object.assign(data,{ propuesta: JSON.parse(sessionStorage.getItem("combinacionSafe")) });
    }

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/PDFgenerate',
            data: data,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(pdfResponse, status){
                if(status === 'success'){
                    resolve({ pdfResponse, data });
                }
            },
            error: function(error){
                console.log(error);
                reject('Se presento una falla a la hora de querer generar el PDF\n'+error);
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
    let propuesta = {};
    let dataToSent = { idCliente: null, propuesta: null };
    dataToSent.idCliente = $('#inpClienteId').val();
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    if(tarifaMT === "null" || typeof tarifaMT === 'undefined'){ //BajaTension
        //Se obtiene la propuesta -BajaTension-
        propuesta = sessionStorage.getItem("answPropuesta");
        
        //Se valida la propuesta BajaTension... Si es ConCombinaciones o SinCombinaciones
        propuesta = propuesta != null ? propuesta : sessionStorage.getItem("arrayCombinaciones");
        
        //
        propuesta = JSON.parse(propuesta);
        propuesta = propuesta.tipoCotizacion ? propuesta : propuesta[0];

        //Validar si la propuesta tiene -COMBINACIONES-
        if(propuesta.combinaciones){
            let tipoCotizacion = propuesta.tipoCotizacion;

            //Obtener la propuesta con la -combinacion_seleccionada-
            propuesta = JSON.parse(sessionStorage.getItem('combinacionSafe'));

            //
            Object.assign(propuesta,{ tipCotizacion: tipoCotizacion });
        }

        dataToSent.propuesta = propuesta;
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