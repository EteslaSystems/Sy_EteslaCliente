/*#region index(general)*/
$("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
/*#endregion*/

/*#region Cotizador*/
/*#region MediaTension*/
/*#region GDMTO*/
function GDMTO(){
    document.getElementById('divGDMTO').style.display = '';
    document.getElementById('divGDMTH').style.display = 'none';
}
/*#endregion*/
/*#region GDMTH*/
var arrayPeriodosGDMTH = [];
var objPeriodosGDMTH = {};
var indexador = 0;

function agregarPeriodo(){
    /*Validar campos vacios
    validarFormularioDatosConsumoVacio();*/

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

    objPeriodosGDMTH = {
        bkwh: BkWh,
        ikwh: IkWh,
        pkwh: PkWh,
        bkwh: BkW,
        ikwh: IkW,
        pkwh: PkW,
        bmxn: Bmxn,
        imxn: Imxn,
        pmxn: Pmxn,
        pagoTransmi: pagoTransmision,
        cmxn: Cmxn,
        dmxn: Dmxn
    };

    arrayPeriodosGDMTH.push(objPeriodosGDMTH);
    mostrarIndexador();
    limpiarCampos();

    arrayPeriodosGDMTH.forEach(function(elemento, indice, array){
        console.log(elemento,indice);
    });
}

function mostrarPeriodo(){

}

/*function validarCamposVacios(){
    
}*/

function mostrarIndexador(){
    indexador = arrayPeriodosGDMTH.length;
    document.getElementById('lblIndexador').innerHTML = indexador;
    
    document.getElementById('lstPeriodos')
}

function limpiarCampos(){
    $('input[type="number"]').val('');
}

function GDMTH(){
    document.getElementById('divGDMTO').style.display = 'none';
    document.getElementById('divGDMTH').style.display = '';
}
/*#endregion*/
/*#endregion*/
/*#endregion*/
