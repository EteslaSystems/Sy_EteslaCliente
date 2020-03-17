var arrayPeriodosGDMTH = [];
var objPeriodosGDMTH = {};
var indexador = 0;
var indexMostrar = 0;

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

    if(arrayPeriodosGDMTH.length <= 3)
    {
        arrayPeriodosGDMTH.push(objPeriodosGDMTH);
    }

    /*Validar campos vacios*/
    if(validarCamposVacios(BkWh) || validarCamposVacios(IkWh) || validarCamposVacios(PkWh) || validarCamposVacios(BkW) || validarCamposVacios(IkW) || validarCamposVacios(PkW) || validarCamposVacios(Bmxn) || validarCamposVacios(Imxn) || validarCamposVacios(Pmxn) || validarCamposVacios(pagoTransmision) || validarCamposVacios(Cmxn) || validarCamposVacios(Dmxn))
    {
        alert('Todos los campos pertenecientes a los datos de consumo, deben de llenarse');
    }
    else if(arrayPeriodosGDMTH.length <= 3)
    {
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
        
        sumarAlIndexador();
        limpiarCampos();
    }
    else
    {
        alert('Solo se pueden ingresar 12 periodos');
    }

    console.log('Longitud de array: '+arrayPeriodosGDMTH.length);
}

function mostrarPeriodo(){
    /*Se desplega el contenido del array en los campos*/ 
    $("#lstPeriodosGDMTH").on("change", function(){
        indexMostrar = document.getElementById("lstPeriodosGDMTH").value;
        document.getElementById('inpBkWh').value = arrayPeriodosGDMTH[indexMostrar].bkwh.toString();
        document.getElementById('inpIkWh').value = arrayPeriodosGDMTH[indexMostrar].ikwh.toString();
        document.getElementById('inpPkWh').value = arrayPeriodosGDMTH[indexMostrar].pkwh.toString();
        document.getElementById('inpBkw').value = arrayPeriodosGDMTH[indexMostrar].bkw.toString();
        document.getElementById('inpIkw').value = arrayPeriodosGDMTH[indexMostrar].ikw.toString();
        document.getElementById('inpPkw').value = arrayPeriodosGDMTH[indexMostrar].pkw.toString();
        document.getElementById('B(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar].bmxn.toString();
        document.getElementById('I(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar].imxn.toString();
        document.getElementById('P(mxn/kWh)').value = arrayPeriodosGDMTH[indexMostrar].pmxn.toString();
        document.getElementById('inpPagoTransmision').value = arrayPeriodosGDMTH[indexMostrar].pagoTransmi.toString();
        document.getElementById('C(mxn/kW)').value = arrayPeriodosGDMTH[indexMostrar].cmxn.toString();
        document.getElementById('D(mxn/kW)').value = arrayPeriodosGDMTH[indexMostrar].dmxn.toString();

    });
}

function sumarAlIndexador(){
    indexador = arrayPeriodosGDMTH.length;
    var lista = document.getElementById("lstPeriodosGDMTH");    
    var option = document.createElement("option");
    option.text = indexador + 1;
    lista.add(option);
    lista.selectedIndex = indexador.toString();
}

/*
function editarPeriodo(){}
function actualizarPeriodo(){}
function eliminarPeriodo(){}
*/

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

function limpiarCampos(){
    $('input[type="number"]').val('');
}

function GDMTH(){
    document.getElementById('divGDMTO').style.display = 'none';
    document.getElementById('divGDMTH').style.display = '';
}
