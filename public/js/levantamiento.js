function monofasico()
{
    /*Mostrar*/
    document.getElementById('divMonofasico').style.display = '';
    /*Ocultar*/
    document.getElementById('divBifasico').style.display = 'none';
    document.getElementById('divTrifasico').style.display = 'none';
}

function bifasico()
{
    /*Mostrar*/
    document.getElementById('divBifasico').style.display = '';
    /*Ocultar*/
    document.getElementById('divMonofasico').style.display = 'none';
    document.getElementById('divTrifasico').style.display = 'none';
}

function trifasico()
{
    /*Mostrar*/
    document.getElementById('divTrifasico').style.display = '';
    /*Ocultar*/
    document.getElementById('divMonofasico').style.display = 'none';
    document.getElementById('divBifasico').style.display = 'none';
}