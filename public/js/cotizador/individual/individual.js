/*
- @description: 		Archivo correspondiente a las funciones de los controles de la cotizacion_individual.
- @author: 				LH420
- @date: 				19/05/2020
*/

var idPanel;
var idInversor;
var direccionCliente = '';
var bInstalacion = false;

$(document).ready(function(){
    var loader = $('#loader');

    /* readyLoader(loader); */
    configurationItems_modal(); 
});

/* function readyLoader(loader){
    $(document)
    .ajaxStart(function(){
        loader.fadeIn();
    })
    .ajaxStop(function(){
        loader.fadeOut();
        $('#divResultCotIndv').css("display","");
    });
} */

function loadMenuAddItem(){    
    document.getElementById("menuContent").classList.toggle("menu-active");
}

function checkCheckBox(){
    if($('#chbEstructuras').prop("checked") == true){
        return true;
    }
}

function getDropDownListValues(){
    idPanel = document.getElementById('optPaneles').value;
    idInversor = document.getElementById('optInversores').value; 

    if(idPanel != "-1"){
        $('#inpCantPaneles').prop("disabled", false);
        $('#chbEstructuras').prop("disabled", false);
    }else{
        $('#inpCantPaneles').prop("disabled", true);
        $('#chbEstructuras').prop("disabled", true);
    }

    if(idInversor != "-1"){
        $('#inpCantInversores').prop("disabled", false);
    }else{
        $('#inpCantInversores').prop("disabled", true);
    }
}

function validarValoresDropDownLists(idPanel, idInversor){
    if(idPanel == "-1" && idInversor == "-1"){
        alert('Favor de seleccionar al menos un inversor o un panel');
    }else{
        return true;
    }
}

function validarCamposVaciosInd()
{
    if($('#inpCantPaneles').prop("disabled") == true && $('#inpCantInversores').prop("disabled") == true)
    {
        alert('Campos inhabilitados y vacios. Favor de rellenar!!');
    }
    else if($('#inpCantPaneles').prop("disabled") == false && $('#inpCantInversores').prop("disabled") == true){
        if($('#inpCantPaneles').val() == ""){
            alert('Campo vacio "cantidad_paneles". ¡Favor de rellenar!');
        }
        else{
            return true;
        }
    }
    else if($('#inpCantPaneles').prop("disabled") == true && $('#inpCantInversores').prop("disabled") == false){
        if($('#inpCantInversores').val() == ""){
            alert('Campo vacio "cantidad_inversores". ¡Favor de rellenar!');
        }
        else{
            return true;
        }
    }
    else if($('#inpCantPaneles').prop("disabled") == false && $('#inpCantInversores').prop("disabled") == false){
        if($('#inpCantPaneles').val() == "" && $('#inpCantInversores').val() == "" || $('#inpCantPaneles').val() == "" || $('#inpCantInversores').val() == ""){
            alert('Campo(s) vacio(s). ¡Favor de rellenar!');
        }
        else{
            return true;    
        }
    }
}

function sendSingleQuotation(){
    let cantidadPaneles = document.getElementById('inpCantPaneles').value;
    let cantidadInversores = document.getElementById('inpCantInversores').value;
    let cantidadEstructuras = document.getElementById('inpCantidadEstruct').value;
    direccionCliente = document.getElementById('municipio').value;

    sessionStorage.setItem("tarifaMT", "individual");

    changeValue_bInstalacion();

    if(validarUsuarioCargado(direccionCliente) === true){
        if(validarValoresDropDownLists(idPanel, idInversor) == true ){
            if(validarCamposVaciosInd() == true){
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    url: '/enviarCotizIndiv',
                    data: {
                        "_token": $("meta[name='csrf-token']").attr('content'),
                        "idPanel": idPanel,
                        "idInversor": idInversor,
                        "cantidadPaneles": cantidadPaneles,
                        "cantidadInversores": cantidadInversores,
                        "cantidadEstructuras": cantidadEstructuras,
                        "direccionCliente": direccionCliente,
                        "bInstalacion": bInstalacion
                    },
                    dataType: 'json',
                    error: function(){
                        alert('Algo ha ido mal al intentar realizar una cotizacion_individual');
                    }
                })
                .done(function(respuest){
                    //Cotizacion individual - Result
                    let respuesta = respuest.message;
                    console.log(respuesta);

                    //Se guarda la *propuesta_calculada* en un SessionStorage
                    sessionStorage.setItem('ssPropuestaIndividual', JSON.stringify(respuesta))

                    /*#region Se desbloquean botones de "Guardar propuesta" y "Generar_PDF" */
                    $('#btnGuardarPIndiv').attr("disabled",false);
                    $('#btnGenerarPIndiv').attr("disabled",false);
                    /*#endregion*/

                    if(respuesta[0].paneles != null){
                        //Paneles
                        $('#inpCostTotalPaneles').val(respuesta[0].paneles.costoTotal + '$');
                        $('#txtCantidadPanelesInd').html('('+respuesta[0].paneles.noModulos+')');
    
                        //Estructuras
                        respuesta[0].paneles.costoDeEstructuras != null ? $('#inpCostTotalEstructuras').val(respuesta[0].paneles.costoDeEstructuras + '$') : $('#inpCostTotalEstructuras').val(0 + '$');
                    }

                    if(respuesta[0].inversores != null){
                        //Inversores
                        $('#inpCostTotalInversores').val(respuesta[0].inversores.precioTotal + '$');
                        $('#txtCantidadInversoresInd').val(respuesta[0].inversores.numeroDeInversores);
                    }
                    else{
                        //Inversores
                        $('#inpCostTotalInversores').val(0 + '$');
                        $('#txtCantidadInversoresInd').val(0);
                    }

                    //Viaticos
                    $('#inpCostoTotalViaticos').val(respuesta[0].totales.totalViaticosMT+'$');

                    //Totales
                    $('#inpPrecio').val(respuesta[0].totales.precio+'$');
                    $('#inpPrecioIVA').val(respuesta[0].totales.precioMasIVA+'$');
                    $('#precioMXN').val('$'+respuesta[0].totales.precioMasIVAMXN);
                });
            }
        }
    }
}

