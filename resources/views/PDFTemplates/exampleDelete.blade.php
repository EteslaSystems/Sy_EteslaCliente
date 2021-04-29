<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<style>
    /* Formato Paginas */
    html{
        margin: 0;
    }

    /* Contenedores */
    .container-fluid{
        padding:0 !important;
    }

    /* [Jumbotron] Styles */
    .jumbotron{
        background: #eee;
        height: 30%;
        text-align: center;
        padding: 29px 0;
    }
    .bordeLateral{
        border-style: solid;
        border: 5px;
        border-right: none;
        border-bottom: none;
        border-top: none;
    }

    /*Salto de pagina [hr]*/
    hr.salto-pagina{
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }

    /*Textos*/
    .texto-encabezado-pagina{
        text-align: left;
    }

    .subtitulo{
        font-family: "Lucida Console", monospace;
        font-size: 15px;
        text-align: center;
    }

    /*Imagenes*/
    .img-center{
        display: block;
        margin-left: 290px;
        margin-top: 20px;
    }
</style>
<body>
    <!-- Pagina 1 - Portada -->
    <img src="https://drive.google.com/uc?export=view&id=13LRqh_q_IUKdrmeSTN4l-7aYP1Yt2g1R" style="max-width:100%; height: 635px;">
    <p class="subtitulo">efaesefasefasfasfasefs kWp de su sistema fotovoltaico</p>
    <div class="container-fluid" style="margin-top: -25px;">
        <h3 style="text-align: center; text-decoration: underline;">Propuesta solar</h3>
        <div class="jumbotron bordeLateral" style="border-color: #8DEB6A;">
            <h1 id="nombreCliente">Nombre completo cliente</h1>
            <p id="direccionCliente" class="subtitulo">Direccion cliente</p>
            <p id="fechaActual" class="subtitulo">Fecha de hoy</p>
        </div>
        <img class="img-center" src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="height: 140px; width: 200px;">
    </div>
    <!-- Fin - Pagina1 -->
    <hr class="salto-pagina">
    <!-- Pagina 2 -->
    <div class="container-fluid">
        <div class="jumbotron bordeLateral" style="background-color: #fff; border-color: #8CC6F6;">
            <h3>¿Cuantos paneles necesito?</h3>    
            <h1 class="texto-encabezado-pagina">Sistema Fotovoltaico interconectado a la red CFE</h1>
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 25%; float: right;">
        </div>
    </div>
    <!-- Fin - Pagina2 -->
</body>