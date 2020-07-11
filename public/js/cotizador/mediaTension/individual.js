/*
- @description: 		Archivo correspondiente a las funciones de los controles de la cotizacion_individual.
- @author: 				LH420
- @date: 				19/05/2020
*/

var idPanel;
var idInversor;
var direccionCliente = '';

$(document).ready(function(){
    var loader = $('#loader');

    /* readyLoader(loader); */
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

function validarCamposVacios()
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
    var cantidadPaneles = document.getElementById('inpCantPaneles').value;
    var cantidadInversores = document.getElementById('inpCantInversores').value;
    direccionCliente = document.getElementById('municipio').value;
    bEstructuras = false;

    if(checkCheckBox() == true){
        bEstructuras = true;
    }
    if(validarValoresDropDownLists(idPanel, idInversor) == true){
        if(validarCamposVacios() == true){
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
                    "bEstructuras": this.bEstructuras,
                    "direccionCliente": direccionCliente
                },
                dataType: 'json',
                error: function(){
                    alert('Algo ha ido mal al intentar realizar una cotizacion_individual');
                }
            })
            .done(function(respuesta){
                respuesta = respuesta.message;
                console.log(respuesta);

                if(respuesta[0].paneles.cantidadPaneles != null || respuesta[0].paneles.cantidadPaneles > 0 && respuesta[0].inversores.numeroDeInversores > 0 || respuesta[0].inversor.numeroDeInversores != null)
                {   
                    console.log('Entro 1');
                    /*Vaciar datos de la cotizacion_individual en la tabla*/
                    //Paneles
                    $('#inpCostTotalPaneles').val(respuesta[0].paneles.costoTotalPaneles + '$');
                    $('#txtCantidadPanelesInd').html('('+respuesta[0].paneles.cantidadPaneles+')');

                    //Estructuras
                    respuesta[0].paneles.costoDeEstructuras != null ? $('#inpCostTotalEstructuras').val(respuesta[0].paneles.costoDeEstructuras + '$') : $('#inpCostTotalEstructuras').val(0 + '$');
                    $('#txtCantidadEstructurasInd').html('('+respuesta[0].paneles.cantidadPaneles+')');

                    //Inversores
                    respuesta[0].inversores.costoTotalInversores != null ? $('#inpCostTotalInversores').val(respuesta[0].inversores.costoTotalInversores + '$') : $('#inpCostTotalInversores').val(0 + '$');
                    respuesta[0].inversores.numeroDeInversores != null ? $('#txtCantidadInversoresInd').html('('+respuesta[0].paneles.cantidadPaneles+')') : $('#txtCantidadInversoresInd').html('(0)');

                    //Viaticos  
                    respuesta[0].totales.totalViaticosMT ? $('#inpCostoTotalViaticos').val(respuesta[0].totales.totalViaticosMT + '$') : $('#inpCostoTotalViaticos').val('0$');
            
                    //Totales
                    $('#inpPrecio').val(respuesta[0].totales.precio + '$');
                    $('#inpPrecioIVA').val(respuesta[0].totales.precioMasIVA + '$');
                    $('#precioMXN').val('$'+respuesta[0].totales.precioTotalMXN);
                }
                else{
                    /*REVISAR ESTA PARTE PARA CORREGIRLA O ELIMINARLA*/
                    if(respuesta[0].paneles.cantidadPaneles == 0 && respuesta[0].inversores.numeroDeInversores != 0)
                    {
                        console.log('Entro 2');

                        $('#dtabPanels').css("display","none");
                        $('#dtabViatics').css("display","none");
                        $('#dtabTotales').css("display","none");
                        $('#divPaginado').css("display","none");

                        //Inversores
                        $('#tdCantidadInversor').val(respuesta[0].inversores.numeroDeInversores);
                        $('#tdPotenciaInversor').val(respuesta[0].inversores.potenciaInversor);
                        $('#tdPotenciaMaxima').val(respuesta[0].inversores.potenciaMaximaInversor);
                        $('#tdPotenciaNominal').val(respuesta[0].inversores.potenciaNominalInversor);
                        //$('#tdPorcentajeSD').val(respuesta[0].inversores.porcentajeSobreDimens + '%');
                        //$('#tdPotenciaPico').val(respuesta[0].inversores.potenciaPicoPorInversor);
                        $('#tdPrecioInversor').val(respuesta[0].inversores.precioInversor + '$');
                        $('#tdCostoTotalInv').val(respuesta[0].inversores.costoTotalInversores + '$');
                    }
                    else{
                        if(respuesta[0].inversores.costoTotalInversores == null)
                        {
                            console.log('Entro 3');

                            //Paneles
                            $('#tdCantidadPanel').val(respuesta[0].paneles.cantidadPaneles);
                            $('#tdPotenciaPanel').val(respuesta[0].paneles.potenciaPanel);
                            $('#tdPotenciaReal').val(respuesta[0].paneles.potenciaReal);
                            $('#tdPrecioModulo').val(respuesta[0].paneles.precioPorModulo + '$');
                            $('#tdCostoTotalPanels').val(respuesta[0].paneles.costoTotalPaneles + '$');

                            //Viaticos
                            respuesta[0].viaticos_costos.costoDeEstructuras != null ? $('#tdCostoEstructuras').val(respuesta[0].viaticos_costos.costoDeEstructuras + '$') : $('#tdCostoEstructuras').val(0 + '$');
                            $('#tdNoCuadrillas').val(respuesta[0].viaticos_costos.noCuadrillas);
                            $('#tdNoDias').val(respuesta[0].viaticos_costos.noDias);
                            $('#tdNoDiasReales').val(respuesta[0].viaticos_costos.noDiasReales);
                            $('#tdNoPersonasReq').val(respuesta[0].viaticos_costos.noPersonasRequeridas);
                            $('#tdPagoPasaje').val(respuesta[0].viaticos_costos.pagoPasaje + '$');
                            $('#tdPagoTotalComida').val(respuesta[0].viaticos_costos.pagoTotalComida + '$');
                            $('#tdPagoTotalHospedaje').val(respuesta[0].viaticos_costos.pagoTotalHospedaje + '$');
                            $('#tdPagoTotalPasaje').val(respuesta[0].viaticos_costos.pagoTotalPasaje + '$');
                            $('#tdTotalViaticos').val(respuesta[0].totales.totalViaticosMT + '$');
            
                            //Totales
                            $('#tdCostoWatt').val(respuesta[0].totales.costForWatt + '$');
                            $('#tdCostoTotalFletes').val(respuesta[0].totales.costoTotalFletes + '$');
                            $('#tdManoObra').val(respuesta[0].totales.manoDeObra + '$');
                            $('#tdMargen').val(respuesta[0].totales.margen);
                            $('#tdTotalOtros').val(respuesta[0].totales.otrosTotal + '$');
                            $('#tdPrecio').val(respuesta[0].totales.precio + '$');
                            $('#tdPrecioMasIVA').val(respuesta[0].totales.precioMasIVA + '$');
                            $('#tdTPIE').val(respuesta[0].totales.totalPanelesInversoresEstructuras + '$');
                            $('#tdSubtotalOFPIE').val(respuesta[0].totales.subTotalOtrosFleteManoDeObraTPIE + '$');
                            $('#tdTotalTodo').val(respuesta[0].totales.totalDeTodo + '$');
                        }
                    }
                }
            });
        }
    }
}

function coti_dollars(){
    document.getElementById('containerCI1').style.display = '';
    document.getElementById('containerCI2').style.display = 'none';
}

function coti_mxn(){
    document.getElementById('containerCI2').style.display = '';
    document.getElementById('containerCI1').style.display = 'none';
}