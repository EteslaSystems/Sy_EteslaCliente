/*#region index(general)*/
$("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
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