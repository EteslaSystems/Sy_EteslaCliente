var lista;
var option;
var indexador = 0;
var indexMostrar = 0;
var banderaEditar = false;
var arrayPeriodosGDMTH = [];
var objPeriodosGDMTH = {};
var msjConfirm = false;

$(document).ready(function(){
    mostrarPeriodo();
});

function agregarPeriodo(){
    var BkWh = document.getElementById('inpBkWh').value;
    var IkWh = document.getElementById('inpIkWh').value;
    var PkWh = document.getElementById('inpPkWh').value;
    var BkW = document.getElementById('inpBkw').value;
    var IkW = document.getElementById('inpIkw').value;
    var PkW = document.getElementById('inpPkw').value;
    var Bmxn = document.getElementById('B(mxn/kWh)').value;
    var Imxn = document.getElementById('I(mxn/kWh)').value;
    var Pmxn = document.getElementById('P(mxn/kWh)').value;
    var pagoTransmision = document.getElementById('inpPagoTransmision').value;
    var Cmxn = document.getElementById('C(mxn/kW)').value;
    var Dmxn = document.getElementById('D(mxn/kW)').value;

    /*Validar campos vacios*/
    if(validarCamposVacios(BkWh) || validarCamposVacios(IkWh) || validarCamposVacios(PkWh) || validarCamposVacios(BkW) || validarCamposVacios(IkW) || validarCamposVacios(PkW) || validarCamposVacios(Bmxn) || validarCamposVacios(Imxn) || validarCamposVacios(Pmxn) || validarCamposVacios(pagoTransmision) || validarCamposVacios(Cmxn) || validarCamposVacios(Dmxn))
    {
        msj = 'Todos los campos pertenecientes a los datos de consumo, deben ser llenados';
        modalMsj(msj,this.msjConfirm);
    }
    else{
        objPeriodosGDMTH = {
            bkwh: BkWh,
            ikwh: IkWh,
            pkwh: PkWh,
            bkw: BkW,
            ikw: IkW,
            pkw: PkW,
            bmxn: Bmxn,
            imxn: Imxn,
            pmxn: Pmxn,
            pagoTransmi: pagoTransmision,
            cmxn: Cmxn,
            dmxn: Dmxn
        };
    
        if(arrayPeriodosGDMTH.length < 12){
            arrayPeriodosGDMTH.push(objPeriodosGDMTH);
            sumarAlIndexador();
            //limpiarCampos();
        }
        else
        {
            msj = 'Solo se pueden ingresar 12 periodos';
            modalMsj(msj,this.msjConfirm);
            lista.remove(lista.selectedIndex);
            //restarAlIndexador();
        }
    }

    console.log('Longitud de array: '+arrayPeriodosGDMTH.length);
    console.log(arrayPeriodosGDMTH);
}

function eliminarPeriodo(){
    arrayPeriodosGDMTH.splice(0,(indexMostrar-1));
    /*Actualizar el indexador de la lista desplegable*/
    restarAlIndexador();
}

function actualizarPeriodo(){
    arrayPeriodosGDMTH[indexMostrar-1].bkwh = document.getElementById('inpBkWh').value;    ;
    arrayPeriodosGDMTH[indexMostrar-1].ikwh = document.getElementById('inpIkWh').value;
    arrayPeriodosGDMTH[indexMostrar-1].pkwh = document.getElementById('inpPkWh').value;
    arrayPeriodosGDMTH[indexMostrar-1].bkw = document.getElementById('inpBkw').value;
    arrayPeriodosGDMTH[indexMostrar-1].ikw = document.getElementById('inpIkw').value;
    arrayPeriodosGDMTH[indexMostrar-1].pkw = document.getElementById('inpPkw').value;
    arrayPeriodosGDMTH[indexMostrar-1].bmxn = document.getElementById('B(mxn/kWh)').value;
    arrayPeriodosGDMTH[indexMostrar-1].imxn = document.getElementById('I(mxn/kWh)').value;
    arrayPeriodosGDMTH[indexMostrar-1].pmxn = document.getElementById('P(mxn/kWh)').value;
    arrayPeriodosGDMTH[indexMostrar-1].pagoTransmi = document.getElementById('inpPagoTransmision').value;
    arrayPeriodosGDMTH[indexMostrar-1].cmxn = document.getElementById('C(mxn/kW)').value;
    arrayPeriodosGDMTH[indexMostrar-1].dmxn = document.getElementById('D(mxn/kW)').value;
}

