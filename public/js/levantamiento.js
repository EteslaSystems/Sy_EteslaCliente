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

function ampersCuchilla()
{
    /*Mostrar*/
    document.getElementById('divAmpers1').style.display = '';
    /*Ocultar*/
    document.getElementById('divAmpers2').style.display = 'none';
}

function ampersDistribucion()
{
    /*Mostrar*/
    document.getElementById('divAmpers2').style.display = '';
    /*Ocultar*/
    document.getElementById('divAmpers1').style.display = 'none';
}

document.getElementById("l_image_prev").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
        let preview = document.getElementById('preview-surface'),
        image = document.createElement('img');

        image.src = reader.result;

        preview.innerHTML = '';
        preview.append(image);
    };
}

document.getElementById("l_image_shadow").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
        let preview = document.getElementById('preview-shadow'),
        image = document.createElement('img');

        image.src = reader.result;

        preview.innerHTML = '';
        preview.append(image);
    };
}

document.getElementById("l_image_measurer").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
        let preview = document.getElementById('preview-measurer'),
        image = document.createElement('img');

        image.src = reader.result;

        preview.innerHTML = '';
        preview.append(image);
    };
}