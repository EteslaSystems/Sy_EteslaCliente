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
    var id = $('#clientes [value="' + value + '"]').data('value')
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
            nombre.innerHTML = '';
            direccion.innerHTML = '';
            celular.innerHTML = '';
            email.innerHTML = '';
            telefono.innerHTML = '';
            consumo.innerHTML = '';

            nombreCompleto = response.message[0].vNombrePersona + ' ' + response.message[0].vPrimerApellido + ' ' + response.message[0].vSegundoApellido;
            direccionCompleta = response.message[0].vCalle + ', ' + response.message[0].vMunicipio + ', ' + response.message[0].vEstado;
            nombre.innerHTML = '<input type="text" class="form-control" value="' + nombreCompleto + '" disabled readonly>';
            direccion.innerHTML = '<input type="text" class="form-control" value="' + direccionCompleta + '" disabled readonly>';
            celular.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vCelular + '" disabled readonly>';
            email.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vEmail + '" disabled readonly>';
            telefono.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].vTelefono + '" disabled readonly>';
            consumo.innerHTML = '<input type="text" class="form-control" value="' + response.message[0].fConsumo + '" disabled readonly>';
            document.getElementById('municipio').value = response.message[0].vMunicipio.toString();
        }
    });
});
/*#endregion*/