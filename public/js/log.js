/*#region Register*/ 
//Validación de listas desplegables vacias
$(document).on('change','select',function(){
    listaSucursal = document.getElementsByTagName('select')[0].value;
    listaPuesto = document.getElementsByTagName('select')[1].value;

    if(listaSucursal != -1){
        if(listaPuesto != -1){
            document.getElementById('btnRegistrar').disabled = false;
        }
    }
});
/*#endregion*/

function mostrarContrasenia()
{
    var cambio = document.getElementById("inpPasswd");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }
    else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}