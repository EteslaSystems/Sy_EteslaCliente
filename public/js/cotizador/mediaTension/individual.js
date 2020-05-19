var idPanel;
var idInversor;

function getDropDownListValues(){
    idPanel = document.getElementById('optPaneles').value;
    idInversor = document.getElementById('optInversores').value;
}

function sendSingleQuotation(){
    //var municipio = 'Orizaba, Veracruz'; /*document.getElementById('municipio').value*/ //Preguntarle a Chucho como se obtiene el valor y adjuntarle el Estado para concatenarlo despues del munic.
    var cantidadPaneles = document.getElementById('inpCantPaneles').value;
    var cantidadInversores = document.getElementById('inpCantInversores').value;

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        url: '/enviarCotizIndiv',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "idPanel": idPanel,
            "idInversor": idInversor,
            "cantidadPaneles": cantidadPaneles,
            "cantidadInversores": cantidadInversores
        },
        dataType: 'json',
        success: function(respuesta){
            console.log(respuesta);
        },
        error: function(){
            alert('Algo ha ido mal al intentar realizar una cotizacion_individual');
        }
    });
}