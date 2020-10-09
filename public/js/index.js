/*#region index(general)*/
$("#menu-toggle").click(function(e){
    $("#wrapper").toggleClass("toggled");
    e.preventDefault();
});

$(function(){
    eliminarAgregado();
});
/*#endregion*/

/*#region Buscador - Jesús Daniel Carrera Falcón*/
$("input[name=inpSearchClient]").change(function()
{
    var search = document.querySelector('#inpSearchClient');
    var results = document.querySelector('#clientes');
    var templateContent = document.querySelector('#listtemplate').content;

    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.value) && frag.children.length < 3) frag.appendChild(item);
        return frag;
    },
    document.createDocumentFragment());
    results.appendChild(set);

    var value = $("input[name=inpSearchClient]").val();
    var id = $('#clientes [value="' + value + '"]').data('value');
    var nombre = document.getElementById("lblNombreCliente");
    var direccion = document.getElementById("lblDireccion");
    var celular = document.getElementById("lblCelular");
    var email = document.getElementById("lblEmail");
    var telefono = document.getElementById("lblTelefono");
    var consumo = document.getElementById("lblConsumo");
    var municipio = document.getElementById("divMunicipio");

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type:'post',
        url: 'consultarClientePorId',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content"),
            'id': id
        },
        dataType: 'json',
        success: function (response) {
            nombre.innerHTML = '<input type="text" class="form-control" name="default-name" disabled readonly>';
            direccion.innerHTML = '<input type="text" class="form-control" name="default-address" disabled readonly>';
            celular.innerHTML = '<input type="text" class="form-control" name="default-cellphone" disabled readonly>';
            email.innerHTML = '<input type="text" class="form-control" name="default-email" disabled readonly>';
            telefono.innerHTML = '<input type="text" class="form-control" name="default-phone" disabled readonly>';
            consumo.innerHTML = '<input type="text" class="form-control" name="default-consume" disabled readonly>';

            nombreCompleto = response.message[0].vNombrePersona + ' ' + response.message[0].vPrimerApellido + ' ' + response.message[0].vSegundoApellido;
            direccionCompleta = response.message[0].vCalle + ', ' + response.message[0].vMunicipio + ', ' + response.message[0].vEstado;
            nombre.innerHTML = '<input type="text" class="form-control" value="' + nombreCompleto + '" disabled readonly>';
            direccion.innerHTML = '<input type="text" class="form-control" value="' + direccionCompleta + '" disabled readonly>';
            celular.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vCelular + '" disabled readonly>';
            email.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vEmail + '" disabled readonly>';
            telefono.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vTelefono + '" disabled readonly>';
            consumo.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].fConsumo + '" disabled readonly>';
            // document.getElementById('municipio').value = response.message[0].vCalle.toString() + '-' + response.message[0].vMunicipio.toString() + '-' + response.message[0].vEstado.toString();
            document.getElementById('municipio').value = direccionCompleta;
        }
    });
});
/*#endregion*/

/*#region Busqueda por Codigo Postal - Jesús Daniel Carrera Falcón*/
var postalcodes;

function getLocation(jData) {
    if (jData == null) {
        return;
    }

    postalcodes = jData.postalcodes;

    if (postalcodes.length > 1) {
            document.getElementById('suggestBoxElement').style.visibility = 'visible';
            var suggestBoxHTML = '';

            for (i=0; i<jData.postalcodes.length; i++) {
                suggestBoxHTML += "<div class='suggestions' id=pcId"+ i +" onmousedown='suggestBoxMouseDown("+ i +")' onmouseover='suggestBoxMouseOver("+ i +")' onmouseout='suggestBoxMouseOut("+ i +")'> " + postalcodes[i].placeName +'</div>';
            }
            document.getElementById('suggestBoxElement').innerHTML = suggestBoxHTML;
            var municipio = document.getElementById("inpMunicCliente");
            var estado = document.getElementById("inpEstadoCliente");
            municipio.value = postalcodes[0].adminName2;
            estado.value = postalcodes[0].adminName1;
    } else {
        if (postalcodes.length == 1) {
            var placeInput = document.getElementById("inpColoniaCliente");
            var municipio = document.getElementById("inpMunicCliente");
            var estado = document.getElementById("inpEstadoCliente");
            placeInput.value = postalcodes[0].placeName;
            municipio.value = postalcodes[0].adminName2;
            estado.value = postalcodes[0].adminName1;
        }
        closeSuggestBox();
    }
}