function validarUsuarioCargado(direccion_Cliente){
    if(direccion_Cliente){
        return true;
    }
    else{
        alert('Falto cargar un cliente');
        return false;
    }
}

//Logica_botones
function configurationItems_modal(){
    $('#btnModalConfig').on("click",function(){
        var cantidadPaneles = $('#inpCantPaneles').val();
        var cantidadEstructuras = $('#inpCantidadEstruct'); 

        $('#chbEstructuras').on("click",function(){
            if(cantidadEstructuras.prop("disabled")){
                cantidadEstructuras.val(cantidadPaneles);
                cantidadEstructuras.attr("disabled", false);
            }
            else{
                cantidadEstructuras.attr("disabled", true);
                cantidadEstructuras.val(0);
            } 
        });
    });
}

//Validations
function changeValue_bInstalacion(){
    if($('#chbInstalacion').is(":checked")){
        bInstalacion = true;
    }
    else{
        bInstalacion = false;
    }
}

/*#region Generar entregable_propuesta (PDF)*/
//"catchDataResult()->"
function generarEntregable(){
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let ssPropuestaIndividual = sessionStorage.getItem('ssPropuestaIndividual');

    let data = { idCliente, ssPropuestaIndividual, tipoPropuesta: "individual" };

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/PDFgenerate',
        dataType: 'json',
        data: data
    })
    .fail(function(err){
        console.log('Error: '+JSON.stringify(err));
        alert('Error al querer intentar datos del PDF al servidor');
    })
    .done(function(pdfBase64){
        //Se formatea la respuesta del pdfBase64
        pdfBase64 = pdfBase64.message; //Respuesta de la API - JSON
        nombreArchivoPDF = pdfBase64.fileName;
        pdfBase64 = pdfBase64.pdfBase64; //Se obtiene el base64 decodificado

        //Se activan los botones que generan el //QR || PDF//
        $('#btnGenerarQrCode').prop("disabled",false);
        $('#btnGenerarPdfFileViewer').prop("disabled",false);

        // $('#btnGenerarQrCode').on('click', function(){ 
            //Mostrar un QR-Code el cual redireccione a la descarga/visualizacion del pdfBase64 en pdfFile


            // var codigoQr = new QRCode(document.getElementById("divQrCodeViewer"));
            // codigoQr.clear();
            // codigoQr.makeCode("archivoPDF"); //Se pasa el documento PDF al codigoQR

            // console.log('Generando codigo QR');
        // });         

        $('#btnGenerarPdfFileViewer').on('click', function(){
            //Mostrar el pdfBase64 en un iFrame (ventana navegador nueva)
            let pdfWindow = window.open("");
            pdfWindow.document.write(
                "<iframe id='iframePDF' width='100%' height='100%' src='data:application/pdf;base64, " +encodeURI(pdfBase64)+ "' frameborder='0'></iframe>"
            );

            console.log('Nombre pdfFile:\n'+nombreArchivoPDF);
            console.log('Generando pdf. . .');
        });
    });
}
/*#endregion*/