function mostrarPeriodo(){
    /*Se desplega el contenido del array en los campos*/ 
    $("#lstPeriodosGDMTH").on("change", function(){
        indexMostrar = document.getElementById("lstPeriodosGDMTH").value;
        
        if(indexMostrar > indexador){
            //limpiarCampos();
            desbloquearCampos();
            banderaEditar = false;
        }
        else{
            document.getElementById('inpBkWh').value = arrayPeriodosGDMTH[indexMostrar-1].bkwh.toString();
            document.getElementById('inpIkWh').value = arrayPeriodosGDMTH[indexMostrar-1].ikwh.toString();
            document.getElementById('inpPkWh').value = arrayPeriodosGDMTH[indexMostrar-1].pkwh.toString();
            document.getElementById('inpBkw').value = arrayPeriodosGDMTH[indexMostrar-1].bkw.toString();
            document.getElementById('inpIkw').value = arrayPeriodosGDMTH[indexMostrar-1].ikw.toString();
            document.getElementById('inpPkw').value = arrayPeriodosGDMTH[indexMostrar-1].pkw.toString();
            document.getElementById('B(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar-1].bmxn.toString();
            document.getElementById('I(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar-1].imxn.toString();
            document.getElementById('P(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar-1].pmxn.toString();
            document.getElementById('inpPagoTransmision').value = arrayPeriodosGDMTH[indexMostrar-1].pagoTransmi.toString();
            document.getElementById('C(mxn/kW)').value = arrayPeriodosGDMTH[indexMostrar-1].cmxn.toString();
            document.getElementById('D(mxn/kW)').value = arrayPeriodosGDMTH[indexMostrar-1].dmxn.toString();

            if(indexMostrar < indexador || indexMostrar == indexador){
                /*El usuario estara navegando en los periodos ya guardados en memoria*/
                bloquearCampos();
                /*Y posiblemente quiera editar, por eso se cambia la bandera a true*/
                banderaEditar = true;
            }
            /*else{
                desbloquearCampos();
                banderaEditar = false;
            }*/

            logicaBotones();
        }
        
        console.log('indexMostrar: '+indexMostrar+' indexador: '+indexador);
    });
}

function sumarAlIndexador(){
    indexador = arrayPeriodosGDMTH.length;
    lista = document.getElementById("lstPeriodosGDMTH");    
    option = document.createElement("option");
    option.text = indexador + 1;
    lista.add(option);
    lista.selectedIndex = indexador.toString();
}

function restarAlIndexador(){
    for(let i = arrayPeriodosGDMTH.length; i >= 0; i--){
        lista.remove(i);
    }
    for(let j = 1; j < arrayPeriodosGDMTH.length; j++){
        option = document.createElement("option");
        this.option.text = j;
        lista.add(option);
    }
    lista.selectedIndex = arrayPeriodosGDMTH.length.toString();
}

function validarCamposVacios(valor){
    valor = valor.replace("&nbsp;", "");
    valor = valor == undefined ? "" : valor;

    if (!valor || 0 === valor.trim().length){
        return true;
    }
    else{
        return false;
    }
}

function logicaBotones(){
    if(banderaEditar == true){
        $('#btnEditarPeriodo').prop("disabled",false);
        $('#btnEliminarPeriodo').prop("disabled",false);
        $('#btnAgregarPeriodo').prop("disabled",true);
    }
    else if(banderaEditar == false){
        $('#btnEditarPeriodo').prop("disabled",true);
        $('#btnEliminarPeriodo').prop("disabled",true);
        if((indexador + 1) < 12){
            $('#btnAgregarPeriodo').prop("disabled",true);
        }
    }

    $('#btnEditarPeriodo').click(function(){
        $('#btnActualizarPeriodo').prop("disabled",false);
        $('#btnEditarPeriodo').prop("disabled",true);
        $('#btnEliminarPeriodo').prop("disabled",true);
        $('#btnAgregarPeriodo').prop("disabled",true);
        $("#lstPeriodosGDMTH").prop("disabled",true);
        desbloquearCampos();
    });

    $('#btnActualizarPeriodo').click(function(){
        $('#btnEditarPeriodo').prop("disabled",false);
        $('#btnEliminarPeriodo').prop("disabled",false);
        $('#btnActualizarPeriodo').prop("disabled",true);
        $('#btnAgregarPeriodo').prop("disabled",true);
        $("#lstPeriodosGDMTH").prop("disabled",false);
        bloquearCampos();
    });
}

function sendPeriodsToServer(){
    var municipio = document.getElementById('municipio').value;
    var idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/enviarPeriodos',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            'arrayPeriodosGDMTH': arrayPeriodosGDMTH,
            'municipio': municipio,
            'idCliente': idCliente
        },
        dataType: 'json',
        success: function(respuesta){
            console.log(respuesta);
        },
        error: function(){
            console.log('Al parecer hubo un error con la peticion AJAX de la cotizacion');
        }
    });
}

function validarEnvioDePeriodo(){
    
    if(arrayPeriodosGDMTH.length == 0 || arrayPeriodosGDMTH.length == 1){
        msj = 'Ups! Número de periodos insuficientes para calcular';
        modalMsj(msj,this.msjConfirm);
    }
    else if(arrayPeriodosGDMTH.length < 12){
        this.msjConfirm = true;
        msj = 'No se estan obteniendo los 12 periodos esperados, se realizara un promedio de los datos faltantes ¿Desea enviar?';
        if(modalMsj(msj,msjConfirm) == true){
            sendPeriodsToServer();
            //limpiarCampos();
            //this.arrayPeriodosGDMTH = [];
            //console.log(arrayPeriodosGDMTH);
            /*
                -Desplegar un spinner que simule la carga/calculo de la cotización, en lo 
                el servidor realiza las operaciones necesarias
            */
        }
    }
    else if(arrayPeriodosGDMTH.length == 12){
        sendPeriodsToServer();
        //limpiarCampos();
        this.arrayPeriodosGDMTH = [];
        console.log(arrayPeriodosGDMTH);
        /*
            -Desplegar un spinner que simule la carga/calculo de la cotización, en lo 
             el servidor realiza las operaciones necesarias
        */
    } 
}

function modalMsj(msj,msjConfirm){
    if(msjConfirm == true){
        var confirmacion = confirm(msj);

        return confirmacion ? true : false; 
    }
    else{
        alert(msj);
    }
}

function bloquearCampos(){
    $('input[type="number"]').attr("readOnly",true);
}

function desbloquearCampos(){
    $('input[type="number"]').attr("readOnly",false);
}

function limpiarCampos(){
    $('input[type="number"]').val('');
}

function GDMTH(){
    document.getElementById('divGDMTO').style.display = 'none';
    document.getElementById('divGDMTH').style.display = '';
}