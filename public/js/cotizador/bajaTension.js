var direccionCliente = '';
var tarifaSelected = '';

/*#region Logica_controles*/
function catchConsumption(){
    const dictionaryTarifas = {"1":1, "1a":1, "1b":1, "1c":1, "1d":1, "1e":1, "1f":1, "2":1, "IC":1};
    var consumos = 0;
    var demandas = 0;
    var _consumDems = [];
    var objConsumDems = {};
    tarifaSelected = $('#tarifa-actual').val().toString();

    if(dictionaryTarifas.hasOwnProperty(tarifaSelected) === true){
        if($('#switch-2').is(':checked')){
            consumos = $('#men-val-1').val() || 0;
            demandas = $('#men-val-1a').val() || 0;

            objConsumDems = {
                consumos: consumos,
                demandas: demandas
            };

            _consumDems.push(objConsumDems);
        }
        else{
            for(var i=0; i<12; i++)
            {//FALTA TESTEAR
                consumos = $('#men-val-'+i.toString()).val() || 0;
                demandas = $('#men-val-'+i.toString()+'a').val() || 0;

                objConsumDems = {
                    consumos: consumos,
                    demandas: demandas
                };

                _consumDems.push(objConsumDems);
            }
        }

        return _consumDems;
    }
    else{
        alert('Problemas con la tarifa seleccionada o inexistente');
    }
}
/*#endregion*/
/*#region Validaciones*/
function validarInputsVacios(){

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
/*#endregion*/
/*#region Server*/
function sendCotizacionBajaTension(){
    var idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    var direccionCliente = document.getElementById('municipio').value;

    if(validarUsuarioCargado(direccionCliente) === true){
        var _consumos = catchConsumption();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: {
                "_token": $("meta[name='csrf-token']").attr('content'),
                'idCliente': idCliente,
                'consumos': _consumos,
                'direccionCliente': direccionCliente,
                'tarifa': tarifaSelected
            },
            dataType: 'json'
        })
        .fail(function(){
            alert('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
        })
        .done(function(respuesta){
            console.log(respuesta);
        });
    }
}
/*#endregion*/