function closeSuggestBox() {
    document.getElementById('suggestBoxElement').innerHTML = '';
    document.getElementById('suggestBoxElement').style.visibility = 'hidden';
}

function suggestBoxMouseOut(obj) {
    document.getElementById('pcId'+ obj).className = 'suggestions';
}

function suggestBoxMouseDown(obj) {
    closeSuggestBox();
    var placeInput = document.getElementById("inpColoniaCliente");
    placeInput.value = postalcodes[obj].placeName;
}

function suggestBoxMouseOver(obj) {
    document.getElementById('pcId'+ obj).className = 'suggestionMouseOver';
}

function postalCodeLookup() {
    if (geonamesPostalCodeCountries.toString().search('MX') == -1) {
        return;
    }
    
    document.getElementById('suggestBoxElement').style.visibility = 'visible';
    document.getElementById('suggestBoxElement').innerHTML = '<small><i>loading ...</i></small>';

    var postalcode = document.getElementById("inpCPCliente").value;

    request = 'http://api.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=MX&callback=getLocation&username=urakirabe';

    aObj = new JSONscriptRequest(request);
    aObj.buildScriptTag();
    aObj.addScriptTag();
}

//--------------------------------------------------------------------------------------------------------------

function JSONscriptRequest(fullUrl) {
    this.fullUrl = fullUrl; 
    this.noCacheIE = '&noCacheIE=' + (new Date()).getTime();
    this.headLoc = document.getElementsByTagName("head").item(0);
    this.scriptId = 'YJscriptId' + JSONscriptRequest.scriptCounter++;
}

JSONscriptRequest.scriptCounter = 1;

JSONscriptRequest.prototype.buildScriptTag = function () {
    this.scriptObj = document.createElement("script");
    this.scriptObj.setAttribute("type", "text/javascript");
    this.scriptObj.setAttribute("src", this.fullUrl + this.noCacheIE);
    this.scriptObj.setAttribute("id", this.scriptId);
}

JSONscriptRequest.prototype.removeScriptTag = function () {
    this.headLoc.removeChild(this.scriptObj);  
}

JSONscriptRequest.prototype.addScriptTag = function () {
    this.headLoc.appendChild(this.scriptObj);
}
/*#endregion*/

/*#region PopOvers*/
// function showPopover(){ 
//     var buttonPopOver = $('[data-toggle="popover"]');
//     var containerPopOver = $('.popover-content');
//     /* $('[data-toggle="popover"]').popover({
//         container: 'body',
//         html: true,
//         placement: 'right',
//         content: '<h3 class="popover-header">Config</h3><div class="popover-body"><form class="form-inline" role="form"><button>uwu</button></form></div>'
//     }); */
//     containerPopOver.hide();

//     buttonPopOver.click(function(){
//         containerPopOver.show();

//         var popperControl = new Popper(ref, popup, {
//             placement: 'right'
//         });
//     });
// }
/*#endregion*/

//Button - Details
var banderaLogic = 1;

