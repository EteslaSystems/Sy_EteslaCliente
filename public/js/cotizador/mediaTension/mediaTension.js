var tarifaMT = '';

function GDMTO(){
    $('#divGDMTO').css("display","");
    $('#divGDMTH').css("display","none");
    tarifaMT = 'GDMTO';
}

function GDMTH(){
    $('#divGDMTH').css("display","");
    $('#divGDMTO').css("display","none");
    tarifaMT = 'GDMTH';
}

function limpiarCampos(){
    $('input[type="number"]').val('');
}

function logicaBtnsCRUDArray(){
    
}
