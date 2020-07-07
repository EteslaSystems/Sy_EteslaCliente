/*#region index(general)*/
$("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
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
            document.getElementById('municipio').value = response.message[0].vCalle + '-' + response.message[0].vMunicipio.toString() + '-' + response.message[0].vEstado.toString();
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

//Aqui empieza el cuadro de dialogo que pidio el gordis
function loadMenuGDMTO(){
    document.getElementById("menuContentGDMTO").classList.toggle("menu-active");
}

function loadMenuGDMTH(){
    document.getElementById("menuContentGDMTH").classList.toggle("menu-active");
}
//Aqui termina el cuadrio de dialogo que pidio el gordis
