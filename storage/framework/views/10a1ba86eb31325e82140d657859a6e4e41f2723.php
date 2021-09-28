<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
    /*Paginas*/
    html{
        margin: 0;
    }
    /*Salto de pagina*/
    hr {
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }
    /*Imagenes*/

    /*-----------*/
    /*      Texto       */
    .subtitulo{
        font-family: "Lucida Console", monospace;
        font-size: 15px;
    }
</style>
<body>
    <img src="https://i.pinimg.com/originals/0c/bc/a1/0cbca13e291164dc93e1555a5c70a803.jpg">
    <p class="text-center subtitulo"><?php echo e($paneles["potencia"]); ?> kWp de su sistema fotovoltaico</p>
    <div class="container">
        <h3 class="text-center" style="text-decoration: underline;">Propuesta solar</h3>
        <div class="jumbotron jumbotron-fluid">
            <h1 id="nombreCliente" class="text-center"><?php echo e($cliente["vNombrePersona"]); ?> <?php echo e($cliente["vPrimerApellido"]); ?> <?php echo e($cliente["vSegundoApellido"]); ?></h1>
            <p id="direccionCliente" class="text-center subtitulo"><?php echo e($cliente["vCalle"]); ?> <?php echo e($cliente["vMunicipio"]); ?> <?php echo e($cliente["vEstado"]); ?></p>
        </div>
        <div class="text-center">
            <img src="https://etesla.mx/wp-content/uploads/2019/05/eTesla-Logo-2-01.png" style="width: 33%;">
        </div>
    </div>
    <hr>
    <div>
        <h1>Page 2</h1>
    </div>
</body><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/PDFTemplates/pdfBajaTension.blade.php ENDPATH**/ ?>