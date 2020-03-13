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
    if(validarCamposVacios(BkWh) || validarCamposVacios(IkWh) || validarCamposVacios(PkWh) || validarCamposVacios(BkW) || validarCamposVacios(IkW) || validarCamposVacios(PkW) || validarCamposVacios(Bmxn) || validarCamposVacios(Imxn) || validarCamposVacios(Pmxn) || validarCamposVacios(pagoTransmision) || validarCamposVacios(Cmxn) || validarCamposVacios(Dmxn)){
        alert('Todos los campos pertenecientes a los datos de consumo, deben de llenarse');
    }else{
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
    
        arrayPeriodosGDMTH.push(objPeriodosGDMTH);
        sumarNoAlIndexador();
        limpiarCampos();
    
        console.log(arrayPeriodosGDMTH);
    }
}

function mostrarPeriodo(){
    /*Se desplega el contenido del array en los campos*/ 

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

function sumarNoAlIndexador(){
    indexador = arrayPeriodosGDMTH.length;
    var lista = document.getElementById("lstPeriodos");    
    var option = document.createElement("option");
    option.text = indexador;
    lista.add(option);
    lista.selectedIndex = indexador.toString();
}

function GDMTH(){
    document.getElementById('divGDMTO').style.display = 'none';
    document.getElementById('divGDMTH').style.display = '';
}
/*#endregion*/
/*#endregion*/
function limpiarCampos(){
    $('input[type="number"]').val('');
}
/*#endregion*/

/*#region Buscador - Jesús Daniel Carrera Falcón*/
/*$("#inpSearchClient").keyup(function() {
    $.ajax({
        url:'consultarClientes',
        type:'get',
        success: function (response) {
            const busqueda = document.getElementById("inpSearchClient").value.toLowerCase();
            const mostrar = document.getElementById("lblNombreCliente");
            mostrar.innerHTML = '<label>Nombre completo del cliente (con apellidos)</label>';

            for(let cliente of response.message)
            {
                let nombre = cliente.vNombrePersona.toLowerCase();
                //let apellidoP = cliente.vPrimerApellido.toLowerCase();
                //let apellidoM = cliente.vSegundoApellido.toLowerCase();

                if (nombre.indexOf(busqueda) != -1) {
                    mostrar.innerHTML = '<label>' + nombre + '</label>'
                }
            }
        },
        statusCode: {
            404: function() {
                alert('web not found');
            }
        },
        error:function(x,xs,xt){
            //window.open(JSON.stringify(x));
            alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
})*/

$(document).ready(function()
{
    $("input[name=inpSearchClient]").change(function() {
        const mostrar = document.getElementById("lblNombreCliente");
        mostrar.innerHTML = '';
        mostrar.innerHTML = '<input type="text" class="form-control" value="' + $("input[name=inpSearchClient]").val() + '" disabled readonly>';
    });
});
/*#endregion*/