function buttonDetails(element){
    var idElement = element.id.toString();
    var tagModalResultSection;
    var iteracion = 0;
    
    ////pageResult1
    ////lstCombinacionResult1 /*modal*/

    if(idElement === 'btnDetails'){
        $('#pageResult'+banderaLogic).fadeOut("slow");
        banderaLogic = banderaLogic >= 3 ? 0 : banderaLogic;
        $('#pageResult'+(banderaLogic+1)).fadeIn("slow");
        banderaLogic++;
    }
    else{
        do{
            banderaLogic = banderaLogic > 3 ? 1 : banderaLogic;

            switch(banderaLogic)
            {
                case 1:
                    tagModalResultSection = "modalResultPageX";
                break;
                case 2:
                    tagModalResultSection = "modalResultPageY";
                break;
                case 3:
                    tagModalResultSection = "modalResultPageZ";
                break;
            }

            if(iteracion == 0){
                $('#'+tagModalResultSection+1).fadeOut("slow");
                $('#'+tagModalResultSection+2).fadeOut("slow");
                $('#'+tagModalResultSection+3).fadeOut("slow");

                banderaLogic++;
            }
            else{
                $('#'+tagModalResultSection+1).fadeIn("slow");
                $('#'+tagModalResultSection+2).fadeIn("slow");
                $('#'+tagModalResultSection+3).fadeIn("slow");
            }

            iteracion++;

            console.log("Iteracion: "+iteracion+" banderaLogic: "+banderaLogic);
        }
        while(iteracion < 2);

        iteracion = 0;
    }

    console.log('banderaLogic says: '+banderaLogic);
}

/* mediaTension - NOTA: Cuando se le de mantenimiento al codigo y mediaTension 
tenga su archivo JS en el 'public' del ClienteWeb, pasar la siguiente funcionalidad
a dicho archivo. */
/*                  Agregados_CRUD                  */
var objAgregado = {};
var _agregado = [];
var contadorDeAgregados = 0;

function addAgregado(){
    var nombreAgregado = $('#inpAgregado').val();
    var cantidadAgregado = $('#inpCantidadAg').val();
    var precioAgregado = $('#inpPrecioAg').val();

    if(validarInputsVaciosAg(nombreAgregado) == true && validarInputsVaciosAg(cantidadAgregado) == true && validarInputsVaciosAg(precioAgregado) == true){
        objAgregado = {
            nombreAgregado: nombreAgregado, 
            cantidadAgregado: cantidadAgregado, 
            precioAgregado: precioAgregado
        };
    
        //Guardo de 'Agregado' en Array
        _agregado.push(objAgregado);
    
        //Pintar 'Agregado' en tabla
        var tableBody = $('#tblAgregados > tbody');
        var filaNueva = tableBody.append('<tr><td id="tdContAg'+contadorDeAgregados+'">'+(contadorDeAgregados+1)+'</td><td>'+_agregado[contadorDeAgregados].nombreAgregado+'</td><td>'+_agregado[contadorDeAgregados].cantidadAgregado+'</td><td>$'+_agregado[contadorDeAgregados].precioAgregado+'</td><td><button id="'+contadorDeAgregados+'" class="btn btn-xs btn-danger deleteAg" title="Eliminar"><img src="https://img.icons8.com/android/12/000000/delete.png"/></button></td></tr>');
        
        contadorDeAgregados++;
        limpiarInputsAgregado();

        ///
        console.log(_agregado);
        console.log('Contador de agregados, despues de agregar item: '+contadorDeAgregados);
    }
}

function eliminarAgregado(){
    $(document).on('click','.deleteAg',function(event){
        //Se borra el *obj* logicamente del array
        var posicionAgregado = event.target.id;
        _agregado.splice(posicionAgregado, 1);
        
        //Se elimina visualmente de la tabla
        event.preventDefault();
        $(this).closest('tr').remove();

        contadorDeAgregados--;
        console.log('Obj despues de la eliminada');
        console.log(_agregado);
        console.log('Contador de agregados despues de la eliminada: '+contadorDeAgregados);
    });
}

//Validaciones y eventos - *Agregados*
function limpiarInputsAgregado(){
    $('.inpAg').val('');
    $('#inpCantidadAg').focus();
}

function validarInputsVaciosAg(valor){
    valor = valor == undefined ? "" : valor;    
    valor = valor.replace("&nbsp;", "");

    if (!valor || 0 === valor.trim().length){
        alert('Campos pertenecientes a *Agregado*, vacios. Favor de llenar!');
        return false;
    }
    else{
        return true;
    }
}